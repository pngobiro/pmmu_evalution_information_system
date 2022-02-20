<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

 

    public function increment()

    {

        $this->count++;
        session()->flash('message', 'Post successfully updated.');
    }

    public function decrement()

    {

        $this->count--;

    }

 

    public function render()

    {

        return view('livewire.counter');

    }
}
