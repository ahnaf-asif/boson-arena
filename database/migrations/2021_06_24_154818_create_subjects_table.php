<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('subjects')->insert(array('name' => 'Mathematics'));
        DB::table('subjects')->insert(array('name' => 'Physics'));
        DB::table('subjects')->insert(array('name' => 'Biology'));
        DB::table('subjects')->insert(array('name' => 'Chemistry'));
        DB::table('subjects')->insert(array('name' => 'Astronomy'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
