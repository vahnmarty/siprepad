<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_statements', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('Why_SI_for_Child')->nullable();

            $table->text('S1_Endearing_Quality_and_Growth')->nullable();
            $table->text('S1_About_Child_Not_on_App')->nullable();

            $table->text('S2_Endearing_Quality_and_Growth')->nullable();
            $table->text('S2_About_Child_Not_on_App')->nullable();

            $table->text('S3_Endearing_Quality_and_Growth')->nullable();
            $table->text('S3_About_Child_Not_on_App')->nullable();

            $table->string('Parent_Statement_Submitted_By')->nullable();
            $table->string('Parent_Statement_Relationship')->nullable();
            $table->string('Parent_Statement_Date')->nullable();

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
        Schema::dropIfExists('parent_statements');
    }
}
