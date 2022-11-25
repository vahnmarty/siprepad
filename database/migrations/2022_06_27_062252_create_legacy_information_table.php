<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegacyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legacy_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->string('L1_First_Name')->nullable();
            $table->string('L1_Last_Name')->nullable();
            $table->string('L1_Relationship')->nullable();
            $table->string('L1_Graduation_Year')->nullable();

            $table->string('L2_First_Name')->nullable();
            $table->string('L2_Last_Name')->nullable();
            $table->string('L2_Relationship')->nullable();
            $table->string('L2_Graduation_Year')->nullable();

            $table->string('L3_First_Name')->nullable();
            $table->string('L3_Last_Name')->nullable();
            $table->string('L3_Relationship')->nullable();
            $table->string('L3_Graduation_Year')->nullable();

            $table->string('L4_First_Name')->nullable();
            $table->string('L4_Last_Name')->nullable();
            $table->string('L4_Relationship')->nullable();
            $table->string('L4_Graduation_Year')->nullable();

            $table->string('L5_First_Name')->nullable();
            $table->string('L5_Last_Name')->nullable();
            $table->string('L5_Relationship')->nullable();
            $table->string('L5_Graduation_Year')->nullable();

            $table->string('Legacy_Info_Date')->nullable();

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
        Schema::dropIfExists('legacy_information');
    }
}
