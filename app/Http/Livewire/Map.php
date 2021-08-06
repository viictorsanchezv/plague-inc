<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $civil, $militar, $gobierno;
    public function render()
    {
        return view('livewire.map');
    }
}
