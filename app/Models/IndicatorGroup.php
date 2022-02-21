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

    
        return $this->hasMany(Indicator::class);
    }


   

}
