<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IndicatorGroup;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;


use Illuminate\Http\Request;

class IndicatorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $rank_id, $unit_id, $fy_id)


    {
        $fy_name = FinancialYear::find($fy_id)->name;

        $unit_name= Unit::find($unit_id)->name;

        $rank_name = UnitRank::find($rank_id)->name;

        $indicatorgroups = IndicatorGroup::where('unit_id',$unit_id)
                                        ->where('fy_id',$fy_id)
                                        ->get();

      

        return view('admin.indicator_groups.index',compact('indicatorgroups','fy_name','unit_name','rank_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
