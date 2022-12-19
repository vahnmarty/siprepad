<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterationCourseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registeration_course_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('english_placement')->nullable();
            $table->string('math_placement');
            $table->string('language')->nullable();
            $table->string('language_placement_test');
            $table->string('checks_apply_to_language')->nullable();
            $table->string('open_to_choosing_another_language');
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
        Schema::dropIfExists('registeration_course_infos');
    }
}
