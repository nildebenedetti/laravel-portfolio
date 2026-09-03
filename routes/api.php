<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// we are returning INDEX and SHOW actions 
// of respective methods as defined in the
// controller, to the api views

// address: http://127.0.0.1/8000/api/projects 

Route::get('projects', [ProjectController::class, 'index']);