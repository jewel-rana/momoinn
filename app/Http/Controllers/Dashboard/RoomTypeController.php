<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        $room_types = RoomType::paginate(15);
        return view('dashboard.restaurant.type.index', compact('room_types'))->withTitle('Room Types');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.restaurant.type.create', compact('room_types'))->withTitle('Add new type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->roomType->create($request->all());
            $data = ['success' => 'Room type successfully created'];
        } catch (\Exception $exception) {
            $data = ['error' => $exception->getMessage()];
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
    public function edit($id)
    {
        return view('dashboard.restaurant.type.edit', compact('room_types'))->withTitle('Update room type');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->roomType->update($request->all(), $id);
            $data = ['success' => 'Room type successfully updated'];
        } catch (\Exception $exception) {
            $data = ['error' => $exception->getMessage()];
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
