<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePlacementInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_placement_information', function (Blueprint $table) {
            $table->id();  
            $table->string('profile_id')->nullable();
            $table->string('english_placement')->nullable();
            $table->string('math_placement')->nullable();
            $table->string('math_challenge_test')->nullable();
            $table->string('language_selection')->nullable();
            $table->string('language_placement_test')->nullable();
            $table->string('languages')->nullable();
            $table->string('choose_other_language')->nullable();
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
        Schema::dropIfExists('course_placement_information');
    }
}
