<?php

namespace App\Http\Livewire\User\Project;

use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{

    public $title,$author,$isbn,$classification_number,$pages_number,
    $Project_height,$publishing_house,$publishing_location,$publishing_year,
    $printer_number,$subject,$Project;


    public function mount($Project_id)
    {
        $this->Project = Project::find($Project_id);
        $this->title = $this->Project->title;
        $this->author = $this->Project->author;
        $this->isbn = $this->Project->isbn;
        $this->classification_number = $this->Project->classification_number;
        $this->pages_number = $this->Project->pages_number;
        $this->Project_height = $this->Project->Project_height;
        $this->publishing_house = $this->Project->publishing_house;
        $this->publishing_location = $this->Project->publishing_location;
        $this->publishing_year = $this->Project->publishing_year;
        $this->printer_number = $this->Project->printer_number;
        $this->subject = $this->Project->subject;
    }

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة'
    ];

    protected $rules = [
        'title' => ['required'],
        'classification_number' => ['required'],
        'subject' => ['required','max:255'],
    ];

    public function validation($validateData) {
        $array = ['printer_number','Project_height','pages_number','author','isbn','publishing_house','publishing_location','publishing_year'];
        foreach($array as $el) {
            if(!empty($this->{$el})) {
                $validateData = array_merge($validateData , ["{$el}" => $this->{$el}]);
            }
        }
        return $validateData;
    }

    public function edit() {
        $validateData = $this->validate();
        $validateData = $this->validation($validateData);
        //dd($validateData);
        $this->Project->update($validateData);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('user.project.index');
    }
    public function render()
    {
        return view('livewire.user.project.edit');
    }
}
