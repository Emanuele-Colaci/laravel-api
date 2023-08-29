<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Frontend', 'Backend', 'Fullstack', 'Design', 'DevOps'];

        foreach ($types as $type) {
            $types = new Type();

            $types->name = $type;

            $types->save();
        }
    }
}
