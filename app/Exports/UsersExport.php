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
        $performance_array = collect();
        $performance = new  IndicatorGraderHelper();
        $overallScoreGrade  = $performance-> getCompositeScore($this->total_indicator_weighted_score);
        $composite_score = 0;

        foreach ($indicatorgroups as $indicatorgroup) {
            foreach ($indicatorgroup->indicators as $indicator) {
            
            $performance_array->push(['court_name'=> $indicatorgroup->unit->name ,'composite_score' => $indicator->indicator_weighted_score]);

           
        }
    }

    // GROUP BY COURT NAME AND GET THE COMPOSITE SCORE
    $keyed2 = $performance_array->groupBy('court_name')->map(function ($item, $key) {
        $composite_score = 0;
        foreach ($item as $value) {
            $composite_score += $value['composite_score'];
        }
        return $composite_score;
    });

    dd($keyed2);
    

        


        


        
        foreach ( $indicatorgroups as $group){
            foreach ($group->indicators as $indicator){
            // sum all $group->total_indicator_weighted_score() as $composite_score
            $composite_score += $indicator->indicator_weighted_score;
            $keyed->push(['court_name'=>$group->unit->name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement,'overall_performance_score'=> $overallScoreGrade['score'], 'overall_performance_grade'=>$overallScoreGrade['grade']]);
            }

        }

        

        //include the composite score in the keyed array
        
        $keyed = $keyed->merge($keyed2);

        dd($keyed);



        $grouped = $keyed->sortBy('court_name')->groupBy('court_name');



        return view('exports.indicators', ['grouped'=>$grouped]);
    }


    
}
