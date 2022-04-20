<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\StoreTemplateIndicatorGroupRequest;
use App\Http\Requests\UpdateTemplateIndicatorGroupRequest;
use App\Http\Controllers\Controller;
use App\Models\TemplateIndicatorGroup;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;
use App\Models\RankCategory;

use Illuminate\Http\Request;

class TemplateIndicatorGroupController extends Controller
{
    public function index(Request $request ,UnitRank $unit_rank,FinancialYear $fy , RankCategory $rank_category)

    {
        //list all template groups where unit_ranks   and rank_category and financial year
        // sum of all indicators weights in group
        // sum of all indicators weights in group

        // order by indicator order field
        // order by indicator order field

        $templateindicatorgroups  = TemplateIndicatorGroup::withSum('template_indicators as total_indicators', 'indicator_weight')
                                                ->where('unit_rank_id',$unit_rank->id)
                                                ->where('rank_category_id',$rank_category->id)
                                                ->where('financial_year_id',$fy->id)
                                                ->get()
                                                ->sortBy('indicator_order','asc');



        return view('admin.template_indicator_groups.index',compact('templateindicatorgroups','unit_rank','fy','rank_category'));
    }

    public function create(Request $request ,UnitRank $unit_rank,FinancialYear $fy , RankCategory $rank_category)
    
    {
        
        return view('admin.template_indicator_groups.create',compact('unit_rank','fy','rank_category'));
    }

    public function store(UnitRank $unit_rank ,FinancialYear $fy , RankCategory $rank_category,StoreTemplateIndicatorGroupRequest $request)

    {
        $validated = $request->validated(true);
        $templateindicatorgroup = new TemplateIndicatorGroup;
        $templateindicatorgroup->name = $request->name;
        $templateindicatorgroup->description = $request->description;
        $templateindicatorgroup->unit_rank_id = $unit_rank->id;
        $templateindicatorgroup->financial_year_id = $fy->id;
        $templateindicatorgroup->rank_category_id = $request->rank_category->id;
        $templateindicatorgroup->order = $request->order;
        $templateindicatorgroup->save();

        return redirect()->route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank,$fy,$rank_category])->with('message','Template Indicator Group Created Successfully');

    }

    public function edit(UnitRank $unit_rank,FinancialYear $fy,RankCategory $rank_category,TemplateIndicatorGroup $template_group)
    {

    
        return view('admin.template_indicator_groups.edit',compact('unit_rank','fy','template_group','rank_category'));
    }

    public function update(UnitRank $unit_rank,FinancialYear $fy,RankCategory $rank_category , TemplateIndicatorGroup $template_group,Request $request)
    {
        $template_group->update([
            'name' =>               $request->name,
            'description' =>        $request->description,
            'order' =>              $request->order,
        
        ]);

        return redirect()->route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank->id, $fy->id , $rank_category])->with('message', 'Group Updated Successfully');

    }

}

