<?php

namespace App\Http\Livewire\User\Project;

use App\Models\Project;
use Livewire\Component;

class Add extends Component
{

    public $title,$author,$isbn,$classification_number,$pages_number,
    $Project_height,$publishing_house,$publishing_location,$publishing_year,
    $printer_number,$subject,$image;

    protected $messages = [
        'required' => 'ممنوع ترك الحقل فارغاَ',
        'max' => 'لابد ان يكون الحقل مكون على الاكثر من 255 خانة'
    ];

    protected $rules = [
        'title' => ['required'],
        'classification_number' => ['required'],
        'subject' => ['required','max:255'],
        'image' => ['required']
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

    public function add() {
        $this->image = 'Project-'.rand(1,10).'.jpg';
        $validateData = $this->validate();
        $validateData = $this->validation($validateData);
        Project::create($validateData);
        session()->flash('message', "تم إتمام العملية بنجاح");
        return redirect()->route('user.Project.index');
    }
    public function render()
    {
        return view('livewire.user.project.add');
    }
}
