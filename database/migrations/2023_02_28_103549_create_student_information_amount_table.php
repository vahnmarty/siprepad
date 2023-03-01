<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationAmountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information_amount', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->nullable();
            $table->integer('application_id')->nullable();
            $table->string('S1_Has_Financial_Aid', 150)->nullable();
            $table->string('S1_Financial_Aid_Status', 150)->nullable();
            $table->string('S1_Yearly_Financial_Aid_Amount', 150)->nullable();
            $table->string('S1_Total_Financial_Aid', 150)->nullable();
            $table->string('S1_Registration_Deposit_Amount', 150)->nullable();
            $table->string('S2_Has_Financial_Aid', 150)->nullable();
            $table->string('S2_Financial_Aid_Status', 150)->nullable();
            $table->string('S2_Yearly_Financial_Aid_Amount', 150)->nullable();
            $table->string('S2_Total_Financial_Aid', 150)->nullable();
            $table->string('S2_Registration_Deposit_Amount', 150)->nullable();
            $table->string('S3_Has_Financial_Aid', 150)->nullable();
            $table->string('S3_Financial_Aid_Status', 150)->nullable();
            $table->string('S3_Yearly_Financial_Aid_Amount', 150)->nullable();
            $table->string('S3_Total_Financial_Aid', 150)->nullable();
            $table->string('S3_Registration_Deposit_Amount', 150)->nullable();
            $table->string('course_1', 150)->nullable();
            $table->string('course_2', 150)->nullable();
            $table->string('course_3', 150)->nullable();
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
        Schema::dropIfExists('student_information_amount');
    }
}
