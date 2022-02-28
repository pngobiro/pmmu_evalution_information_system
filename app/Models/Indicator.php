<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'master_id',
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

    public function master()
    {
        return $this->belongsTo(MasterIndicator::class,'master_id');
    }



   

    public function getIndicatorScoreAttribute(){

        if (!$this->indicator_target==NULL)

                    return ($this->indicator_achivement/$this->indicator_target)*100 ;
         

            // cap special indicators
    
        }

    

    


//
   //     return $this->cart()->products()->sum('price');
        
  //  }

   
  
}




