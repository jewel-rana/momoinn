<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomTypeCreateRequest;
use App\Http\Requests\RoomTypeUpdateRequest;
use App\Models\RoomType;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RoomTypeController extends Controller
{
    private $roomType;
    public function __construct(RoomTypeRepositoryInterface $repository)
    {
        $this->roomType = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = RoomType::paginate(15);
        return view('dashboard.roomtype.index', compact('roomtypes'))->withTitle('Room Types');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roomtype.create')->withTitle('Add new type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeCreateRequest $request)
    {
        try {
            $request->merge([
                'slug' => ($request->type_slug) ? str_replace(' ', '-', strtolower($request->type_slug)) : str_replace(' ', '-', strtolower($request->name))
            ]);
            $this->roomType->create($request->all());
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('room_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.restaurant.type.show', compact('room_types'))->withTitle('View details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $room_type)
    {
        return view('dashboard.roomtype.edit', compact('room_type'))->withTitle('Update room type');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeUpdateRequest $request, $id)
    {
        try {
            $request->merge([
                'slug' => ($request->type_slug) ? str_replace(' ', '-', strtolower($request->type_slug)) : str_replace(' ', '-', strtolower($request->name))
            ]);
            $this->roomType->update($request->all(), $id);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('room_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->back();
    }
}
