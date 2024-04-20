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
    public $name, $email,$civil_number, $image, $password,$phone, $confirm_password, $user_id;


    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        'email' => 'هذا البريد الإلكترونى غير صحيح',
        'name.max' => 'لابد ان يكون الحقل مكون على الاكثر من 50 خانة',
        'email.unique' => 'هذا البريد الإلكترونى مسجل فى الموقع',
        'same' => 'لابد ان يكون كلمة السر متطابق',
        'image' => 'لابد ان يكون الملف صورة',
        'mimes' => 'لابد ان يكون الصورة jpeg,jpg,png',
        'image.max' => 'يجب ان تكون الصورة اصغر من 2 ميجا',
        'civil_number.unique' => 'هذا الرقم المدنى مسجل فى الموقع',
        'civil_number.max' => 'لابد ان يكون الرقم المدنى 12 رقم',
        'civil_number.min' => 'لابد ان يكون الرقم المدنى 12 رقم',
        'phone.max' => 'لابد ان يكون الرقم المدنى 8 رقم',
        'phone.min' => 'لابد ان يكون الرقم المدنى 8 رقم'
    ];

    protected $rules = [
        'name' => ['required', 'string', 'max:50'],
        'phone' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:8','max:8'],
        'email'   => ['required', 'email', "unique:users,email"],
        'civil_number'   => ['required', 'min:12','max:12','regex:/^([0-9\s\-\+\(\)]*)$/', "unique:users,civil_number"],
        'password' => ['required','min:8'],
        'confirm_password' => ['required','min:8', 'same:password']

    ];

    public function updatedImage()
    {
        $validatedata = $this->validate(
            ['image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048']]
        );
    }

    public function register()
    {
        $validatedata = $this->validate();
        $validatedata = array_merge(
            $validatedata,
            ['password' => Hash::make($this->password)]
        );
        if (!$this->image)
            User::create($validatedata);
        if ($this->image) {
            $this->updatedImage();
            $imagename = $this->image->getClientOriginalName();
            $user = User::create(array_merge($validatedata, ['image' => $imagename]));
            ImageStore::store('assets/images/users/'.$user->id,$this->image,$imagename);
            File::deleteDirectory(public_path('livewire-tmp'));
        }
        if(Auth::guard('user')->attempt(['email' => $this->email,'password' => $this->password])){

            session()->flash('message', "تم دخولك ينجاح");
            return redirect()->route('home');
        }else{
            session()->flash('error', 'هناك خطا فى الايميل او الباسورد');
        }
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('user.profile');
    }

    public function render()
    {
        return view('livewire.user.register');
    }
}
