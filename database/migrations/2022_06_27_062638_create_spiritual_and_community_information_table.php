<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpiritualAndCommunityInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spiritual_and_community_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->string('Applicant_Religion')->nullable();
            $table->string('Applicant_Religion_Other')->nullable();
            $table->string('Church_Faith_Community')->nullable();
            $table->string('Church_Faith_Community_Location')->nullable();

            $table->string('S1_Baptism_Year')->nullable();
            $table->string('S1_Confirmation_Year')->nullable();

            $table->string('S2_Baptism_Year')->nullable();
            $table->string('S2_Confirmation_Year')->nullable();

            $table->string('S3_Baptism_Year')->nullable();
            $table->string('S3_Confirmation_Year')->nullable();

            $table->text('Impact_to_Community')->nullable();
            $table->string('Describe_Family_Spirituality')->nullable();
            $table->text('Describe_Practice_in_Detail')->nullable();
            $table->string('Religious_Studies_Classes')->nullable();
            $table->string('Religious_Studies_Classes_Explanation')->nullable();
            $table->string('School_Liturgies')->nullable();
            $table->string('School_Liturgies_Explanation')->nullable();
            $table->string('Retreats')->nullable();
            $table->string('Retreats_Explanation')->nullable();
            $table->string('Community_Service')->nullable();
            $table->string('Community_Service_Explanation')->nullable();
            $table->string('Religious_Form_Submitted_By')->nullable();
            $table->string('Religious_Form_Relationship')->nullable();
            $table->string('Religious_Form_Date')->nullable();

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
        Schema::dropIfExists('spiritual_and_community_information');
    }
}
