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

  

    public $selectedRank = NULL;
    public $selectedFY = NULL;

  

   

  

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

    public function updatedSelectedRank($rank)

    {

        if (!is_null($rank)) {

            $this->units = Unit::where('unit_rank_id', $rank)->get();

            $this->fys = FinancialYear::all();

            
        }


    }


    public function selectedFY($fy){

        if (!is_null($fy)){

            return redirect()->to('/contact-form-success');

        }



    }

    

}