<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantCreatedRequest;
use App\Http\Requests\RestaurantUpdatedRequest;
use App\Models\Restaurant;
use App\Services\Restaurants;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RestaurantController extends Controller
{
    private $restaurants;
    public function __construct(Restaurants $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(15);
        return view('dashboard.restaurant.index', compact('restaurants'))->withTitle('Rooms & Suites');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.restaurant.create')->withTitle('Add new restaurant property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantCreatedRequest $request)
    {
        try {
            if($request->has('attachment')) {
                $filename = time() . '.' . $request->attachment->getClientOriginalExtension();
                $destinationPath = public_path('uploads/banner/');
                $img = Image::make($request->attachment->getRealPath());
                $img->resize(594, 620, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);

                $img->resize(60, 40)->save($destinationPath . '/thumbnail/' . $filename);

                $request->merge([
                    'attachment' => '/uploads/banner/' . $filename,
                    'thumbnail' => '/uploads/banner/thumbnail/' . $filename
                ]);
            }
            $this->restaurants->update($request->all(), $id);
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

        return redirect()->route('restaurants.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.restaurant.index')->withTitle('View details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.restaurant.edit')->withTitle('Update property');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantUpdatedRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
