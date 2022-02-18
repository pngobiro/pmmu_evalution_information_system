<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMasterIndicatorRequest;
use App\Http\Requests\UpdateMasterIndicatorRequest;


use App\Models\FinancialYear;
use App\Models\UnitRank;
use App\Models\IndicatorGroup;
use App\Models\TemplateIndicator;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;


use Illuminate\Http\Request;

class TemplateIndicatorsController extends Controller
{
    public function index(Request $request ,$rank_id ,$fy_id,$group_id){

        $group_name = IndicatorGroup::find($group_id)->name;
        $rank_name = UnitRank::find($rank_id)->name;
        $fy_name = FinancialYear::find($fy_id)->name;

        $template_indicators = TemplateIndicator::where('indicator_group_id',$group_id )->get();

        if ($request->has('search')) {
            $template_indicators = TemplateIndicator::where('name', 'like', "%{$request->search}%")->get();
        }


        return view('admin.template-indicators.index',compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','template_indicators'));

    }

    public function create ($rank_id ,$fy_id,$group_id){

        $group_name = IndicatorGroup::find($group_id)->name;
        $rank_name = UnitRank::find($rank_id)->name;
        $fy_name = FinancialYear::find($fy_id)->name;
        $types = IndicatorType::all();
        $measures = IndicatorUnitOfMeasure::all();

        return view('admin.template-indicators.create' ,compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','measures','types'));
    }

    public function store(StoreMasterIndicatorRequest $request,$rank_id , $fy_id ,$group_id){

        $indicator = new TemplateIndicator($request->validated());
            

        $rank = UnitRank::find($rank_id);  

        $group = IndicatorGroup::find($group_id); 
          
        $indicator->rank()->associate($rank);

        $indicator->group()->associate($group);

        $indicator->save();

        return redirect()->route('unit-ranks.fy.indicator-groups.indicators.index',[$rank_id, $fy_id,$group_id])->with('message', 'Master Indicator Created Successfully');

    }
}
