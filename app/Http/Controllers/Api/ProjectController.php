<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // 1. INDEX - shall return a JSON file with ALL PROJECTS

    public function index() {

        // Extract necessary info to be provided by API
        $projects = Project::all();

        // return a JSON file <3 
        // finally back!!!
        return response()->json([
            "success" => true,
            "data" => $projects
        ]);

    }

    // 2. SHOW - Shall return a JSON containing ONE project 
    // corresponding to received id
    // complete with all related resources
//     public function show(Project $project) {
//         // extract desired data

//         // return JSON file
//     }

// }
