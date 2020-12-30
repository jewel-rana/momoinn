<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerCreatedRequest;
use App\Http\Requests\BannerUpdatedRequest;
use App\Models\Banner;
use App\Services\Banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    private $banners;

    public function __construct(Banners $banners)
    {
        $this->banners = $banners;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(15);
        return view('dashboard.banner.index', compact('banners'))->withTitle('Banners');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.banner.create')->withTitle('Add new banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerCreatedRequest $request)
    {
        try {
            if($request->has('banner')) {
                $filename = time() . '.' . $request->banner->getClientOriginalExtension();
                $destinationPath = public_path('uploads/banner');
                $img = Image::make($request->banner->getRealPath());
                $img->resize(1920, 1000)->save($destinationPath . '/' . $filename);

                $img->resize(60, 40)->save($destinationPath . '/thumbnail/' . $filename);

                $request->merge([
                    'attachment' => '/uploads/banner/' . $filename,
                    'thumbnail' => '/uploads/banner/thumbnail/' . $filename,
                    'user_id' => Auth::user()->id
                ]);
            }
            $this->banners->create($request->all());
            $data = ['success' => 'Banner successfully created'];
        } catch (\Exception $exception) {
            $data = ['error' => $exception->getMessage()];
        }

        return redirect()->route('banners.index')->with('success', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('dashboard.banner.show', compact('banner'))->withTitle('View details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.banner.edit', compact('banner'))->withTitle('Update banner');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdatedRequest $request, $id)
    {
        try {
            if($request->has('banner')) {
                $filename = time() . '.' . $request->banner->getClientOriginalExtension();
                $destinationPath = public_path('uploads/banner/');
                $img = Image::make($request->banner->getRealPath());
                $img->resize(1920, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $filename);

                $img->resize(60, 40)->save($destinationPath . '/thumbnail/' . $filename);

                $request->merge([
                    'attachment' => '/uploads/banner/' . $filename,
                    'thumbnail' => '/uploads/banner/thumbnail/' . $filename
                ]);
            }
            $this->banners->update($request->all(), $id);
            $data = ['success' => 'Banner successfully updated'];
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            $data = ['error' => $exception->getMessage()];
        }

        return redirect()->route('banners.index')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if($banner->delete()) {

        }
        return redirect()->route('banners.index')->with('success', 'Banner successfully deleted');
    }
}
