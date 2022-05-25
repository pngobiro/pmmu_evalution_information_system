<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Unit;
use App\Models\IndicatorGroup;
use App\Models\MasterIndicator;
use App\Models\Indicator;
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
        $master_indicators = MasterIndicator::where('unit_rank_id', $this->rank)->get();
        $units = Unit::where('unit_rank_id',$this->rank)->get();
        // units 
        $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',$this->rank)->where('financial_year_id',$this->fy)->get();

        // pluck unit from $indicatorgroups

        

        $keyed= collect();
        foreach ($master_indicators as $master)
    {
            foreach ( $indicatorgroups as $group)
            
        {
                foreach ($group->indicators as $indicator)
                {
                    if ($master->id == $indicator->master_indicator_id ) 
                    {
                        $keyed->push(['court_name'=>$group->combined_name, 'performance_score'=> $indicator->indicator_performance_score,'indicator_name'=>$indicator->master->name,'indicator_target'=> $indicator->indicator_target,'indicator_achievement'=>$indicator->indicator_achivement,'composite_score'=> $indicator->indicator_weighted_score]);
                    }

                    else
                    {
                        $keyed->push(['court_name'=>$group->combined_name, 'performance_score'=> 0,'indicator_name'=>$indicator->master->name,'indicator_target'=> "N/A",'indicator_achievement'=>"N/A",'composite_score'=> 0]);
                       
                    }
                    
                }
               
             
               
        }
        break;
    }
    
    
     

        $grouped = $keyed->groupBy('court_name')->map(function ($item, $key) {

            $performance = new  IndicatorGraderHelper();
            $overallScoreGrade  = $performance-> getCompositeScore(3);
            
            $overall_performance_score = $overallScoreGrade['score'];
            $overall_performance_grade = $overallScoreGrade['grade'];
            $composite_score = $item->sum('composite_score');
            $indicators = [];
            $indicators = $item->map(function ($item, $key) {
                return [
                
                    'indicator_name' => $item['indicator_name'],
                    'performance_score' => $item['performance_score'],
                    'indicator_target' => $item['indicator_target'],
                    'indicator_achievement' => $item['indicator_achievement'],
                    'composite_score' => $item['composite_score'],

                ];
            });
            

            return ['court_name'=>$key,'indicators'=>$indicators,'composite_score'=>$composite_score,'overall_performance_score'=>$overall_performance_score,'overall_performance_grade'=>$overall_performance_grade];

        
        });

       
     
     
        return view('exports.indicators', ['grouped'=>$grouped]);
    }
}



