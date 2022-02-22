<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitRank;
use App\Models\Unit;
use App\Models\FinancialYear;

class Rankunitdropdown extends Component

{
    public $ranks;
    public $units;
    public $fys;
    public $rank;
    public $unit;
    public $fy;
    public $selectedRank = NULL;
    public $selectedFY = NULL;
    public $selectedUnit = NULL;

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function mount()

    {
        $this->ranks = UnitRank::all();
        $this->units = collect();
        $this->fys = collect();

        $this->rank = 3;
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function render()

    {
        return view('livewire.unitrankdropdown')->extends('layouts.app');
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function updatedSelectedRank($selectedRank)

    {
        if (!is_null($selectedRank)) {
            $this->units = Unit::where('unit_rank_id', $selectedRank)->get();
            $this->rank = $selectedRank;
        }
    }


    public function updatedSelectedUnit($selectedUnit)

    {
        if (!is_null($selectedUnit)) {
            $this->unit = $selectedUnit;
            $this->fys = FinancialYear::all();
        }
    }


    public function updatedSelectedFY($selectedFY){

        if (!is_null($selectedFY)){
            $this->fy = $selectedFY;
        
        }

        return redirect()->route('unit-ranks.units.fy.indicator-groups.indicators.index',[$rank , $unit ,$fy])->with('message', 'Indicator Created Successfully');

    }

}