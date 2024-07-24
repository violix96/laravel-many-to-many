<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 40; $i++) {
            $project = new Project();

            $project->title = $faker->sentence(3);
            $project->description = $faker->text(500);
            $project->languages = 'PHP, JavaScript';
            $project->slug = Str::of($project->title)->slug();
            $project->save();
        }
    }
}
