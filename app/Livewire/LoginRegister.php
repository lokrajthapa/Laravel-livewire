<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginRegister extends Component
{ 
    public $name, $email, $password, $users;

    public  $registerForm = false;


    public function render()
    {
        return view('livewire.login-register');
    }

    private function resetInputFields()
    {
        $this->name = '';

        $this->email = '';

        $this->password = '';

    }

    public function login()
    {
        $validateData = $this->validate([
           'email'=> 'required|email',
           'password'=>'required'
        ]);

        if(\Auth::attempt(['email' => $email, 'password' => $password]))
        {
          session()->flash('message','You are login successfully.');
        }
        else{
            session()->flash('error','Invalid credentials');
        }


    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
         $validateData = $this->validate([
           'email'=> 'required|email',
           'name'=> 'required',
           'password'=>'required'
        ]);
        $this->password = Hash::make($this->password);

        User::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password
        ]);
        session()->flash('message','your account has been registered successfully, go to login page');

        $this->resetInputFields();



    }




}
