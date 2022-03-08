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
                $keyed->push(['court_name'=>$group->unit->name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement]);
            }
        }
        $grouped = $keyed->sortBy('court_name')->groupBy('court_name');


        return view('exports.indicators', ['grouped'=>$grouped]);
    }


    public function unit_excel() :View {




    }


    
}
