<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Searching extends Component
{
    public $projects;
    public $flag = false;

    protected $listeners = [
        'showProjects',
    ];


    public function showProjects($projects) {
        $this->flag = true;
        if($projects) {
            $ids = [];
            foreach($projects as $project) {
                $ids[] = $project['id'];
            }
            $this->projects = Project::find($ids);
        } else {
            $this->projects = '';
        }

    }
    public function render()
    {
        $this->projects = $this->flag == true ? $this->projects : Project::all();
        return view('livewire.searching');
    }
}
