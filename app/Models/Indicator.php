<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;


    public function indicator_group()
    {
        return $this->belongsTo(IndicatorGroup::class);
    }

    public function indicator_type()
    {
        return $this->belongsTo(IndicatorType::class);
    }

    public function indicator_unit_of_measure()
    {
        return $this->belongsTo(IndicatorUnitOfMeasure::class);
    }
  
}



}
