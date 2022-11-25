<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->string('S1_Photo')->nullable();
            $table->string('S1_First_Name')->nullable();
            $table->string('S1_Middle_Name')->nullable();
            $table->string('S1_Last_Name')->nullable();
            $table->string('S1_Suffix')->nullable();
            $table->string('S1_Preferred_First_Name')->nullable();
            $table->string('S1_Birthdate')->nullable();
            $table->string('S1_Gender')->nullable();
            $table->string('S1_Personal_Email')->nullable();
            $table->string('S1_Mobile_Phone')->nullable();
            $table->string('S1_Race')->nullable();
            $table->string('S1_Ethnicity')->nullable();
            $table->string('S1_Current_School')->nullable();
            $table->string('S1_Current_School_Not_Listed')->nullable();
            $table->string('S1_Other_High_School_1')->nullable();
            $table->string('S1_Other_High_School_2')->nullable();
            $table->string('S1_Other_High_School_3')->nullable();
            $table->string('S1_Other_High_School_4')->nullable();

            $table->string('S2_Photo')->nullable();
            $table->string('S2_First_Name')->nullable();
            $table->string('S2_Middle_Name')->nullable();
            $table->string('S2_Last_Name')->nullable();
            $table->string('S2_Suffix')->nullable();
            $table->string('S2_Preferred_First_Name')->nullable();
            $table->string('S2_Birthdate')->nullable();
            $table->string('S2_Gender')->nullable();
            $table->string('S2_Personal_Email')->nullable();
            $table->string('S2_Mobile_Phone')->nullable();
            $table->string('S2_Race')->nullable();
            $table->string('S2_Ethnicity')->nullable();
            $table->string('S2_Current_School')->nullable();
            $table->string('S2_Current_School_Not_Listed')->nullable();
            $table->string('S2_Other_High_School_1')->nullable();
            $table->string('S2_Other_High_School_2')->nullable();
            $table->string('S2_Other_High_School_3')->nullable();
            $table->string('S2_Other_High_School_4')->nullable();

            $table->string('S3_Photo')->nullable();
            $table->string('S3_First_Name')->nullable();
            $table->string('S3_Middle_Name')->nullable();
            $table->string('S3_Last_Name')->nullable();
            $table->string('S3_Suffix')->nullable();
            $table->string('S3_Preferred_First_Name')->nullable();
            $table->string('S3_Birthdate')->nullable();
            $table->string('S3_Gender')->nullable();
            $table->string('S3_Personal_Email')->nullable();
            $table->string('S3_Mobile_Phone')->nullable();
            $table->string('S3_Race')->nullable();
            $table->string('S3_Ethnicity')->nullable();
            $table->string('S3_Current_School')->nullable();
            $table->string('S3_Current_School_Not_Listed')->nullable();
            $table->string('S3_Other_High_School_1')->nullable();
            $table->string('S3_Other_High_School_2')->nullable();
            $table->string('S3_Other_High_School_3')->nullable();
            $table->string('S3_Other_High_School_4')->nullable();

            $table->string('Applying_for_Grade')->nullable();
            $table->string('Academic_Year_Applying_For')->nullable();
            $table->string('Graduation_Year')->nullable();
            $table->string('Student_Info_Date')->nullable();

            $table->boolean('is_step_complete')->default(false);

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
        Schema::dropIfExists('student_information');
    }
}
