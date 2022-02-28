<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UnitRank;
use App\Models\FinancialYear;
class ExcelReportsDropdown extends Component
{
    public $ranks;
    public $fys;
    public $selectedRank ;
    public $selectedFY ;

    public function mount()

    {
        $this->ranks = UnitRank::all();
        $this->fys = collect();
        $this->selectedRank = NULL;
        $this->selectedFY = NULL;
    }


    public function render()
    {
        return view('livewire.excel-reports-dropdown');
    }

    public function updatedSelectedRank($selectedRank)

    {
        if (!is_null($selectedRank)) {
            $this->fys = FinancialYear::all();
            $this->selectedRank = $selectedRank;
        }
    }


    public function updatedSelectedFY($selectedFY){

        if (!is_null($selectedFY)){
            $this->selectedFY = $selectedFY;
        
        }

       


    }

}
