<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Indicator;


class IndicatorForm extends Component
{
    public $indicator;

    public $indicator_achivement;

    public $indicator_performance_score;

    public function mount($indicator_id) {
        $this->indicator = Indicator::find($indicator_id);
        $this->indicator_achivement = $this->indicator->indicator_achivement ;
        $this->indicator_performance_score = $this->indicator->indicator_performance_score;
    }

    public function render()
    {
        return view('livewire.indicator-form');
    }

    public function updated($name, $value) {
        $this->indicator->indicator_achivement = $value;
        $this->indicator->save();
        $this->indicator_achivement = $this->indicator->indicator_achivement ;
        $this->indicator_performance_score = $this->indicator->indicator_performance_score;
 
        session()->flash('message', 'Indicator successfully updated.');
    }
    
}


