<?php
namespace App\Http\Livewire;
use App\Models\Unit;
use App\Models\UnitRank;
use Livewire\Component;
class Dropdowns extends Component
{
    public $rank;
    public $units=[];
    public $unit;

    public function mount($rank, $unit)
    {
        $this->rank=$rank;
        $this->unit=$unit;
    }
    
    public function render()
    {
        if(!empty($this->rank)) {
            $this->units = Unit::where('unit_rank_id', $this->rank)->get();
        }
        return view('livewire.dropdowns')
            ->withUnitRank(UnitRank::orderBy('name')->get());
    }
}