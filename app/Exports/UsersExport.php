<?php

namespace App\Exports;

use App\Models\User;
use App\Models\IndicatorGroup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements  FromView
{


    public function view(): View

    {

        $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',6)->where('financial_year_id',4)->get();
        $keyed= collect();
        foreach ( $indicatorgroups as $group){
                foreach ($group->indicators as $indicator){
                    $keyed->push(['court_name' => $group->unit->name ,'indicator' => $indicator->master->name ,'score'=> $indicator->indicator_score]);
                }    
        }
        $grouped = $keyed->groupBy('court_name')->all();


        return view('exports.indicators', ['grouped'=>$grouped]);
    }


    
}
