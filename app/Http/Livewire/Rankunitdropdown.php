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
    public $divisions;
    public $selectedRank ;
    public $selectedFY ;
    public $selectedUnit ;
    public $selectedActivity ;
    public $selectedDivision ;
    // $hasPMMUDivision is a boolean variable that is used to determine if the PMMU Division is selected
    public $hasPMMUDivision;

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
        $this->divisions = collect();

        $this->selectedRank = NULL;
        $this->selectedUnit = NULL;
        $this->selectedFY = NULL;
        $this->selectedDivision = NULL;
        $this->hasPMMUDivision = false;
    
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
            $this->units = Unit::where('unit_rank_id', $selectedRank)->orderBy('name', 'asc')->get();
            $this->selectedRank = $selectedRank;
        }
    }


    public function updatedSelectedUnit($selectedUnit)

    {
        if (!is_null($selectedUnit)) {
            $this->unit = $selectedUnit;
            $this->hasPMMUDivision = Unit::find($selectedUnit)->has_pmmu_division;
            $this->divisions = Unit::find($selectedUnit)->divisions;
            $this->fys = FinancialYear::all();

            $this->selectedUnit = $selectedUnit;
        }
    }

    public function updatedSelectedDivision($selectedDivision)

    {
        if (!is_null($selectedDivision)) {
            $this->unit = $selectedDivision;
            $this->fys = FinancialYear::all();
            $this->selectedDivision = $selectedDivision;
        }

        elseif (is_null($selectedDivision)){
            $this->unit = $selectedUnit;
            $this->fys = FinancialYear::all();
            $this->selectedUnit = $selectedUnit;


        }

    }



    public function updatedSelectedFY($selectedFY){

        if (!is_null($selectedFY)){
            $this->selectedFY = $selectedFY;
        
        }



    }


    public function updatedSelectedActivity($selectedActivity){

        if ($selectedActivity=='view-pmmu')  {

        return redirect()->route('pmmu',[$this->selectedRank , $this->selectedUnit ,$this->selectedFY]);
          
        
        }
        
        if ($selectedActivity=='update-targets')  {
            return redirect()->route('update_targets',[$this->selectedRank , $this->selectedUnit ,$this->selectedFY]);
              
            }
            
            if ($selectedActivity=='download-scoresheet')  {

                    return redirect()->route('simple_pmmu',[$this->selectedRank , $this->selectedUnit ,$this->selectedFY]);
                      
                    }

    }

}