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

    // define method for allowing dependency 
    public function type () {
        return $this->belongsTo(Type::class);
    }
}
