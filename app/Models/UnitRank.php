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

    // Create a Relationship Function . UnitRank has many RankCategories

    public function rank_categories()
    {
        return $this->hasMany(RankCategory::class);
    }


}
