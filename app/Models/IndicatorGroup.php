<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorGroup extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'unit_rank_id',
        'financial_year_id',
        'description',
        'order',
        'unit_id'
    ];


    public function indicators( )
    {

    
        return $this->hasMany(Indicator::class,'indicator_group_id');
    }

    

    public function fy()
    {
        return $this->belongsTo(FinancialYear::class,'financial_year_id');
    }



    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    //sum all the indicators weighted score in the group

    public function total_indicator_weighted_score()
    {
        $total_indicator_weighted_score = 0;
        foreach ($this->indicators as $indicator) {
            $total_indicator_weighted_score += $indicator->indicator_weighted_score;
        }
        return $total_indicator_weighted_score;

    }

    // sum of total weights of all indicators in the group
    public function total_indicator_weight()
    {
        $total_indicator_weight = 0;
        foreach ($this->indicators as $indicator) {
            $total_indicator_weight += $indicator->indicator_weight;
        }
        return $total_indicator_weight;
    }

    // group composite score
    public function group_composite_score()
    {
        $group_composite_score = 0;
        $total_indicator_weighted_score = $this->total_indicator_weighted_score();
        $total_indicator_weight = $this->total_indicator_weight();
        $group_composite_score = $total_indicator_weighted_score / $total_indicator_weight;
        return $group_composite_score;
    }


   

}
