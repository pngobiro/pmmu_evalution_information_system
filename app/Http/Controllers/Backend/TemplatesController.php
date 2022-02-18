<?php

namespace App\Http\Controllers\Backend;

use App\Models\FinancialYear;

use App\Models\UnitRank;

use App\Models\IndicatorGroup;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function index($rank_id)
    {

        $rank_name = UnitRank::find($rank_id)->name;

        $fys = FinancialYear::all();


        return view('admin.template.index',compact('fys','rank_name','rank_id'));
    }

    public function show($rank_id ,$fy_id){

        $indicatorgroups = IndicatorGroup::where('unit_rank_id',$rank_id)
                                            ->where('financial_year_id',$fy_id)
                                            ->get();

        $rank_name = UnitRank::find($rank_id)->name;

        $fy_name = FinancialYear::find($fy_id)->name;

        return view('admin.template.show',compact('rank_name','rank_id','indicatorgroups','fy_name','rank_name','fy_id'));

    }

    public function indicators(){


        
    }
}
