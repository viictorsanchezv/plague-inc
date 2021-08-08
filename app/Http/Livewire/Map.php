<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $civil, $militar, $gobierno, $postCount;

    public function render()
    {
        return view('livewire.map');
    }

    protected $listeners = ['postAdded' => 'incrementPostCount'];

    public function incrementPostCount()
    {
        $this->postCount += 1;
    }
}
