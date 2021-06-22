<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateParticipantCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200)->default('');
            $table->timestamps();
        });
        DB::table('participant_categories')->insert(array('name'=>'Junior'));
        DB::table('participant_categories')->insert(array('name'=>'Secondary'));
        DB::table('participant_categories')->insert(array('name'=>'Higher Secondary'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant_categories');
    }
}
