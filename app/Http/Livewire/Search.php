<?php

namespace App\Http\Livewire;

use App\Models\project;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $search,$type_id,$projects;

    public function mount() {
        $this->type_id = 1;
    }

    public function makeSearch() {
        if($this->search == '')
            $this->projects = project::all();
        else {
            if($this->type_id == 1 ) {
                $this->projects = project::where('title','like','%'.$this->search.'%')->get();
            } else if ($this->type_id == 2) {
                //dd($this->type_id);
                $search = date('Y-m-d',strtotime($this->search));
                $this->projects = project::where('start_date','>=',$search)->get();
            }
        }
        $this->emitTo(searching::class,'showProjects',$this->projects);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
