<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\UnitRank;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , UnitRank $unit_rank) {
        
    
        $units = Unit::where('unit_rank_id',$unit_rank->id)->get();

        if ($request->has('search')) {

            $units= Unit::where('name', 'like', "%{$request->search}%")->where('unit_rank_id',$unit_rank->id)->get();

        }

        return view('admin.units.index',compact('units','unit_rank'));
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

    // update has_pmmu_division with ajax
    public function updateHasPMMU(Request $request)
    {
        $unit = Unit::find($request->unit_id);

        if ($request->has('has_pmmu_division')) {
            $unit->has_pmmu_division = 1;
        } else {
            $unit->has_pmmu_division = 0;
        }

        $unit->save();
        
        // flash message and redirect
        return redirect()->back()->with('success', 'Unit has been updated successfully');
    }
}
