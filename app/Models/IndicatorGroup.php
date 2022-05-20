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

    protected $casts = [
        'description' => 'string',
        'order' => 'integer',
        'unit_id' => 'integer',
        'unit_rank_id' => 'integer',
        'financial_year_id' => 'integer',
    ];

    // appends array
    protected $appends = [
        'combined_name',
    ];


    public function indicators( )
    {

    
        return $this->hasMany(Indicator::class,'indicator_group_id')->orderBy('order');;
    }

    

    public function fy()
    {
        return $this->belongsTo(FinancialYear::class,'financial_year_id');
    }



    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    

    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }

    

 // function to get the combined name of the division and unit
    public function getCombinedNameAttribute()
    {

                if ($this->unit->has_pmmu_division)  {

                    return $this->unit->name . ' - ' . $this->division->name;
            } 
            
                else
            
            {
                
                    return  $this->unit->name;
            
            }
    }


   

}
