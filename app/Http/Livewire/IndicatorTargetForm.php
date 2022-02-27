<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Indicator;

class IndicatorTargetForm extends Component

{
    public $indicator;

    public $indicator_target;

    public function mount($indicator_id) {
        $this->indicator = Indicator::find($indicator_id);
        $this->indicator_target = $this->indicator->indicator_target ;

    }
    public function render()
    {
        return view('livewire.indicator-target-form');
    }

    public function updated($name, $value) {
        $this->indicator->indicator_target = $value;
        $this->indicator->save();
        $this->indicator_target = $this->indicator->indicator_target ;

 
        session()->flash('message', 'Indicator successfully updated.');
    }
}
