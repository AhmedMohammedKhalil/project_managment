<?php

namespace App\Http\Livewire\User\Project;

use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{

    public $title,$start_date,$end_date,$short_description,$phase,
    $uid,$project;


    public function mount($project_id)
    {
        $this->project = Project::find($project_id);
        $this->title = $this->project->title;
        $this->phase = $this->project->phase;
        $this->start_date = $this->project->start_date;
        $this->end_date = $this->project->end_date;
        $this->short_description = $this->project->short_description;
    }

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
    protected $rules = [
        'title' => ['required'],
        'short_description' => ['required','max:255'],
        'phase' => ['required'],
    ];


    public function edit() {
        $validateData = $this->validate();
        if($this->start_date){
            $validateData= array_merge($validateData,['start_date'=>$this->start_date]);
        }
        if($this->end_date){
            $validateData= array_merge($validateData,['end_date'=>$this->end_date]);
        }
        $this->project->update($validateData);
        session()->flash('message', "update process Done successfully");
        return redirect()->route('user.project.index');
    }
    public function render()
    {
        return view('livewire.user.project.edit');
    }
}
