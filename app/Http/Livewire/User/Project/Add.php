<?php

namespace App\Http\Livewire\User\Project;

use App\Models\Project;
use Livewire\Component;

class Add extends Component
{

    public $title,$start_date,$end_date,$short_description,$phase,
    $uid;

    public function mount() {
        $this->phase = 'design';
    }
    protected $rules = [
        'title' => ['required'],
        'start_date' => ['required', 'date'],
        'end_date' => ['required', 'after:start_date'],
        'short_description' => ['required','max:255'],
        'phase' => ['required'],
    ];

    public function updatedStartDate()
    {
        $validatedata = $this->validate(
            [
                'start_date' => ['required', 'date', 'after_or_equal:' . now()->format('Y-m-d')],
                'end_date' => ['required', 'date', 'after:start_date'],
            ]
        );
    }

    public function updatedEndDate()
    {
        $validatedata = $this->validate(
            [
                'end_date' => ['required', 'date', 'after:start_date'],
            ]
        );
    }

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
