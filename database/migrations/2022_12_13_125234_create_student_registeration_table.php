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
        Schema::create('student_registeration', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('preffered_first_name')->nullable();
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('student_phone_number');
            $table->string('t-shirt_size');
            $table->string('religion');
            $table->string('racial')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('current_school')->nullable();
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
