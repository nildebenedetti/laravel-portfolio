<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $newProject->stack_type = $data['stack_type'];      
        $newProject->description = $data['description'];
        $newProject->video_ID = $data['video_ID'];
        $newProject->date = $data['date'];

        // handle stack_type
        // if stacktype is full_stack, we store frontend and backend github link
        // if is either frontend or backend we store just github link

        if ( $data['stack_type'] === Project::STACK_FULL ) {

            $newProject->frontend_github_link = $data['frontend_github_link'] ?? null;
            $newProject->backend_github_link = $data['backend_github_link'] ?? null;

        } elseif ($data['stack_type'] === Project::STACK_FRONT || $data['stack_type'] === Project::STACK_BACK ) {
            $newProject->github_link = $data['github_link'] ?? null;
        }


        if (array_key_exists('client', $data) ) {
            $newProject->client = $data['client'];
        }

        if ( array_key_exists('live_link', $data)) {
                $newProject->live_link = $data['live_link'];
        }

        // if main image exists, save it
        if(array_key_exists('image', $data)) {
            $img_path = Storage::putFile('projects', $data['image']);
            $newProject->image = $img_path;
        }

        // same for secondary images
        if (array_key_exists('image_pt_1', $data)) {
            $img_path_pt_first = Storage::putfile('projects', $data['image_pt_1']);
            $newProject->image_pt_1= $img_path_pt_first;
        }

        
        if (array_key_exists('image_pt_2', $data)) {
            $img_path_pt_second = Storage::putfile('projects', $data['image_pt_2']);
            $newProject->image_pt_2= $img_path_pt_second;
        }

        if (array_key_exists('image_pt_3', $data)) {
            $img_path_pt_third = Storage::putfile('projects', $data['image_pt_3']);
            $newProject->image_pt_3= $img_path_pt_third;
        }

        if (array_key_exists('image_pt_4', $data)) {
            $img_path_pt_fourth = Storage::putfile('projects', $data['image_pt_4']);
            $newProject->image_pt_4= $img_path_pt_fourth;
        }

        if(array_key_exists('alt_text', $data)) {
            $newProject->alt_text = $data['alt_text'];
        }

        $newProject->save(); // save in the db

        if (!empty($data['technologies'])) {
            $newProject->technologies()->attach($data['technologies']);
        }

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
        $technologies = Technology::all();
        return view("projects.edit", compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $data = $request->all(); //extract data from request

        // never overwrite existing images with empty file inputs
        foreach (['image', 'image_pt_1', 'image_pt_2', 'image_pt_3', 'image_pt_4'] as $imageField) {
            if (! $request->hasFile($imageField)) {
                unset($data[$imageField]);
            }
        }

        // manipulate array in case an image is present

        if ($request->hasFile('image')) {

            if($project->image) {
                // this is just in case we already have an image inb the db
                Storage::delete($project->image);

            }

            // in any case we need to upload the new one
            // so we are, in just 1 row:
            // 1. writing a new file on disk
            // 2. overriding thew field data['image'] with the string created by Storage::putFile method
            $data['image'] = Storage::putFile('projects', $data['image']);
            
        }

        // handle secondary images: replace the file and remove the old one
        foreach (['image_pt_1', 'image_pt_2', 'image_pt_3', 'image_pt_4'] as $imageField) {
            if ($request->hasFile($imageField)) {

                if ($project->{$imageField}) {
                    Storage::delete($project->{$imageField});
                }

                $data[$imageField] = Storage::putFile('projects', $request->file($imageField));
            }
        }

        // remove the links that do not belong to the selected stack type,
        // so switching stack type does not leave stale links in the database
        $stackType = $data['stack_type'] ?? null;

        if ($stackType === Project::STACK_FULL) {
            $data['github_link'] = null;
        } elseif ($stackType === Project::STACK_FRONT || $stackType === Project::STACK_BACK) {
            $data['frontend_github_link'] = null;
            $data['backend_github_link'] = null;
        }

        // then update all fields with update method

        $project->update($data);


        // we do not need to save as ->save() creates
        // a new row in db, which is NOT needed

        // We need to sync the pivot table
        $project->technologies()->sync($request->input('technologies', []));
        // if not present, empty array

        // after that we proceed redirecting
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {   
        // remove associations before deleting resource 
        // in order to prevent crashhh
        $project->technologies()->detach();

        // remove main and secondary images from storage if present
        foreach (['image', 'image_pt_1', 'image_pt_2', 'image_pt_3', 'image_pt_4'] as $imageField) {
            if ($project->{$imageField}) {
                Storage::delete($project->{$imageField});
            }
        }

        $project->delete();

        return redirect()->route('projects.index');
    }
}
