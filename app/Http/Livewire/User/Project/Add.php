<?php

namespace App\Http\Livewire\User\Project;

use App\Models\Project;
use Livewire\Component;

class Add extends Component
{

    public $title,$start_date,$end_date,$short_description,$phase,
    $uid;

    protected $rules = [
        'title' => ['required'],
        'start_date' => ['required'],
        'end_date' => ['required', 'after:start_date'],    
        'short_description' => ['required','max:255'],
        'phase' => ['required'],
    ];

    public function add() {
        $validateData = $this->validate();

        Project::create(array_merge($validateData, ['uid' => auth('user')->user()->id]));
        session()->flash('message', "create process done");
        return redirect()->route('user.project.index');
    }
    public function render()
    {
        return view('livewire.user.project.add');
    }
}
