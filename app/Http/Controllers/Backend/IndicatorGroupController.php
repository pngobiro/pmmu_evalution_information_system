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
    public function index(Request $request ,UnitRank $unit_rank, Unit $unit)
    {
        
        $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)->get();

        if ($request->has('search')) {

            $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)
                    ->where('name', 'like', "%{$request->search}%")
                    ->get();
        }

        

      

        return view('admin.indicator_groups.index',compact('indicatorgroups','unit_rank','unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request ,UnitRank $unit_rank,FinancialYear $fy)
    {
        return view('admin.indicator_groups.create',compact('indicatorgroups','unit_rank','unit'));
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
