<?php

namespace App\Exports;

use App\Models\User;
use App\Models\IndicatorGroup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Lib\IndicatorGraderHelper;

class UsersExport implements  FromView
{
    public $view;
    public $data;
   

    public function __construct($unit_rank,$fy,$total_indicator_weighted_score)
{

    $this->rank= $unit_rank;
    $this->fy= $fy;
    $this->total_indicator_weighted_score= $total_indicator_weighted_score;
   



}

    public function view(): View

    {

        $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',$this->rank)->where('financial_year_id',$this->fy)->get();
        $keyed= collect();
        $performance = new  IndicatorGraderHelper();
        $overallScoreGrade  = $performance-> getCompositeScore($this->total_indicator_weighted_score);
        
        foreach ( $indicatorgroups as $group){
            foreach ($group->indicators as $indicator){
                //sum of all indicators indicator_weighted_score in the group
                $this->total_indicator_weighted_score += $indicator->indicator_weighted_score;
                
                $keyed->push(['court_name'=>$group->unit->name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement,'composite_score'=> $this->total_indicator_weighted_score,'overall_performance_score'=> $overallScoreGrade['score'], 'overall_performance_grade'=>$overallScoreGrade['grade']]);
            }

          
        }
        $grouped = $keyed->sortBy('court_name')->groupBy('court_name');


        return view('exports.indicators', ['grouped'=>$grouped]);
    }


    
}
