<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_problems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subject_id')->default(1);
            $table->string('name')->nullable()->default('');
            $table->boolean('archive')->default(false);
            $table->longText('description_en')->nullable()->default('');
            $table->longText('description_bn')->nullable()->default('');
            $table->string('judging_method')->default('manual');
            $table->string('identifier')->unique()->nullable();
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
        Schema::dropIfExists('normal_problems');
    }
}
