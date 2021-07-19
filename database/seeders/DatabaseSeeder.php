<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\NormalProblem;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(){
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            $new_article = new Article;
            $new_article->title = 'fucking title';
            $new_article->short_description = 'this is a short description';
            $new_article->article='this is an article';
            $new_article->user_id = 1;
            $new_article->og_image = '#';


            $new_article->save();
        }
    }
}
