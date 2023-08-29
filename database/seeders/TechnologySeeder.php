<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologys = ['Html', 'Css', 'VueJs', 'Laravel', 'Phyton', 'JavaScript', 'TypeScript', 'Angular'];

        foreach ($technologys as $technologyName) {
            $technology = new Technology();

            $technology->name = $technologyName;

            $technology->save();
        }
    }
}
