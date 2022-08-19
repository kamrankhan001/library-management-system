<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $name, $email, $mobile_number, $password;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'mobile_number' => 'required|numeric|min:11',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.auth.register');
    }

 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make($this->password);
        
        User::create($validatedData);

        $this->reset('name', 'email', 'mobile_number', 'password');

        return redirect()->route('login')->with('success', "You'r registered. Please Login");
    }
}

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// User::create([
//     'email'=>'admin@admin.com',
//     'name'=>'admin',
//     'mobile_number'=>'03404958934',
//     'password'=>Hash::make('adminadmin'),
//     'is_admin' => true
// ]); 