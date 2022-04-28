<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Indicator;


class IndicatorForm extends Component
{
    public $indicator;

    public $indicator_achivement;

    public $indicator_performance_score;

    public $indicator_raw_score;

    public $indicator_weighted_score;

    public $indicator_graded_score;

    public function mount($indicator_id) {
        
        $this->indicator = Indicator::find($indicator_id);
        $this->indicator_achivement = $this->indicator->indicator_achivement ;
        $this->indicator_performance_score = $this->indicator->indicator_performance_score;
        $this->indicator_raw_score = $this->indicator->indicator_raw_score;
        $this->indicator_weighted_score = $this->indicator->indicator_weighted_score;
        $this->indicator_graded_score= $this->indicator->indicator_graded_score;

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
        $this->indicator_raw_score = $this->indicator->indicator_raw_score;
        $this->indicator_weighted_score = $this->indicator->indicator_weighted_score;
        $this->indicator_graded_score = $this->indicator->indicator_graded_score;
 
        session()->flash('message', 'Indicator successfully updated.');
    }

    //validate indicator achivement
    public function validateIndicatorAchivement($value) {
        return $value > 0 && $value <= 300;
        
    }





    
}


