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

    // attributes that are mass assignable
    protected $fillable = [
        'name',
        'is_active',
    ];

    // attributes that should be hidden for arrays
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

 


    // the units that belongs to this division

    public function unit()
    {
        return $this->belongsToMany(Unit::class,'unit_division','division_id','unit_id');
    }

    // has many indicatorgroups
    public function indicatorgroups()
    {
        return $this->hasMany(IndicatorGroup::class);
    }


    



    

}
