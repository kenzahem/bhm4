<?php

namespace App\Livewire\Occupant;

use Mary\Traits\Toast;
use Livewire\Component;
use App\Models\Occupant;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{

    use Toast, WithFileUploads;

    #[Validate('required|image|max:5000')]
    public $pic_id = '';

    #[Validate('required')]
    public $firstname = '';

    #[Validate('sometimes')]
    public $middlename = '';

    #[Validate('required')]
    public $lastname = '';
    #[Validate('required')]
    public $origin_address = '';

    #[Validate('required')]
    public $entry_date = '';

    #[Validate('sometimes')]
    public $exit_date = '';

    public function addOc()
    {
        $this->validate();

        Occupant::create([
            'pic_id' => $this->pic_id,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'origin_address' => $this->origin_address,
            'entry_date' => $this->entry_date,
            'exit_date' => $this->exit_date

        ]);

        $this->reset();

        $this->success('Occupant Record Added!');

        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.occupant.create');
    }
}
