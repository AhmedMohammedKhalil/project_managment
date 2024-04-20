<?php

namespace App\Http\Livewire;

use App\Models\project;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $search,$type_id,$projects,$keywords;

    public function mount() {
        $this->type_id = 1;
    }

    public function makeSearch() {
        if($this->search == '')
            $this->projects = project::all();
        else {
            if($this->type_id == 1 ) {
                $this->projects = project::where('title','like','%'.$this->search.'%')->get();
            } else if ($this->type_id == 3 ) {
                $this->keywords = explode('-',$this->search);
                $collection = DB::Table('projects')->select('*');
                foreach($this->keywords as $key => $keyword) {
                    if($key == 0) {
                        $collection->where('subject','like','%'.$keyword.'%');
                    }
                    $collection->orWhere('subject','like','%'.$keyword.'%');
                }
                $this->projects = $collection->get();
            } else if ($this->type_id == 2) {
                //dd($this->type_id);
                $this->projects = project::where('author','like','%'.$this->search.'%')->get();
            }
        }
        $this->emitTo(searching::class,'showprojects',$this->projects);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
