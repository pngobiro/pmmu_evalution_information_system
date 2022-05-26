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
   

    public function __construct($unit_rank,$fy)
{

    $this->rank= $unit_rank;
    $this->fy= $fy;
    

}

    public function view(): View

    {
        $master_indicators = MasterIndicator::where('unit_rank_id', $this->rank)->get();

        $indicatorgroups = IndicatorGroup::with('unit')->where('unit_rank_id',$this->rank)->where('financial_year_id',$this->fy)->get();

       
        $keyed= collect();
   
        foreach ( $indicatorgroups as $group)
            
        {

            foreach ($master_indicators as $master)

            {
                $indicator = Indicator::where('master_indicator_id',$master->id)->where('indicator_group_id',$group->id)->first();

                if($indicator!=null)
                {
                    $keyed->push(['court_name'=>$group->combined_name, 'performance_score'=> $indicator->indicator_performance_score ?? 0,'indicator_name'=>$master->name,'indicator_target'=> $indicator->indicator_target ?? 0,'indicator_achievement'=>$indicator->indicator_achivement ?? 0,'composite_score'=> $indicator->indicator_weighted_score ?? 0]);
                }
                else
                {
                        continue;
                }
           
            }
        
    }
    
    
                    
        $grouped = $keyed->groupBy('court_name')->map(function ($item, $key) {

            $performance = new  IndicatorGraderHelper();
            $overallScoreGrade  = $performance-> getCompositeScore(round($item->sum('composite_score'),3));
            
            $overall_performance_score = $overallScoreGrade['score'];
            $overall_performance_grade = $overallScoreGrade['grade'];
            $overall_composite_score = $item->sum('composite_score');
          
            $indicators = [];
            $indicators = $item->map(function ($item, $key) 
            
            {
                return [
                    'indicator_name' => $item['indicator_name'] ,
                    'indicator_target' => $item['indicator_target'],
                    'indicator_achievement' => $item['indicator_achievement'],
                    'performance_score' => $item['performance_score'],
                    'composite_score' => $item['composite_score'],
                ];
            });
            

            return ['court_name'=>$key,'indicators'=>$indicators,'overall_composite_score'=>$overall_composite_score,'overall_performance_score'=>$overall_performance_score,'overall_performance_grade'=>$overall_performance_grade];

        
        });

  
     
     
        return view('exports.test', ['grouped'=>$grouped]);
    }
}