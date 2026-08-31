<?php

namespace Database\Seeders;

use App\Models\Project;
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
        for ($i = 0; $i <10; $i++) {
            
        $newProject = new Project();

        $newProject->title = $faker->words(3, true);
        $newProject->tech_stack = $faker->words(5, true);
        $newProject->github_link = $faker->url();
        $newProject->client = $faker->company();
        $newProject->description = $faker->paragraphs(4, true);

        $newProject->save();
        }

    }
}
