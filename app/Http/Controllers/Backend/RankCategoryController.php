<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\RankCategory;
use App\Models\UnitRank;
use App\Models\FinancialYear;


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
    public function store(Request $request)
    {
        //
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
    public function edit(RankCategory $rankCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RankCategory $rankCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RankCategory  $rankCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RankCategory $rankCategory)
    {
        //
    }
}
