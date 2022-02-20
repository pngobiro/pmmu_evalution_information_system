<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreTemplateIndicatorRequest;
use App\Http\Requests\UpdateTemplateIndicatorRequest;


use App\Models\FinancialYear;
use App\Models\UnitRank;
use App\Models\TemplateIndicatorGroup;
use App\Models\TemplateIndicator;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;


use Illuminate\Http\Request;

class TemplateIndicatorsController extends Controller
{
    public function index(Request $request ,$rank_id ,$fy_id,$group_id){

        $group_name = TemplateIndicatorGroup::find($group_id)->name;

        $rank_name = UnitRank::find($rank_id)->name;

        $fy_name = FinancialYear::find($fy_id)->name;

        $template_indicators = TemplateIndicator::where('indicator_group_id',$group_id )->get();

        if ($request->has('search')) {

            $template_indicators = TemplateIndicator::where('name', 'like', "%{$request->search}%")->get();

        }


        return view('admin.template-indicators.index',compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','template_indicators'));

    }

    public function create ($rank_id ,$fy_id,$group_id){

        $group_name = TemplateIndicatorGroup::find($group_id)->name;

        $rank_name = UnitRank::find($rank_id)->name;

        $fy_name = FinancialYear::find($fy_id)->name;

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();
       
        return view('admin.template-indicators.create' ,compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','measures','types'));


    }

    public function store(UnitRank $unit_rank , FinancialYear $fy ,TemplateIndicatorGroup $template_group, Request $request){


       TemplateIndicator::create([
                'name'                          => $request->name,
                'indicator_type_id'             => $request->indicator_type_id,
                'order'                         => $request->order,
                'indicator_unit_of_measure_id'  => $request->indicator_unit_of_measure_id,
                'indicator_type_id'             => $request->indicator_type_id,
                'indicator_weight'              => $request->indicator_weight,
                'unit_rank_id'                  => $unit_rank->id,
                'indicator_group_id'            => $template_group->id,
       ]);

        return redirect()->route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id, $fy->id,$template_group->id])->with('message', 'Template Indicator Created Successfully');

    }

    public function edit ($rank_id ,$fy_id,$group_id,TemplateIndicator $template_indicator){

        $group_name = TemplateIndicatorGroup::find($group_id)->name;

        $rank_name = UnitRank::find($rank_id)->name;

        $fy_name = FinancialYear::find($fy_id)->name;

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();


       
        return view('admin.template-indicators.edit' ,compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','measures','types','template_indicator'));


    }


    public function update(UpdateTemplateIndicatorRequest $request,$rank_id ,$fy_id,$group_id,TemplateIndicator $template_indicator){



        $template_indicator->update($request->validated());

        return redirect()->route('unit-ranks.fy.template-groups.template-indicators.index',[$rank_id, $fy_id,$group_id])->with('message', 'Template Indicator Updated Successfully');

    }
}
