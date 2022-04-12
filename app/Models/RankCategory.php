<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'unit_rank_id','description' ];

    // Create a Relationship Function . Rank Category belongs to UnitRank

    public function unit_rank()
    {
        return $this->belongsTo(UnitRank::class);
    }

    


    




}
