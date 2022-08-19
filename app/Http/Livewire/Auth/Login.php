<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login(){
        
        $this->validate();

        $credentials = ['email'=>$this->email, 'password'=>$this->password];
       
        if(Auth::attempt($credentials)){
            $this->reset('email', 'password');
            if(Auth::user()->is_admin){
                return redirect()->route("dashboard");
            }else{
                return redirect()->route("profile");
            }
        }

        $this->reset('email', 'password');
        return redirect()->route("login")->with('error','Login details are not valid');
    }
}
