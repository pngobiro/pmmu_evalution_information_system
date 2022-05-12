<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    //casts is_active to boolean
    protected $casts = [
        'is_active' => 'boolean',
    ];



    // the units that belongs to this division

    public function units()
    {
        return $this->belongsToMany(Unit::class,'unit_division','division_id','unit_id');
    }

    // has many indicatorgroups
    public function indicatorgroups()
    {
        return $this->hasMany(IndicatorGroup::class);
    }

}
