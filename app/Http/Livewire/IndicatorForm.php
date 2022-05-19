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
        $this->indicator_graded_score = $this->indicator->indicator_graded_score;

    }

    public function render()
    {
        return view('livewire.indicator-form');
    }

    protected $rules = [

        //'indicator.indicator_achivement' => 'required|numeric|min:0|max:100',




    ];

    public function updated($name, $value) {
        $this->indicator->indicator_achivement = $value;
        $this->indicator->indicator_achivement_created_by = auth()->user()->id;
        $this->indicator->save();
        $this->indicator_achivement = $this->indicator->indicator_achivement ;
        $this->indicator_performance_score = $this->indicator->indicator_performance_score;
        $this->indicator_raw_score = $this->indicator->indicator_raw_score;
        $this->indicator_weighted_score = $this->indicator->indicator_weighted_score;
        $this->indicator_graded_score = $this->indicator->indicator_graded_score;
 
        session()->flash('message', 'Indicator successfully updated.');
    }

}


