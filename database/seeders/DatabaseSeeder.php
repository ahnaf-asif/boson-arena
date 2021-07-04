<?php

namespace Database\Seeders;

use App\Models\NormalProblem;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(){
//        $faker = Faker::create();
//        foreach (range(101,500) as $index) {
        NormalProblem::truncate();
//        }
    }
}
