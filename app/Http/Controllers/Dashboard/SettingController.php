<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    private $options;
    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.option.index')->withTitle('Settings');
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
            DB::transaction(function() use($request) {
                $this->options->save($request->all());
            }, 2);
        } catch (Exception $e) {

        }
        return redirect()->route('dashboard.option.index', ['tab' => $request->tab ]);
    }
}
