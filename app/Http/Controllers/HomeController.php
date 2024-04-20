<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::Limit(10)->get();
        return view('home',compact('projects'));
    }



    public function showproject(Request $r)
    {
        $project = Project::whereId($r->id)->first();
        return view('showProject',compact('project'));
    }





    public function search()
    {
        return view('search');
    }


}
