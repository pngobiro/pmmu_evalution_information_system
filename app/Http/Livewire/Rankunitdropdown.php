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
    public $selectedRank ;
    public $selectedFY ;
    public $selectedUnit ;

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

        $this->selectedRank = NULL;
        $this->selectedUnit = NULL;
        $this->selectedFY = NULL;
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
            $this->selectedRank = $selectedRank;
        }
    }


    public function updatedSelectedUnit($selectedUnit)

    {
        if (!is_null($selectedUnit)) {
            $this->unit = $selectedUnit;
            $this->fys = FinancialYear::all();
            $this->selectedUnit = $selectedUnit;
        }
    }


    public function updatedSelectedFY($selectedFY){

        if (!is_null($selectedFY)){
            $this->selectedFY = $selectedFY;
        
        }

        return redirect()->route('pmmu',[$this->selectedRank , $this->selectedUnit ,$this->selectedFY])->with('message', 'Unit Found Successfully');


    }

}