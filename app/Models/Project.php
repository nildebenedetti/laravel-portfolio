<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public const STACK_FULL = 'full_stack';
    public const STACK_FRONT = 'front_end';
    public const STACK_BACK = 'back_end';

    public static function getStackTypes(): array
    {
        return [
            self::STACK_FULL => 'Full Stack',
            self::STACK_FRONT => 'Frontend',
            self::STACK_BACK => 'Backend',
        ];
    }

    protected $fillable = [
        'title',
        'type_id',
        'github_link',
        'frontend_github_link',
        'backend_github_link',
        'client',
        'live_link,',
        'description',
        'image',
        'alt_text',
        'video_ID',
        'date',
        'stack_type',

    ];

    // define methods for allowing dependencies
    
    public function type () {

        return $this->belongsTo(Type::class);
    }

    public function technologies() {

        return $this->belongsToMany(Technology::class);
    }
}
