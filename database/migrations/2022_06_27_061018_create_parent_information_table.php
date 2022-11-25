<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('P1_Relationship')->nullable();
            $table->text('P1_Salutation')->nullable();
            $table->text('P1_First_Name')->nullable();
            $table->text('P1_Middle_Name')->nullable();
            $table->text('P1_Last_Name')->nullable();
            $table->text('P1_Suffix')->nullable();
            $table->text('P1_Address_Type')->nullable();
            $table->text('P1_Mobile_Phone')->nullable();
            $table->text('P1_Personal_Email')->nullable();
            $table->text('P1_Employer')->nullable();
            $table->text('P1_Title')->nullable();
            $table->text('P1_Work_Email')->nullable();
            $table->text('P1_Work_Phone')->nullable();
            $table->text('P1_Work_Phone_Ext')->nullable();
            $table->text('P1_Schools')->nullable();
            $table->text('P1_Living_Situation')->nullable();
            $table->text('P1_Status')->nullable();

            $table->text('P2_Relationship')->nullable();
            $table->text('P2_Salutation')->nullable();
            $table->text('P2_First_Name')->nullable();
            $table->text('P2_Middle_Name')->nullable();
            $table->text('P2_Last_Name')->nullable();
            $table->text('P2_Suffix')->nullable();
            $table->text('P2_Address_Type')->nullable();
            $table->text('P2_Mobile_Phone')->nullable();
            $table->text('P2_Personal_Email')->nullable();
            $table->text('P2_Employer')->nullable();
            $table->text('P2_Title')->nullable();
            $table->text('P2_Work_Email')->nullable();
            $table->text('P2_Work_Phone')->nullable();
            $table->text('P2_Work_Phone_Ext')->nullable();
            $table->text('P2_Schools')->nullable();
            $table->text('P2_Living_Situation')->nullable();
            $table->text('P2_Status')->nullable();

            $table->text('P3_Relationship')->nullable();
            $table->text('P3_Salutation')->nullable();
            $table->text('P3_First_Name')->nullable();
            $table->text('P3_Middle_Name')->nullable();
            $table->text('P3_Last_Name')->nullable();
            $table->text('P3_Suffix')->nullable();
            $table->text('P3_Address_Type')->nullable();
            $table->text('P3_Mobile_Phone')->nullable();
            $table->text('P3_Personal_Email')->nullable();
            $table->text('P3_Employer')->nullable();
            $table->text('P3_Title')->nullable();
            $table->text('P3_Work_Email')->nullable();
            $table->text('P3_Work_Phone')->nullable();
            $table->text('P3_Work_Phone_Ext')->nullable();
            $table->text('P3_Schools')->nullable();
            $table->text('P3_Living_Situation')->nullable();
            $table->text('P3_Status')->nullable();

            $table->text('P4_Relationship')->nullable();
            $table->text('P4_Salutation')->nullable();
            $table->text('P4_First_Name')->nullable();
            $table->text('P4_Middle_Name')->nullable();
            $table->text('P4_Last_Name')->nullable();
            $table->text('P4_Suffix')->nullable();
            $table->text('P4_Address_Type')->nullable();
            $table->text('P4_Mobile_Phone')->nullable();
            $table->text('P4_Personal_Email')->nullable();
            $table->text('P4_Employer')->nullable();
            $table->text('P4_Title')->nullable();
            $table->text('P4_Work_Email')->nullable();
            $table->text('P4_Work_Phone')->nullable();
            $table->text('P4_Work_Phone_Ext')->nullable();
            $table->text('P4_Schools')->nullable();
            $table->text('P4_Living_Situation')->nullable();
            $table->text('P4_Status')->nullable();
            
            $table->text('Parent_Info_Date')->nullable();

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
        Schema::dropIfExists('parent_information');
    }
}
