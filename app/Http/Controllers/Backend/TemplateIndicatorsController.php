<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\FinancialYear;
use App\Models\UnitRank;
use App\Models\IndicatorGroup;
use App\Models\TemplateIndicator;


use Illuminate\Http\Request;

class TemplateIndicatorsController extends Controller
{
    public function index(Request $request ,$rank_id ,$fy_id,$group_id){

        $group_name = IndicatorGroup::find($group_id)->name;
        $rank_name = UnitRank::find($rank_id)->name;
        $fy_name = FinancialYear::find($fy_id)->name;

        $template_indicators = TemplateIndicator::all();

        if ($request->has('search')) {

            $template_indicators = TemplateIndicator::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        }


        return view('admin.template-indicators.index',compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name','template_indicators'));

    }

    public function create ($rank_id ,$fy_id,$group_id){

        $group_name = IndicatorGroup::find($group_id)->name;
        $rank_name = UnitRank::find($rank_id)->name;
        $fy_name = FinancialYear::find($fy_id)->name;

        return view('admin.template-indicators.create' ,compact('fy_id','rank_name','rank_id','group_id','fy_name','group_name'));
    }
}
