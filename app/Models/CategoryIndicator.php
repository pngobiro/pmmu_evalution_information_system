<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryIndicator extends Model
{
    use HasFactory;


    protected $fillable = ['name','indicator_type_id','indicator_unit_of_measure_id','unit_rank_id'];



  
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id' );
    }

    public function rank()
    {
        return $this->belongsTo(UnitRank::class,'unit_rank_id' );
    }



    public function type()
    {
        return $this->belongsTo(IndicatorType::class,'indicator_type_id' );
    }

    public function measure()
    {
        return $this->belongsTo(IndicatorUnitOfMeasure::class,'indicator_unit_of_measure_id');
    }
}
