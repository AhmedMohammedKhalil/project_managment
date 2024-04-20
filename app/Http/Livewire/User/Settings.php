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
    public $name='', $email='',$c_number='', $image,$user_id='';


    public function mount() {
        $this->user_id = Auth::guard('user')->user()->id;
        $this->name = Auth::guard('user')->user()->name;
        $this->email = Auth::guard('user')->user()->email;
        $this->c_number = Auth::guard('user')->user()->c_number;

    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا الإيميل غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'unique' => 'هذا الايميل مسجل فى الموقع',
        'image' => 'لابد ان يكون المف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا'
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
    ];

    public function updatedImage()
    {
            $validatedata = $this->validate(
                ['image' => ['image','mimes:jpeg,jpg,png','max:2048']]
            );
    }

    public function edit() {
        $validatedata = $this->validate(
            array_merge(
                $this->rules,
                [ 'email'   => ['required','email',"unique:users,email,".$this->user_id],
                'c_number'   => ['required',"unique:users,c_number,".$this->user_id],
        ]));
        if(!$this->image)
            user::whereId($this->user_id)->update($validatedata);
        if($this->image) {
            $imagename = $this->image->getClientOriginalName();
            user::whereId($this->user_id)->update(array_merge($validatedata,['image' => $imagename]));
            $dir = public_path('img/users/'.$this->user_id);
            if (file_exists($dir))
                File::deleteDirectory($dir);
            mkdir($dir);
            $this->image->storeAs('users/'.$this->user_id,$imagename);
            File::deleteDirectory(public_path('img/livewire-tmp'));
        }
        session()->flash('message', "Your Profile Updated.");
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.settings');
    }
}
