<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout(name:'layout.app')]

class Reg extends Component
{
    public function render()
    {
        return view('livewire.reg');
    }
}
