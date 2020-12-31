<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponCreatedRequest;
use App\Http\Requests\CouponUpdatedRequest;
use App\Models\Coupon;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class CouponController extends Controller
{
    private $coupon;
    public function __construct(CouponRepositoryInterface $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(15);
        return view('dashboard.coupon.index', compact('coupons'))->withTitle('Manage coupons');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.coupon.create')->withTitle('Add new coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponCreatedRequest $request)
    {
        try {
            $request->merge([
                'user_id' => Auth::user()->id,
                'offer_start' => \DateTime::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d'),
                'offer_end' => \DateTime::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d')
            ]);
            $this->coupon->create($request->all());
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.coupon.show')->withTitle('View coupon');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('dashboard.coupon.edit', compact('coupon'))->withTitle('Update coupon');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponUpdatedRequest $request, $id)
    {
        try {
            $request->merge([
                'user_id' => Auth::user()->id,
                'offer_start' => \DateTime::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d'),
                'offer_end' => \DateTime::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d')
            ]);
            $this->coupon->update($request->all(), $id);
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        if($coupon->delete()) {

        }
        return redirect()->route('coupons.index')->with('success', 'Coupon successfully deleted');
    }
}
