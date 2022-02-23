<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IndicatorGroup;
use App\Models\Indicator;

class UpdatePmmu extends Component
{


    public $indicatorgroups ;
    public $message=0;
    public $result=0;


    public function mount()

    {
        $this->indicatorgroups = IndicatorGroup::all();
      
      
        
    }





    public function render()
    {
        return view('livewire.update-pmmu');
    }

    public function updateIndicator(Indicator $indicator)

    {
        $indicator->update(['indicator_achivement' => true]);
       // $this->result = $this->message*$this->message;

    }
}
