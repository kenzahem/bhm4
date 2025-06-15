<?php

namespace App\Livewire\Occupant;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Occupant;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Index extends Component
{
    use Toast, WithPagination;

    public function headers()
    {
        return [
            ['key' => 'lastname', 'label' => 'Last Name'],
            ['key' => 'firstname', 'label' => 'First Name'],
            ['key' => 'middlename', 'label' => 'Middle Name'],
            ['key' => 'entry_date', 'label' => 'Date of Entry', 'format' => ['date', 'm/d/Y']],
        ];
    }

    public function occupants()
    {
        return collect(Occupant::all());
    }

    public function render()
    {
        return view('livewire.occupant.index',[
            'occupants' => $this->occupants(),
            'headers' => $this->headers()
        ]);
    }
}
