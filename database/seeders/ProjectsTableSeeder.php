<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
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
        $stackTypes = array_keys(Project::getStackTypes());

        for ($i = 0; $i <10; $i++) {

        $stackType = $faker->randomElement($stackTypes);
            
        $newProject = new Project();

        $newProject->title = $faker->words(3, true);
        $newProject->type_id = rand(1, 5);
        $newProject->stack_type = $stackType;
        
        if ($stackType === Project::STACK_FRONT) {
                
                $newProject->frontend_github_link = $faker->url();
                $newProject->backend_github_link = null;
                $newProject->github_link = null;
            } 
            elseif ($stackType === Project::STACK_BACK) {
                
                $newProject->backend_github_link = $faker->url();
                $newProject->frontend_github_link = null;
                $newProject->github_link = null;
            } 
        
        $newProject->client = $faker->company();
        $newProject->description = $faker->paragraphs(4, true);
        $newProject->date = $faker->dateTimeBetween('2026-03-01', '2026-11-01')->format('Y-m-d');
        $newProject->video_ID = $faker->regexify('[A-Za-z0-9]{11}');

        $newProject->save();

        //
        $randomTechs = $faker->randomElements($technologiesIds, rand(2, 5));

        $newProject->technologies()->attach($randomTechs);

        }

    }
}
