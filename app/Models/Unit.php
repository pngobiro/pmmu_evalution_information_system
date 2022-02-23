<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;


    public function rank()
    {
        return $this->belongsTo(UnitRank::class,'unit_rank_id');
    }


    public function groupindicators()
    {
            return $this->hasManyThrough(Indicator::class,IndicatorGroup::class,'unit_id','indicator_group_id');
  
  // return $this->hasManyThrough('Log', 'Task', 'project_id', 'task_id');

    }

    


}
