<?php

namespace App\Livewire\Occupant;

use App\Models\Occupant;
use Livewire\Component;

class View extends Component
{

    public Occupant $occupant;

    public function render()
    {
        return view('livewire.occupant.view');
    }
}
