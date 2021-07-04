<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('solution')->nullable();
            $table->bigInteger('normal_problem_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('verdict')->default('pending');
            // verdict can be pending, wrong, correct
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normal_submissions');
    }
}
