<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMasterIndicatorRequest;
use App\Http\Requests\UpdateMasterIndicatorRequest;
use App\Models\MasterIndicator;
use App\Models\UnitRank;
use App\Models\IndicatorType;
use App\Models\IndicatorUnitOfMeasure;
use App\Models\Unit;

use Illuminate\Http\Request;


class MasterIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$rank_id)
    {
        $rank_name = UnitRank::find($rank_id)->name;

        $indicators = MasterIndicator::where('unit_rank_id',$rank_id)->get();

        if ($request->has('search')) {

            $indicators = MasterIndicator::where('unit_rank_id',$rank_id)
                        ->where('name', 'like', "%{$request->search}%")
                        ->get();
        }


        return view('admin.master-indicators.index',compact('indicators','rank_id','rank_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($rank_id)

    {
        $types = IndicatorType::all();

        $measures = IndicatorUnitOfMeasure::all();

        $rank_name = UnitRank::find($rank_id)->name;

    
        
        return view('admin.master-indicators.create',compact('rank_id','rank_name','types','measures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterIndicatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterIndicatorRequest $request,$rank_id)
    {
        $rank = UnitRank::find($rank_id);

        $indicator = new MasterIndicator($request->validated());

        $indicator->rank()->associate($rank);

        $indicator->save();

        return redirect()->route('unit-ranks.master-indicator.index',$rank_id)->with('message', 'Master Indicator Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterIndicator  $masterIndicator
     * @return \Illuminate\Http\Response
     */
    public function show(MasterIndicator $masterIndicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterIndicator  $masterIndicator
     * @return \Illuminate\Http\Response
     */
    public function edit($rank, MasterIndicator $masterIndicator )
    {
       

        $rank_name = UnitRank::find($masterIndicator->unit_rank_id)->name;

       

        return view('admin.master-indicators.edit',compact('rank_name','masterIndicator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterIndicatorRequest  $request
     * @param  \App\Models\MasterIndicator  $masterIndicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $rank_id , $id)
    {
      
        $indicator = MasterIndicator::find($id);

        $indicator->update([
            'indicator_unit_of_measure_id' => $request->indicator_unit_of_measure_id,
            'indicator_type_id' => $request->indicator_type_id,
            'name'     => $request->name,

        ]);
        return redirect()->route('unit-ranks.master-indicator.index',$rank_id)->with('message', 'Master Indicator Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterIndicator  $masterIndicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterIndicator $masterIndicator)
    {
        //
    }
}
