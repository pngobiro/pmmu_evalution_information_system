<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Indicator;

class IndicatorWeightForm extends Component
{
    public $indicator;

    public $indicator_weight;

    public function mount($indicator_id)
    {
        $this->indicator = Indicator::find($indicator_id);
        $this->indicator_weight = $this->indicator->indicator_weight ;

    }

    public function render()
    {
        return view('livewire.indicator-weight-form');
    }

    public function updated($name, $value)
    {
        $this->indicator->indicator_weight = $value;
        $this->indicator->indicator_weight_created_by = auth()->user()->id;
        $this->indicator->save();
        $this->indicator_weight = $this->indicator->indicator_weight ;

        session()->flash('message', 'Indicator Weight successfully updated.');
    }
    
}
