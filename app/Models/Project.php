<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'github_link',
        'tech_stack',
        'client',
        'description'
    ];
}
