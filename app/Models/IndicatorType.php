<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorType extends Model
{
    use HasFactory;


    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }
}
