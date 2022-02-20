<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterIndicator extends Model
{
    use HasFactory;


    protected $fillable = ['name','unit_rank_id','rank_id'];



  
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id' );
    }

    public function rank()
    {
        return $this->belongsTo(UnitRank::class,'unit_rank_id' );
    }

}
