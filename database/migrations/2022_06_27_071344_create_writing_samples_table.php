<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritingSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writing_samples', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('S1_Writing_Sample')->nullable();
            $table->string('S1_Writing_Sample_Submitted_By')->nullable();
            $table->string('S1_Writing_Sample_Acknowledgment')->nullable();

            $table->text('S2_Writing_Sample')->nullable();
            $table->string('S2_Writing_Sample_Submitted_By')->nullable();
            $table->string('S2_Writing_Sample_Acknowledgment')->nullable();

            $table->text('S3_Writing_Sample')->nullable();
            $table->string('S3_Writing_Sample_Submitted_By')->nullable();
            $table->string('S3_Writing_Sample_Acknowledgment')->nullable();

            $table->string('Writing_Sample_Date')->nullable();
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
        Schema::dropIfExists('writing_samples');
    }
}
