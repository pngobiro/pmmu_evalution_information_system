<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Lib\PerformanceScoreHelper;

class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'master_indicator_id ',
        'indicator_group_id',
        'indicator_type_id',
        'indicator_unit_of_measure_id',
        'indicator_weight',
        'indicator_target',
        'indicator_achievement',
        'order'
    ];

    protected $appends = [
        'indicator_performance_score',
        'indicator_raw_score',
        'indicator_weighted_score',
        'indicator_graded_score',
    ];

    protected $casts = [
        'indicator_achievement' => 'float',
        'indicator_target' => 'float',
        'indicator_weight' => 'float',
        'indicator_performance_score' => 'float',
        'indicator_raw_score' => 'float',
        'indicator_weighted_score' => 'float',
        'indicator_graded_score' => 'string',
    ];



    public function group()
    {
        return $this->belongsTo(IndicatorGroup::class,'indicator_group_id');
    }

    public function type()
    {
        return $this->belongsTo(IndicatorType::class,'indicator_type_id' );
    }

    public function measure()
    {
        return $this->belongsTo(IndicatorUnitOfMeasure::class,'indicator_unit_of_measure_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function master()
    {
        return $this->belongsTo(MasterIndicator::class,'master_indicator_id');
    }



    public function getIndicatorRawScoreAttribute(){

        $target         = $this->indicator_target;
        $achivement     = $this->indicator_achivement;       
     

        switch ( $this->indicator_type_id) {
            case 1:
            //special indicator. Score Not above 100%
            if (!$target==NULL && !$achivement==NULL){
                    
                    $raw_score = (((2*$target)-($achivement))/(2*$target)*4)+1;

                    if ($raw_score> 5){
                        return 5;
                    }elseif ($raw_score< 1){
                        return 1;
                    } else{
                        return $raw_score;
                    }
                
                }
            
            case 2:
            // Normal Indicator . 
            if (!$target==NULL && !$achivement==NULL){

                        $raw_score = (((2*$target)-($achivement))/(2*$target)*4)+1;

                        if ($raw_score> 5){
                            return 5;
                        }elseif ($raw_score< 1){
                            return 1;
                        } else{
                            return $raw_score;
                        }

                    }
        
        
            case 3:
            // Declining Indicator. Score Not less more than 0.5T
            // check if $achivement OR $target are not nil 
              if (!$target==NULL && !$achivement==NULL){

                $raw_score =  (((2*$achivement))/($target))+1;

                if ($raw_score> 5)
                {
                    return 5;
                }
                
                elseif ($raw_score< 1) 

                {
                    return 1;
                } 
                
                else 
                {
                    return $raw_score;
                }
                   
            }

    
    }
}




   
    public function getIndicatorGradedScoreAttribute(){

        //if indicator is not null
        if (!$this->indicator_achivement==NULL)
        {
            $performance_grade = new PerformanceScoreHelper;
            $result = $performance_grade->getPerformanceGrade($this->indicator_type_id,$this->indicator_performance_score);
            return $result;
        }
       
        }


    public function getIndicatorWeightedScoreAttribute()
    
    {

            if (!$this->indicator_achivement==NULL)
            {        
                    if (!$this->indicator_raw_score==NULL){
                        return ($this->indicator_raw_score * $this->indicator_weight)/100;
                    }
            }
    }


    
    public function getIndicatorPerformanceScoreAttribute(){

        $target         = $this->indicator_target;
        $achivement     = $this->indicator_achivement;
        
        if (!$target==NULL){
            $score = $achivement/$target*100;
            $max_score = (2*$target)/($target*100);
        }

        


        if (!$achivement==NULL){
            $declining_score = $target/$achivement*100;
        }

        switch ($this->indicator_type_id) {
            case 1:
            //special indicator. Score Not above 100%
                if (!$target==NULL){
                    if ($score >= 100){
                        return 100;
                    }else{
                        return $score;
                    }        
                }
              break;
            case 2:
            // Normal Indicator . return score Not more than 2 Times the Target
            //Example if target is 1500 and actual achivement is 5000 then score is 2 * $target 
            // Create the function to return the score

                if (!$target==NULL){

                    if ($achivement> 2*$target){

                        return 200;
                    }
                    else
                    {
                        return $score;
                    }
                }
              break;
            case 3:
            // Declining Indicator. Score Not less more than 0.5T

            if (!$achivement==NULL){

                if ($declining_score > 200){
                    return 200;
                }
                elseif ($declining_score < 0){
                    return 0;
                } else{
                    return $declining_score;
                }

                   
                
                 
            }
              break;
          }
        }


 




}




