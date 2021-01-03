<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;

class AjaxBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $limit = $request->input('length');
            $start = $request->input('start');
            $columns = $request->get('columns');
            $column = $columns[$request->input('order.0.column')]['data'];
            $order = $request->input('order.0.dir');
            $query = Booking::with(['customer');

            //filter by keyword
            if (isset($_GET['keyword']) && $_GET['keyword'] != null) {
                $keyword = $_GET['keyword'];
                $query->WhereHas('customer', function ($q) use ($keyword) {
                    $q->where('mobile', 'LIKE', "%$keyword%");
                    $q->orWhere('name', 'LIKE', "%$keyword%");
                    $q->orWhere('email', 'LIKE', "%$keyword%");
                });
            }


            //filter by status
            if (isset($_GET['status']) && $_GET['status'] != null) {
                $status = (int)$_GET['status'];
                $query->where('status', $status);
            }

            $total = $query->count();

            $query->offset($start);
            if ($limit < 0) {
                $limit = $total;
            }
            $query->limit($limit);
//             $query->orderBy($column, $order);
            $query->orderBy('created_at', 'desc');
            $customers = $query->get();

            $data = [
                'draw' => $request->get('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $customers->toArray()
            ];

            return response()->json($data);
        }
    }
}
