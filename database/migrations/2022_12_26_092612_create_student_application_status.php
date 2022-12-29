<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentApplicationStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_application_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('application_id')->references('Application_ID')->on('applications')->onDelete('cascade');
            $table->foreign('profile_iD')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('s1_application_status')->nullable();
            $table->string('s1_notification_id')->nullable();
            $table->boolean('s1_candidate_status')->comment('0:Not Defined,1:Accepted,2:Rejected')->default('0');
            $table->string('s2_application_status')->nullable();
            $table->string('s2_notification_id')->nullable();
            $table->boolean('s2_candidate_status')->comment('0:Not Defined,1:Accepted,2:Rejected')->default('0');
            $table->string('s3_application_status')->nullable();
            $table->string('s3_notification_id')->nullable();
            $table->boolean('s3_candidate_status')->comment('0:Not Defined,1:Accepted,2:Rejected')->default('0');
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
        Schema::dropIfExists('student_application_status');
    }
}
