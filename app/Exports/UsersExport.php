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
  
        foreach ( $indicatorgroups as $group){
            foreach ($group->indicators as $indicator){
            $keyed->push(['court_name'=>$group->unit->name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement,'composite_score'=> $indicator->indicator_weighted_score]);

            }

        }

     

       // group by court name and get sum of composite score for each court
        $grouped = $keyed->groupBy('court_name')->map(function ($item, $key) {

            $performance = new  IndicatorGraderHelper();
            $overallScoreGrade  = $performance-> getCompositeScore($item->sum('composite_score'));
            
            $overall_performance_score = $overallScoreGrade['score'];
            $overall_performance_grade = $overallScoreGrade['grade'];
            $composite_score = $item->sum('composite_score');
            $indicators = [];
            $indicators = $item->toArray();
            

            return ['court_name'=>$key,'composite_score'=>$composite_score,'overall_performance_score'=>$overall_performance_score,'overall_performance_grade'=>$overall_performance_grade,'indicators'=>$indicators];

        
        });

      
     
        return view('exports.indicators', ['grouped'=>$grouped]);
    }
}

