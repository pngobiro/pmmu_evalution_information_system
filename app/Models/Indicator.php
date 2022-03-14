<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'indicator_graded_score',
        'indicator_weighted_score',
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


    }


    public function getIndicatorGradedScoreAttribute(){


    }


    public function getIndicatorWeightedScoreAttribute(){


    }



    public function getIndicatorPerformanceScoreAttribute(){

        $target         = $this->indicator_target;
        $achivement     = $this->indicator_achivement;
        
        if (!$target==NULL){
            $score = $achivement/$target*100;
        }


        if (!$achivement==NULL){
            $declining_score = $target/$achivement*100;
        }

        switch ( $this->indicator_type_id) {
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
            // Normal Indicator . Score Not more than 2T
                if (!$target==NULL){
                    if ($score >= $target*2){
                        return $target*2;
                    }else{
                        return $score;
                    }        
                }
              
              break;
            case 3:
            // Declining Indicator. Score Not less more than 0.5T

            if (!$achivement==NULL){
                if ($declining_score >= $target*2 ){
                    return $target*2 ;
                }else{
                    return $declining_score;
                }        
            }
              break;
          }
        }




}




