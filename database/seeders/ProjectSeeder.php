<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 10; $i++){
            $project = new Project();
            $project->titolo = $faker->word();
            $project->image = $faker->imageUrl(640, 480, 'project', true);
            $project->descrizione = $faker->paragraph();
            $project->data = $faker->dateTimeThisYear();
            $project->save();
        }
    }
}
