<?php

namespace App\Livewire\Auth;

use Mary\Traits\Toast;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    use Toast;

    #[Validate('required|email')]
    public $email = '';

    #[Validate('required')]
    public $password = '';

    public function authUser()
    {
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            $this->success('Logging In', position: 'toast-top toast-center');
            return redirect()->to('/');
        }
            $this->error('Wrong Credentials');
            return redirect()->back();
    }

    #[Layout('components.layouts.guest')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
