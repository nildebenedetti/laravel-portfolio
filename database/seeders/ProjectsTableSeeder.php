<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(Faker $faker): void
    {

        //SUPER FUN: get all ids from Technology model
        $technologiesIds = Technology::pluck('id')->toArray();

        for ($i = 0; $i <10; $i++) {
            
        $newProject = new Project();

        $newProject->title = $faker->words(3, true);
        $newProject->type_id = rand(1, 5);
        $newProject->github_link = $faker->url();
        $newProject->client = $faker->company();
        $newProject->description = $faker->paragraphs(4, true);

        $newProject->save();

        //
        $randomTechs = $faker->randomElements($technologiesIds, rand(2, 5));

        $newProject->technologies()->attach($randomTechs);

        }

    }
}
