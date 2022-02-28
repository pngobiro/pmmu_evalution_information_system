<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndicatorRequest;
use App\Http\Requests\UpdateIndicatorRequest;

use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\IndicatorGroup;
use App\Models\Indicator;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\FinancialYear;


use Illuminate\Http\Request;

class PmmuController extends Controller
{
    public function index(UnitRank $unit_rank ,Unit $unit,FinancialYear $fy , IndicatorGroup $indicator_group ,Request $request ){

        $indicators = Indicator::where('indicator_group_id',$indicator_group->id )->get();

        if ($request->has('search')) {

            $indicators = Indicator::where('name', 'like', "%{$request->search}%")

            ->where('indicator_group_id',$indicator_group->id )

            ->get();

        }


        return view('admin.pmmu.index',compact('unit_rank','unit','indicator_group','fy','indicators'));

    }


    public function create(UnitRank $unit_rank ,Unit $unit,FinancialYear $fy , IndicatorGroup $indicator_group ,Request $request){

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();
      

        return view('admin.pmmu.create',compact('unit_rank','unit','indicator_group','fy','types','measures'));

    }

    public function store(UnitRank $unit_rank ,Unit $unit, FinancialYear $fy ,IndicatorGroup $indicator_group, Request $request){


        Indicator::create([
                 'name'                          => $request->name,
                 'indicator_type_id'             => $request->indicator_type_id,
                 'order'                         => $request->order,
                 'indicator_unit_of_measure_id'  => $request->indicator_unit_of_measure_id,
                 'indicator_type_id'             => $request->indicator_type_id,
                 'indicator_weight'              => $request->indicator_weight,
                 'indicator_target'              => $request->indicator_target,
                 'unit_rank_id'                  => $unit_rank->id,
                 'indicator_group_id'            => $indicator_group->id,
                 'master_indicator_id'           => $indicator_group->master_indicator_id,
                 

        ]);
 
         return redirect()->route('unit-ranks.units.fy.indicator-groups.indicators.index',[$unit_rank->id, $unit->id, $fy->id,$indicator_group->id])->with('message', 'Indicator Created Successfully');
 
         
     }


     public function edit (UnitRank $unit_rank ,Unit $unit, FinancialYear $fy ,IndicatorGroup $indicator_group, Indicator $indicator,Request $request){

     
        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();


       
        return view('admin.pmmu.edit' ,compact('fy','unit_rank','unit','indicator_group','measures','types','indicator'));


    }


    public function update(UnitRank $unit_rank ,Unit $unit, FinancialYear $fy ,IndicatorGroup $indicator_group, Indicator $indicator,UpdateIndicatorRequest $request){



        $indicator->update($request->validated());

        return redirect()->route('unit-ranks.units.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id ,$fy->id,$indicator_group->id])->with('message', 'Indicator Updated Successfully');

    }


     

}
