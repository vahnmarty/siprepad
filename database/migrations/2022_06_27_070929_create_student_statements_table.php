<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_statements', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('S1_Why_did_you_decide_to_apply_to_SI')->nullable();
            $table->text('S1_Greatest_Challenge')->nullable();
            $table->text('S1_Religious_Activities_for_Growth')->nullable();
            $table->text('S1_Favorite_and_most_difficult_subjects')->nullable();

            $table->text('S2_Why_did_you_decide_to_apply_to_SI')->nullable();
            $table->text('S2_Greatest_Challenge')->nullable();
            $table->text('S2_Religious_Activities_for_Growth')->nullable();
            $table->text('S2_Favorite_and_most_difficult_subjects')->nullable();

            $table->text('S3_Why_did_you_decide_to_apply_to_SI')->nullable();
            $table->text('S3_Greatest_Challenge')->nullable();
            $table->text('S3_Religious_Activities_for_Growth')->nullable();
            $table->text('S3_Favorite_and_most_difficult_subjects')->nullable();

            $table->text('S1_A1_Activity_Name')->nullable();
            $table->text('S1_A1_Number_of_Years')->nullable();
            $table->text('S1_A1_Hours_Per_Week')->nullable();
            $table->text('S1_A1_Info_about_activity')->nullable();
            $table->text('S1_A2_Activity_Name')->nullable();
            $table->text('S1_A2_Number_of_Years')->nullable();
            $table->text('S1_A2_Hours_Per_Week')->nullable();
            $table->text('S1_A2_Info_about_activity')->nullable();
            $table->text('S1_A3_Activity_Name')->nullable();
            $table->text('S1_A3_Number_of_Years')->nullable();
            $table->text('S1_A3_Hours_Per_Week')->nullable();
            $table->text('S1_A3_Info_about_activity')->nullable();
            $table->text('S1_A4_Activity_Name')->nullable();
            $table->text('S1_A4_Number_of_Years')->nullable();
            $table->text('S1_A4_Hours_Per_Week')->nullable();
            $table->text('S1_A4_Info_about_activity')->nullable();

            $table->text('S2_A1_Activity_Name')->nullable();
            $table->text('S2_A1_Number_of_Years')->nullable();
            $table->text('S2_A1_Hours_Per_Week')->nullable();
            $table->text('S2_A1_Info_about_activity')->nullable();
            $table->text('S2_A2_Activity_Name')->nullable();
            $table->text('S2_A2_Number_of_Years')->nullable();
            $table->text('S2_A2_Hours_Per_Week')->nullable();
            $table->text('S2_A2_Info_about_activity')->nullable();
            $table->text('S2_A3_Activity_Name')->nullable();
            $table->text('S2_A3_Number_of_Years')->nullable();
            $table->text('S2_A3_Hours_Per_Week')->nullable();
            $table->text('S2_A3_Info_about_activity')->nullable();
            $table->text('S2_A4_Activity_Name')->nullable();
            $table->text('S2_A4_Number_of_Years')->nullable();
            $table->text('S2_A4_Hours_Per_Week')->nullable();
            $table->text('S2_A4_Info_about_activity')->nullable();

            $table->text('S3_A1_Activity_Name')->nullable();
            $table->text('S3_A1_Number_of_Years')->nullable();
            $table->text('S3_A1_Hours_Per_Week')->nullable();
            $table->text('S3_A1_Info_about_activity')->nullable();
            $table->text('S3_A2_Activity_Name')->nullable();
            $table->text('S3_A2_Number_of_Years')->nullable();
            $table->text('S3_A2_Hours_Per_Week')->nullable();
            $table->text('S3_A2_Info_about_activity')->nullable();
            $table->text('S3_A3_Activity_Name')->nullable();
            $table->text('S3_A3_Number_of_Years')->nullable();
            $table->text('S3_A3_Hours_Per_Week')->nullable();
            $table->text('S3_A3_Info_about_activity')->nullable();
            $table->text('S3_A4_Activity_Name')->nullable();
            $table->text('S3_A4_Number_of_Years')->nullable();
            $table->text('S3_A4_Hours_Per_Week')->nullable();
            $table->text('S3_A4_Info_about_activity')->nullable();

            $table->text('S1_Most_Passionate_Activity')->nullable();
            $table->text('S1_Extracurricular_Activity_at_SI')->nullable();

            $table->text('S2_Most_Passionate_Activity')->nullable();
            $table->text('S2_Extracurricular_Activity_at_SI')->nullable();

            $table->text('S3_Most_Passionate_Activity')->nullable();
            $table->text('S3_Extracurricular_Activity_at_SI')->nullable();

            $table->text('Student_Statement_Date')->nullable();
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
        Schema::dropIfExists('student_statements');
    }
}
