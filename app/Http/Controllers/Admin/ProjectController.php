<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index", compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); // save request data in associative array
        
        $newProject = new Project; // instantiate new row in db for Project Table
        $newProject->title = $data['title']; //assign saved data to field
        $newProject->{'tech stack'} = $data['tech_stack'];
        $newProject->{'github link'} = $data['github_link'];
        $newProject->client = $data['client'];
        $newProject->description = $data['description'];

        $newProject->save(); // save in the db

        return redirect()->route("projects.show", $newProject); //return redirect to show post page

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project") );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project) 
    {
        return view("projects.edit", compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
