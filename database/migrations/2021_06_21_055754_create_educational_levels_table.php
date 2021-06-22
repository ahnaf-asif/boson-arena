<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEducationalLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->default('');
            $table->bigInteger('participant_category');
            $table->timestamps();
        });
        for($i = 1; $i <= 12;$i++){
            $str = "Class {$i}";
            DB::table('educational_levels')->insert(array('name'=>$str, 'participant_category'=>1));
        }
        DB::table('educational_levels')->insert(array('name'=>'Polytechnic 1st year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'Polytechnic 2nd year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'Polytechnic 3rd year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'Polytechnic 4th year', 'participant_category'=>1));

        DB::table('educational_levels')->insert(array('name'=>'University 1st year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'University 2nd year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'University 3rd year', 'participant_category'=>1));
        DB::table('educational_levels')->insert(array('name'=>'University 4th year', 'participant_category'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educational_levels');
    }
}
