<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
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
        $types = Type::all();
        $technologies = Technology::all();

        return view("projects.create", compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $data = $request->all(); // save request data in associative array
        
        $newProject = new Project; // instantiate new row in db for Project Table
        $newProject->title = $data['title']; //assign saved data to field
        $newProject->type_id = $data['type_id'];
        $newProject->tech_stack = $data['tech_stack'];
        $newProject->github_link = $data['github_link'];
        $newProject->client = $data['client'];
        $newProject->description = $data['description'];

        $newProject->save(); // save in the db

        // Notice: after saving the post
        $newProject->technologies()->attach($data['technologies']); 
        // we are appending the array we created in checkbox inputs
        // CONTAINING TECHNOLOGIES IDS 
        // which needs to be associated in the pivot table
        // to the id of the new project instantiated

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
        $types = Type::all();
        return view("projects.edit", compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all(); //extract data from request

        //then update all fields with update method
        $project->update($data);
        
        // dd($data);
        // we do not need to save as ->save() creates
        // a new row in db, which is NOT needed

        // so we proceed redirecting
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
