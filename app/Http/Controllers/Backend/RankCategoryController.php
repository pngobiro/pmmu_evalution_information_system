<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\RankCategory;
use App\Models\UnitRank;
use App\Models\FinancialYear;


use App\Http\Requests\StoreRankCategoryRequest;
use Illuminate\Http\Request;



class RankCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(UnitRank $unit_rank , FinancialYear $fy , Request $request )
    {

        //list all rank categories

        $rank_categories  = RankCategory::where('unit_rank_id',$unit_rank->id)->get();

        if ($request->has('search')) {

            $rank_categories  = RankCategory::where('unit_rank_id',$unit_rank->id)
                        ->where('name', 'like', "%{$request->search}%")
                        ->get();
        }


        return view('admin.rank_categories.index',compact('rank_categories','unit_rank','fy'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UnitRank $unit_rank , FinancialYear $fy)
    {
        //
        return view('admin.rank_categories.create',compact('unit_rank','fy'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreRankCategoryRequest $request , UnitRank $unit_rank , FinancialYear $fy)
    
    {
        //dd($request->all());
       // $this->validate($request, ['name' => 'required|unique:rank_categories','description' => 'required','unit_rank_id' => 'required', ]);

        $rank_category = new RankCategory;
        $rank_category->name = $request->name;
        $rank_category->description = $request->description;
        $rank_category->unit_rank_id = $unit_rank->id;
    
        $rank_category->save();

        return redirect()->route('unit-ranks.fy.rank_category.index',[$unit_rank,$fy])->withFlashSuccess('Rank Category successfully created.');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    public function show(RankCategory $rankCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    
    public function edit(UnitRank $unit_rank , FinancialYear $fy , RankCategory $rank_category)
    {
        //

        return view('admin.rank_categories.edit',compact('rank_category','unit_rank','fy'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRank $unit_rank , FinancialYear $fy , RankCategory $rank_category,Request $request)
    {
        // dd($request->all()); 
        $this->validate($request, ['name' => 'required|unique:rank_categories,name,'.$rank_category->id,'description' => 'required', ]);
     

        $rank_category->name = $request->name;
        $rank_category->description = $request->description;
        $rank_category->save();

        return redirect()->route('unit-ranks.fy.rank_category.index',[$unit_rank,$fy])->withFlashSuccess('Rank Category successfully updated.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UnitRank $unit_rank , FinancialYear $fy , RankCategory $rank_category)
    {
        //function to soft delete rank category
        $rank_category->delete();

        //redirect to index page

        return redirect()->route('unit-ranks.fy.rank_category.index',[$unit_rank,$fy])->withFlashSuccess('Rank Category successfully deleted.');

        
    }
}
