<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    
    public function index () {
        $user = Auth::user();
        return $user->id;
    }

    public function profile () {
        $user = Auth::user();
        $userName = $user->name;

        return $userName;
    }

}
