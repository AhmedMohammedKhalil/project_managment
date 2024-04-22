<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Helper\ImageStore;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class Register extends Component
{
    use WithFileUploads;
    public $username, $email, $password, $confirm_password, $user_id;



    protected $rules = [
        'username' => ['required', 'string', 'max:50'],
        'email'   => ['required', 'email', "unique:users,email"],
        'password' => ['required','min:8'],
        'confirm_password' => ['required','min:8', 'same:password']

    ];

    public function register()
    {
        $validatedata = $this->validate();
        $validatedata = array_merge(
            $validatedata,
            ['password' => Hash::make($this->password)]
        );
        User::create($validatedata);
        if(Auth::guard('user')->attempt(['email' => $this->email,'password' => $this->password])){

            session()->flash('message',"you login successfully");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'invalid Email or password');
        }
        session()->flash('message', "Process done successfully");
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.register');
    }
}
