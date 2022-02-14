<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;


    public function group()
    {
        return $this->belongsTo(IndicatorGroup::class);
    }

    public function type()
    {
        return $this->belongsTo(IndicatorType::class);
    }

    public function unit_of_measure()
    {
        return $this->belongsTo(IndicatorUnitOfMeasure::class);
    }
  
}




