<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryIndicatorRequest;
use App\Http\Requests\UpdateCategoryIndicatorRequest;
use App\Models\CategoryIndicator;
use App\Models\UnitRank;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\Unit;

use Illuminate\Http\Request;


class IndicatorCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$rank_id)
    {
        $rank_name = UnitRank::find($rank_id)->name;

        $indicators = CategoryIndicator::where('unit_rank_id',$rank_id)->get();

        if ($request->has('search')) {

            $indicators = CategoryIndicator::where('unit_rank_id',$rank_id)
                        ->where('name', 'like', "%{$request->search}%")
                        ->get();
        }


        return view('admin.indicators-categories.index',compact('indicators','rank_id','rank_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request ,$rank_id)

    {
        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();

        $rank_name = UnitRank::find($rank_id)->name;

    
        
        return view('admin.indicators-categories.create',compact('rank_id','rank_name','types','measures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryIndicatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryIndicatorRequest $request,$rank_id)
    {
        $rank = UnitRank::find($rank_id);

        $indicator = new CategoryIndicator($request->validated());

        $indicator->rank()->associate($rank);

        $indicator->save();

        return redirect()->route('unit-ranks.indicator-categories.index',$rank_id)->with('message', 'Indicator Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryIndicator  $categoryIndicator
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryIndicator $categoryIndicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryIndicator  $categoryIndicator
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryIndicator $categoryIndicator, $rank_id, $id)
    {
        $rank_name = UnitRank::find($rank_id)->name;

        $indicator = CategoryIndicator::find($id);

        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();
  

        return view('admin.indicators-categories.edit',compact('indicator','rank_id','rank_name','types','measures','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryIndicatorRequest  $request
     * @param  \App\Models\CategoryIndicator  $categoryIndicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $rank_id , $id)
    {
      
        $indicator = CategoryIndicator::find($id);

        $indicator->update([
            'indicator_unit_of_measure_id' => $request->indicator_unit_of_measure_id,
            'indicator_type_id' => $request->indicator_type_id,
            'name'     => $request->name,

        ]);
        return redirect()->route('unit-ranks.indicator-categories.index',$rank_id)->with('message', 'Indicator Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryIndicator  $categoryIndicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryIndicator $categoryIndicator)
    {
        //
    }
}