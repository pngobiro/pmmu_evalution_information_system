<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\StoreTemplateIndicatorGroupRequest;
use App\Http\Requests\UpdateTemplateIndicatorGroupRequest;
use App\Http\Controllers\Controller;
use App\Models\TemplateIndicatorGroup;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;

use Illuminate\Http\Request;

class TemplateIndicatorGroupController extends Controller
{
    public function index(Request $request ,UnitRank $unit_rank,FinancialYear $fy)

    {
        $templateindicatorgroups = TemplateIndicatorGroup::where('unit_rank_id',$unit_rank->id)
        ->where('financial_year_id',$fy->id)
        ->get();

        

        if ($request->has('search')) {
            $templateindicatorgroups= TemplateIndicatorGroup::where('unit_rank_id',$unit_rank->id)
                    ->where('financial_year_id',$fy->id)
                    ->where('name', 'like', "%{$request->search}%")
                    ->get();
        }


        return view('admin.template_indicator_groups.index',compact('templateindicatorgroups','unit_rank','fy'));
    }



    



    public function create(Request $request , $rank_id,$fy_id){

        $fy_name = FinancialYear::find($fy_id)->name;

        $rank_name = UnitRank::find($rank_id)->name;
      

        return view('admin.template_indicator_groups.create',compact('rank_name','fy_name','rank_id','rank_id','fy_id'));

    }

    public function store(UnitRank $unit_rank ,FinancialYear $fy,Request $request ){
        

        TemplateIndicatorGroup::create([

            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
            'unit_rank_id' =>       $unit_rank->id,
            'financial_year_id' =>  $fy->id,
        ]);

        return redirect()->route('unit-ranks.fy.template-groups.index',[$unit_rank->id ,$fy->id])->with('message', 'Template Group Register Succesfully');




    }

    public function edit(UnitRank $unit_rank,FinancialYear $fy,TemplateIndicatorGroup $template_group){

      
        return view('admin.template_indicator_groups.edit',compact('unit_rank','fy','template_group'));
    }

    public function update(UnitRank $unit_rank,FinancialYear $fy,TemplateIndicatorGroup $template_group,Request $request){


        $template_group->update([

            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
        
        
        ]);

        return redirect()->route('unit-ranks.fy.template-groups.index',[$unit_rank->id, $fy->id])->with('message', 'Group Updated Successfully');

    }

}
