<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'javascript' => ['name' => 'JavaScript', 'color' => '#E9D44D'],
            'php'        => ['name' => 'PHP',        'color' => '#7377AE'],
            'laravel'    => ['name' =>  'Laravel',   'color' => '#F61500'],   
            'react'      => ['name' => 'React',      'color' => '#5ED3F3'],
            'nodejs'     => ['name' => 'NodeJS',     'color' => '#3D843C'],
            'sql'        => ['name' => 'SQL',        'color' => '#F29111'],
            'html'       => ['name' => 'HTML',       'color' => '#DC4A25'],
            'css'        => ['name' => 'CSS',        'color' => '#094AE5'],
        ];

        foreach ($technologies as $technology) {

            $newTechnology = new Technology();

            $newTechnology->name = $technology['name'];
            $newTechnology->color = $technology['color'];

            $newTechnology->save();

        }

    }
}
