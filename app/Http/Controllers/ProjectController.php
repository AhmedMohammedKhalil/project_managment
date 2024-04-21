<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = auth('user')->user()->projects->get();
        return view('users.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.projects.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $r)
    {
        $project = Project::find($r->id);
        return view('users.projects.show',compact('project'));
    }


    public function edit(Request $r)
    {
        return view('users.projects.edit',['project_id'=>$r->id]);
    }



    public function delete(Request $r)
    {
        Project::whereId($r->id)->delete();
        return redirect()->route('user.project.index');
    }
}
