<?php

namespace App\Livewire\User\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();

        return $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.user.auth.logout');
    }
}
