<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityCreatedRequest;
use App\Http\Requests\FacilityUpdatedRequest;
use App\Models\Facility;
use App\Services\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class FacilityController extends Controller
{
    private $facilities;

    public function __construct(Facilities $facilities)
    {
        $this->facilities = $facilities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = ($request->type) ? $request->type : 'facility';
        $facilities = Facility::where('type', $type)->paginate(15);
        $title = 'Facilities';
        switch ($type) {
            case 'restaurant':
                $title = 'Restaurants';
                break;
            case 'meeting-event':
                $title = 'Meetings & Events';
                break;
        }
        return view('dashboard.facility.index', compact('facilities', 'type'))->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = ($request->type) ? $request->type : 'facility';
        return view('dashboard.facility.create', compact('type'))->withTitle('Add new ' . str_replace('-', ' ', $type));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityCreatedRequest $request)
    {
        try {
            $filename = time() . '.' . $request->attachment->getClientOriginalExtension();
            $destinationPath = public_path('uploads/facilities');
            $img = Image::make($request->attachment->getRealPath());
            $img->resize(594, 620, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
            $request->merge([
                'user_id' => Auth::user()->id,
                'thumbnail' => 'uploads/facilities/' . $filename
            ]);
            $this->facilities->create($request->all());
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->route('facilities.index', ['type' => $request->type]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        return view('dashboard.facility.show', compact('facility'))->withTitle('View facility');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return view('dashboard.facility.edit', compact('facility'))->withTitle('Update facility');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityUpdatedRequest $request, $id)
    {
        try {
            if($request->file('attachment')) {
                $filename = time() . '.' . $request->attachment->getClientOriginalExtension();
                $destinationPath = public_path('uploads/facilities');
                $img = Image::make($request->attachment->getRealPath());
                $img->resize(594, 620, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);

                $request->merge([
                    'thumbnail' => 'uploads/facilities/' . $filename
                ]);
            }
            $this->facilities->update($request->all(), $id);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->route('facilities.index', ['type' => $request->type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        if($facility->delete()) {

        }
        return redirect()->back()->with('success', 'Your item successfully deleted');
    }
}
