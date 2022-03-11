<?php

namespace App\Exports;

use App\Models\User;
use App\Models\IndicatorGroup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements  FromView
{
    public $view;
    public $data;

    public function __construct($unit_rank,$fy)
{

    $this->rank= $unit_rank;
    $this->fy= $fy;



}

    public function view(): View

    {

        $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',$this->rank)->where('financial_year_id',$this->fy)->get();
        $keyed= collect();
        foreach ( $indicatorgroups as $group){
            foreach ($group->indicators as $indicator){
                $keyed->push(['court_name'=>$group->unit->name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement]);
            }
        }
        $grouped = $keyed->sortBy('court_name')->groupBy('court_name');


        return view('exports.indicators', ['grouped'=>$grouped]);
    }


    
}
