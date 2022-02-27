<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'indicator_group_id',
        'indicator_type_id',
        'indicator_unit_of_measure_id',
        'indicator_weight',
        'indicator_target',
        'order'
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
        return $this->belongsTo(IndicatorUnitOfMeasure::class,'indicator_unit_of_measure_id');
    }

   

    public function getIndicatorScoreAttribute(){

       return $this->indicator_achivement*5;

    }


//
   //     return $this->cart()->products()->sum('price');
        
  //  }

   
  
}




