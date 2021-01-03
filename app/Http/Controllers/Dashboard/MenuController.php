<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuCreatedRequest;
use App\Http\Requests\MenuUpdatedRequest;
use App\Models\Menu;
use App\Services\Menus;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MenuController extends Controller
{
    private $menus;
    public function __construct(Menus $menus)
    {
        $this->menus = $menus;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.menu.index', compact('menus'))->withTitle('Menus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.menu.create')->withTitle('Add new menu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreatedRequest $request)
    {
        try {
            $request->merge([
                'user_id' => auth()->user()->id
            ]);
            $this->menus->create($request->all());
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', compact('menu'))->withTitle('Edit menu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdatedRequest $request, $id)
    {
        try {
            $this->menus->update($request->all(), $id);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
