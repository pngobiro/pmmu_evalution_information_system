<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;


    public function rank()
    {
        return $this->belongsTo(IndicatorType::class,'unit_rank_id');
    }


    


}
