<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitRank extends Model
{
    use HasFactory;


    public function units()
    {
        return $this->hasMany(Indicator::class);
    }


    public function indicators()
    {
        return $this->hasMany(MasterIndicator::class);
    }


}
