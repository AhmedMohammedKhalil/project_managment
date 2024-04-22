<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Login extends Component
{


    public $email;
    public $password;

    protected $rules = [
        'email'   => 'required|email|exists:users,email',
        'password' => 'required|min:8'
    ];

    public function login(){
        $validatedData = $this->validate();
        if(Auth::guard('user')->attempt($validatedData)){

            session()->flash('message', "you login successfully");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'invalid Email or password ');
        }
    }
    public function render()
    {
        return view('livewire.user.login');
    }
}
