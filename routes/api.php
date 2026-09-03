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

Route::get('projects/{project}', [ProjectController::class, 'show']);

// n.B.: ProjectController::class -> this syntax is called Class Name Resolution
// it is NEITHER a class invoking NOR an access to static properties
// instead, this resolves when compiled returning a STRING containing
// the FQCN (FULLY QUALIFIED CLASS NAME), WHICH IS THE 
// NAMESPACE CLASS COMPLETE NAME: 
// Route::get('posts', ['App\Http\Controllers\Api\PostController', 'index']);