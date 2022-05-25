<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndicatorRequest;
use App\Http\Requests\UpdateIndicatorRequest;

use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\Division;
use App\Models\IndicatorGroup;
use App\Models\Indicator;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\FinancialYear;
use App\Models\MasterIndicator;
use Illuminate\Support\Facades\Auth;
use App\Models\TemplateIndicatorGroup;
use App\Models\TemplateIndicator;
use App\Models\RankCategory;


use Illuminate\Http\Request;

class PmmuController extends Controller
{
    public function index(UnitRank $unit_rank ,Unit $unit,Division $division ,FinancialYear $fy , IndicatorGroup $indicator_group ,Request $request ){

        
        $indicator_types = IndicatorType::all();
        $master_indicators = MasterIndicator::where('unit_rank_id',$unit_rank->id)->get();
        $measures = IndicatorUnitOfMeasure::all();
        $indicators = Indicator::where('indicator_group_id',$indicator_group->id )
                                ->orderBy('order')
                                ->get();

        if ($request->has('search')) {

            $indicators = Indicator::where('name', 'like', "%{$request->search}%")
            ->orderBy('order')
            ->where('indicator_group_id',$indicator_group->id )
            ->get();

        }


        return view('admin.pmmu.index',compact('unit_rank','unit','division','indicator_group','fy','indicators','indicator_types','measures','master_indicators'));

    }


    public function create(UnitRank $unit_rank ,Unit $unit,FinancialYear $fy , IndicatorGroup $indicator_group ,Request $request){

        $types = IndicatorType::all();
        $measures = IndicatorUnitOfMeasure::all();
        return view('admin.pmmu.create',compact('unit_rank','unit','indicator_group','fy','types','measures'));

    }

    public function store(UnitRank $unit_rank ,Unit $unit,Division $division, FinancialYear $fy ,IndicatorGroup $indicator_group, Request $request){


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
                 'indicator_created_by'          => Auth::user()->id,
                 'is_backlog_indicator'          => $request->is_backlog_indicator,
                 

        ]);
 
         return redirect()->route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index',[$unit_rank->id, $unit->id,$division, $fy->id,$indicator_group->id])->with('message', 'Indicator Created Successfully');
 
         
     }


     public function edit (UnitRank $unit_rank ,Unit $unit, FinancialYear $fy ,IndicatorGroup $indicator_group, Indicator $indicator,Request $request){

     
        $types = IndicatorType::all();
        $measures = IndicatorUnitOfMeasure::all();


       
        return view('admin.pmmu.edit' ,compact('fy','unit_rank','unit','indicator_group','measures','types','indicator'));


    }


    public function update(UnitRank $unit_rank ,Unit $unit,Division $division ,FinancialYear $fy ,IndicatorGroup $indicator_group, Indicator $indicator,Request $request){

        $indicator->update([
            'name'                          => $request->name,
            'indicator_type_id'             => $request->indicator_type_id,
            'order'                         => $request->order,
            'indicator_unit_of_measure_id'  => $request->indicator_unit_of_measure_id,
            'indicator_type_id'             => $request->indicator_type_id,
            'indicator_weight'              => $request->indicator_weight,
            'master_indicator_id'           => $indicator_group->master_indicator_id,
            'is_backlog_indicator'          => $request->is_backlog_indicator,
        ]);
        return redirect()->route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id, $division,$fy->id,$indicator_group->id])->with('message', 'Indicator Updated Successfully');

    }

    public function download_template(Request $request,UnitRank $unit_rank ,Unit $unit ,Division $division,FinancialYear $fy ){


        $template_group = TemplateIndicatorGroup::
                where('unit_rank_id',$unit_rank->id)
                ->where('financial_year_id',$fy->id)
                ->where('rank_category_id',$request->category_id)
                ->get();

        $indicatorgroups = IndicatorGroup::where('unit_id',$unit->id)->where('financial_year_id',$fy->id)->where('division_id',$division->id)->get();

     if (!$template_group->isEmpty() &&    ($indicatorgroups->isEmpty())){

        foreach ($template_group as $group ){
                $new_group                              = new IndicatorGroup();
                $new_group->name                        = $group->name;
                $new_group->description                 = $group->description;
                $new_group->order                       = $group->order;
                $new_group->unit_rank_id                = $unit_rank->id;
                $new_group->unit_id                     = $unit->id;
                $new_group->division_id                 = $division->id;
                $new_group->financial_year_id           = $fy->id;
                $new_group->indicator_group_created_by  = Auth::user()->id;
                $new_group->save(); 

            foreach ($group->template_indicators as $indicator){
                    $new_indicator                                  = new Indicator();
                    $new_indicator->indicator_group_id              = $new_group->id;
                    $new_indicator->master_indicator_id             = $indicator->master_indicator_id ;
                    $new_indicator->order                           = $indicator->order;
                    $new_indicator->name                            = $indicator->name;
                    $new_indicator->indicator_type_id               = $indicator->indicator_type_id;
                    $new_indicator->indicator_weight                = $indicator->indicator_weight;
                    $new_indicator->indicator_unit_of_measure_id    = $indicator->indicator_unit_of_measure_id;
                    $new_indicator->is_backlog_indicator            = $indicator->is_backlog_indicator;
                    $new_indicator->order                           = $indicator->order;
                    $new_indicator->indicator_created_by            = Auth::user()->id;
                    $new_group->indicators()->save($new_indicator);

            };
        };
        };
    
        return redirect()->route('unit-ranks.units.divisions.fy.indicator-groups.index',[$unit_rank->id ,$unit->id,$division->id,$fy->id])->with('message', 'Template Created Succesfully');

      }


      public function download_previous_fy_template(Request $request,UnitRank $unit_rank ,FinancialYear $fy , RankCategory $rank_category){ {


        $template_group = TemplateIndicatorGroup::where('unit_rank_id',$unit_rank->id)
                ->where('financial_year_id',$fy->id-1)
                ->where('rank_category_id',$rank_category->id)
                ->get();


     if (!$template_group->isEmpty() ){

        foreach ($template_group as $group ){
                $new_group                              = new TemplateIndicatorGroup();
                $new_group->name                        = $group->name;
                $new_group->description                 = $group->description;
                $new_group->order                       = $group->order;
                $new_group->unit_rank_id                = $unit_rank->id;
                $new_group->financial_year_id           = $fy->id;
                $new_group->rank_category_id            = $rank_category->id;
                $new_group->save(); 

            foreach ($group->template_indicators as $indicator){
                    $new_indicator                                  = new TemplateIndicator();
                    $new_indicator->indicator_group_id              = $new_group->id;
                    $new_indicator->master_indicator_id             = $indicator->master_indicator_id ;
                    $new_indicator->order                           = $indicator->order;
                    $new_indicator->name                            = $indicator->name;
                    $new_indicator->indicator_type_id               = $indicator->indicator_type_id;
                    $new_indicator->indicator_weight                = $indicator->indicator_weight;
                    $new_indicator->indicator_unit_of_measure_id    = $indicator->indicator_unit_of_measure_id;
                    $new_indicator->is_backlog_indicator            = $indicator->is_backlog_indicator;
                    $new_group->template_indicators()->save($new_indicator);

            };
        };
        };
    
        return redirect()->back()->with('message', 'Template Succesfully Copied!');

      }


     

}

}
