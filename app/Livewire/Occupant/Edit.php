<?php

namespace App\Livewire\Occupant;

use Livewire\Component;
use App\Models\Occupant;
use Livewire\Attributes\Validate;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;

    public Occupant $occupant;

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

    public function mount()
    {
        $this->fill($this->occupant);
    }

    public function updateOC()
    {
        $validated = $this->validate();

        $this->occupant->update($validated);

        $this->success('Occupant Updated!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.occupant.edit');
    }
}
