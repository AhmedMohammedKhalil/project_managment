<?php

namespace App\Http\Livewire;

use App\Models\project;
use Livewire\Component;

class Searching extends Component
{
    public $projects;
    public $flag = false;

    protected $listeners = [
        'showprojects',
    ];


    public function showprojects($projects) {
        $this->flag = true;
        if($projects) {
            $ids = [];
            foreach($projects as $project) {
                $ids[] = $project['id'];
            }
            $this->projects = project::find($ids);
        } else {
            $this->projects = '';
        }

    }
    public function render()
    {
        $this->projects = $this->flag == true ? $this->projects : project::all();
        return view('livewire.searching');
    }
}
