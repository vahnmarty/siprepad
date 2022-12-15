<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegisterationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registerations', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('preffered_first_name')->nullable();
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('student_phone_number');
            $table->string('tshirt_size');
            $table->string('religion')->nullable();
            $table->string('racial')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('current_school')->nullable();
            $table->enum('last_step_complete', ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'])->nullable();
            
            
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
        Schema::dropIfExists('student_registeration');
    }
}
