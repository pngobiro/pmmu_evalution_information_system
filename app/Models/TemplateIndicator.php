<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateIndicator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit_rank_id',
        'indicator_group_id',
        'indicator_type_id',
        'indicator_unit_of_measure_id',
        'indicator_weight',
        'indicator_target',
        'indicator_unit_of_measure_id',
        'order'
    ];


    public function rank()
    {
        return $this->belongsTo(UnitRank::class,'unit_rank_id' );
    }

    public function group()
    {
        return $this->belongsTo(TemplateIndicatorGroup::class,'indicator_group_id' );
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
