<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // define as father: 1 type has many projects
    public function projects () {
        // let's create a method for allowing projects binding
        return $this->hasMany(Project::class); 


    }
}
