<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;
use App\Models\IndicatorGroup;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy )
    {
        $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id )
                            ->where('financial_year_id',$fy->id)->get();

        if ($request->has('search')) {
            $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)
            ->where('financial_year_id',$fy->id)
            ->where('name', 'like', "%{$request->search}%")
            ->get();

        }

        return view('admin.indicators.index',compact('indicatorgroups','unit_rank','fy','unit')) ;
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy)
    {


        return view('admin.indicators.create',compact('unit_rank','fy','unit')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy)
    {
        IndicatorGroup::create([

            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
            'unit_rank_id' =>       $unit_rank->id,
            'unit_id'     =>        $unit->id,
            'financial_year_id' =>  $fy->id,
        ]);

        return redirect()->route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id ,$unit->id,$fy->id])->with('message', 'Group Registered Succesfully');



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
    public function edit(UnitRank $unit_rank,Unit $unit ,FinancialYear $fy,IndicatorGroup $indicator_group)
    {



        return view('admin.indicators.edit',compact('unit_rank','unit','fy','indicator_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRank $unit_rank,Unit $unit,FinancialYear $fy,IndicatorGroup $indicator_group,Request $request)
    {
        
        $indicator_group->update([

            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
        
        
        ]);

        return redirect()->route('unit-ranks.units.fy.indicator-groups.index',[$unit_rank->id, $unit->id, $fy->id])->with('message', 'Group Updated Successfully');
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


    public function preview(Request $request,UnitRank $unit_rank ,Unit $unit ,FinancialYear $fy){


        $indicatorgroups = IndicatorGroup::where('unit_id',$unit-> id )
                            ->where('financial_year_id',$fy->id)->get();


        return view('admin.indicators.preview',compact('indicatorgroups','unit_rank','fy','unit')) ;

    }
}
