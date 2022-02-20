<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateIndicatorGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_rank_id',
        'financial_year_id',
        'description',
        'order'
    ];

    public function template_indicators( )
    {

    
        return $this->hasMany(TemplateIndicator::class);
      
    }


    public function fy()
    {
        return $this->belongsTo(FinancialYear::class,'financial_year_id');
    }

    public function number_of_indicators(){

        this->template_indicators-count();


    }
}
