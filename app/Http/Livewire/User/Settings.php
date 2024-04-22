<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Settings extends Component
{
    use WithFileUploads;
    public $username='', $email='',$user_id='';


    public function mount() {
        $this->user_id = Auth::guard('user')->user()->id;
        $this->username = Auth::guard('user')->user()->username;
        $this->email = Auth::guard('user')->user()->email;

    }

    protected $rules = [
        'username' => ['required', 'string', 'max:50'],
    ];


    public function edit() {
        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [ 'email'   => ['required','email',"unique:users,email,".$this->user_id]
        ]));
        user::whereId($this->user_id)->update($validatedata);
        session()->flash('message', "Your Profile Updated.");
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.settings');
    }
}
