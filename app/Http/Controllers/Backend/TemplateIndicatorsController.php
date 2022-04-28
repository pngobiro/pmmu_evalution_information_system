<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreTemplateIndicatorRequest;
use App\Http\Requests\UpdateTemplateIndicatorRequest;


use App\Models\FinancialYear;
use App\Models\UnitRank;
use App\Models\MasterIndicator;
use App\Models\TemplateIndicatorGroup;
use App\Models\TemplateIndicator;
use App\Models\IndicatorType;
use App\Models\Indicator;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\RankCategory;


use Illuminate\Http\Request;

class TemplateIndicatorsController extends Controller
{
    public function index(UnitRank $unit_rank ,FinancialYear $fy ,RankCategory $rank_category ,TemplateIndicatorGroup $template_group ,Request $request ){

        //order by order
        
        $indicator_types = IndicatorType::all();
        $measures = IndicatorUnitOfMeasure::all();
        $master_indicators = MasterIndicator::where('unit_rank_id',$unit_rank->id)->get();
        $template_indicators = TemplateIndicator::where('indicator_group_id',$template_group->id)
                                                ->orderBy('order','asc')
                                                ->get();


        if ($request->has('search')) {

            $template_indicators = TemplateIndicator::where('name', 'like', "%{$request->search}%")
                                                ->where('indicator_group_id',$template_group->id)
                                                ->get();

        }


        return view('admin.template-indicators.index',compact('unit_rank','template_group','fy','template_indicators','rank_category','indicator_types','measures','master_indicators'));

    }

    public function create (UnitRank $unit_rank , FinancialYear $fy ,TemplateIndicatorGroup $template_group){

     

        $master_indicators = MasterIndicator::where('unit_rank_id',$unit_rank->id)->get();

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();

       
        return view('admin.template-indicators.create' ,compact('unit_rank','template_group','fy','measures','types','master_indicators'));


    }

    public function store(UnitRank $unit_rank , FinancialYear $fy ,TemplateIndicatorGroup $template_group, StoreTemplateIndicatorRequest $request){

    

        // Save Template Indicator

        $template_indicator = TemplateIndicator::create([

            'name'                                            =>   $request->name,
            'unit_rank_id'                                    =>   $request->unit_rank->id,
            'unit_id'                                         =>   $request->unit_id,
            'indicator_group_id'                              =>   $template_group->id,
            'indicator_type_id'                               =>   $request->indicator_type_id,
            'indicator_unit_of_measure_id'                    =>   $request->indicator_unit_of_measure_id,
            'indicator_weight'                                =>   $request->indicator_weight,
            'indicator_target'                                =>   $request->indicator_target,
            'indicator_achivement'                            =>   $request->indicator_achivement,
            'master_indicator_id'                             =>   $request->master_indicator_id,
            'remarks'                                         =>   $request->remarks,
            'order'                                           =>   $request->order,

        ]);

        return redirect()->route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id, $fy->id,$template_group->id])->with('message', 'Template Indicator Created Successfully');

    }

    public function edit (UnitRank $unit_rank , FinancialYear $fy ,TemplateIndicatorGroup $template_group,TemplateIndicator $template_indicator){

        $master_indicators = MasterIndicator::where('unit_rank_id',$unit_rank->id)->get();

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();


       
        return view('admin.template-indicators.edit' ,compact('unit_rank','template_group','fy','measures','types','master_indicators','template_indicator'));


    }


    public function update (UnitRank $unit_rank , FinancialYear $fy ,TemplateIndicatorGroup $template_group,TemplateIndicator $template_indicator, UpdateTemplateIndicatorRequest $request){


        $template_indicator->update($request->validated());

        return redirect()->route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id, $fy->id,$template_group->id])->with('message', 'Template Indicator Updated Successfully');

    }
}
