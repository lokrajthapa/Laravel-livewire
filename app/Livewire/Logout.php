<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
      
        Auth::logout();
        // session()->invalidate();
        // session()->flash('success', 'You have been logged out.');
       
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
