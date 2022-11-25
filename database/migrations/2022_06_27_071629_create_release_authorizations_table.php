<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReleaseAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('release_authorizations', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->string('S1_Entrance_Exam_Reservation')->nullable();
            $table->string('S1_Other_Catholic_School_Name')->nullable();
            $table->string('S1_Other_Catholic_School_Location')->nullable();
            $table->string('S1_Other_Catholic_School_Date')->nullable();

            $table->string('S2_Entrance_Exam_Reservation')->nullable();
            $table->string('S2_Other_Catholic_School_Name')->nullable();
            $table->string('S2_Other_Catholic_School_Location')->nullable();
            $table->string('S2_Other_Catholic_School_Date')->nullable();

            $table->string('S3_Entrance_Exam_Reservation')->nullable();
            $table->string('S3_Other_Catholic_School_Name')->nullable();
            $table->string('S3_Other_Catholic_School_Location')->nullable();
            $table->string('S3_Other_Catholic_School_Date')->nullable();

            $table->string('Extrance_Exam_Date')->nullable();
            $table->string('Agree_to_release_record')->nullable();
            $table->string('Agree_to_record_is_true')->nullable();
            $table->string('Release_Date')->nullable();

            $table->string('S1_Promo_Code_Applied')->nullable();

            $table->string('S2_Promo_Code_Applied')->nullable();

            $table->string('S3_Promo_Code_Applied')->nullable();

            $table->string('S1_Application_Fee')->nullable();

            $table->string('S2_Application_Fee')->nullable();

            $table->string('S3_Application_Fee')->nullable();

            $table->string('Submission_Date')->nullable();
            $table->string('Transaction_ID')->nullable();
            $table->string('Applying_for_Grade')->nullable();
            $table->string('Academic_Year_Applying_For')->nullable();
            $table->string('Graduation_Year')->nullable();

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
        Schema::dropIfExists('release_authorizations');
    }
}
