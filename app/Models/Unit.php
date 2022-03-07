<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;


    public function rank()
    {
        return $this->belongsTo(UnitRank::class,'unit_rank_id');
    }


    public function groupindicators()
    {
            return $this->hasManyThrough(Indicator::class,IndicatorGroup::class,'unit_id','indicator_group_id');
  
  

    }


    


    public function  getIndicatorsAttribute($value=4){

       if ( ! array_key_exists('groupindicators', $this->relations)) 

       $this->load('groupindicators');

        return $this->groupindicators->where('master_indicator_id',1)->first()->indicator_performance_score;



    }

    


}
