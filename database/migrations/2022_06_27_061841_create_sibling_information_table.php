<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiblingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sibling_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('SIB01_First_Name')->nullable();
            $table->text('SIB01_Middle_Name')->nullable();
            $table->text('SIB01_Last_Name')->nullable();
            $table->text('SIB01_Suffix')->nullable();
            $table->text('SIB01_Relationship')->nullable();
            $table->text('SIB01_Current_Grade')->nullable();
            $table->text('SIB01_Current_School')->nullable();
            $table->text('SIB01_Current_School_Not_Listed')->nullable();
            $table->text('SIB01_HS_Graduation_Year')->nullable();

            $table->text('SIB02_First_Name')->nullable();
            $table->text('SIB02_Middle_Name')->nullable();
            $table->text('SIB02_Last_Name')->nullable();
            $table->text('SIB02_Suffix')->nullable();
            $table->text('SIB02_Relationship')->nullable();
            $table->text('SIB02_Current_Grade')->nullable();
            $table->text('SIB02_Current_School')->nullable();
            $table->text('SIB02_Current_School_Not_Listed')->nullable();
            $table->text('SIB02_HS_Graduation_Year')->nullable();

            $table->text('SIB03_First_Name')->nullable();
            $table->text('SIB03_Middle_Name')->nullable();
            $table->text('SIB03_Last_Name')->nullable();
            $table->text('SIB03_Suffix')->nullable();
            $table->text('SIB03_Relationship')->nullable();
            $table->text('SIB03_Current_Grade')->nullable();
            $table->text('SIB03_Current_School')->nullable();
            $table->text('SIB03_Current_School_Not_Listed')->nullable();
            $table->text('SIB03_HS_Graduation_Year')->nullable();

            $table->text('SIB04_First_Name')->nullable();
            $table->text('SIB04_Middle_Name')->nullable();
            $table->text('SIB04_Last_Name')->nullable();
            $table->text('SIB04_Suffix')->nullable();
            $table->text('SIB04_Relationship')->nullable();
            $table->text('SIB04_Current_Grade')->nullable();
            $table->text('SIB04_Current_School')->nullable();
            $table->text('SIB04_Current_School_Not_Listed')->nullable();
            $table->text('SIB04_HS_Graduation_Year')->nullable();

            $table->text('SIB05_First_Name')->nullable();
            $table->text('SIB05_Middle_Name')->nullable();
            $table->text('SIB05_Last_Name')->nullable();
            $table->text('SIB05_Suffix')->nullable();
            $table->text('SIB05_Relationship')->nullable();
            $table->text('SIB05_Current_Grade')->nullable();
            $table->text('SIB05_Current_School')->nullable();
            $table->text('SIB05_Current_School_Not_Listed')->nullable();
            $table->text('SIB05_HS_Graduation_Year')->nullable();

            $table->text('SIB06_First_Name')->nullable();
            $table->text('SIB06_Middle_Name')->nullable();
            $table->text('SIB06_Last_Name')->nullable();
            $table->text('SIB06_Suffix')->nullable();
            $table->text('SIB06_Relationship')->nullable();
            $table->text('SIB06_Current_Grade')->nullable();
            $table->text('SIB06_Current_School')->nullable();
            $table->text('SIB06_Current_School_Not_Listed')->nullable();
            $table->text('SIB06_HS_Graduation_Year')->nullable();

            $table->text('SIB07_First_Name')->nullable();
            $table->text('SIB07_Middle_Name')->nullable();
            $table->text('SIB07_Last_Name')->nullable();
            $table->text('SIB07_Suffix')->nullable();
            $table->text('SIB07_Relationship')->nullable();
            $table->text('SIB07_Current_Grade')->nullable();
            $table->text('SIB07_Current_School')->nullable();
            $table->text('SIB07_Current_School_Not_Listed')->nullable();
            $table->text('SIB07_HS_Graduation_Year')->nullable();

            $table->text('SIB08_First_Name')->nullable();
            $table->text('SIB08_Middle_Name')->nullable();
            $table->text('SIB08_Last_Name')->nullable();
            $table->text('SIB08_Suffix')->nullable();
            $table->text('SIB08_Relationship')->nullable();
            $table->text('SIB08_Current_Grade')->nullable();
            $table->text('SIB08_Current_School')->nullable();
            $table->text('SIB08_Current_School_Not_Listed')->nullable();
            $table->text('SIB08_HS_Graduation_Year')->nullable();

            $table->text('SIB09_First_Name')->nullable();
            $table->text('SIB09_Middle_Name')->nullable();
            $table->text('SIB09_Last_Name')->nullable();
            $table->text('SIB09_Suffix')->nullable();
            $table->text('SIB09_Relationship')->nullable();
            $table->text('SIB09_Current_Grade')->nullable();
            $table->text('SIB09_Current_School')->nullable();
            $table->text('SIB09_Current_School_Not_Listed')->nullable();
            $table->text('SIB09_HS_Graduation_Year')->nullable();

            $table->text('SIB10_First_Name')->nullable();
            $table->text('SIB10_Middle_Name')->nullable();
            $table->text('SIB10_Last_Name')->nullable();
            $table->text('SIB10_Suffix')->nullable();
            $table->text('SIB10_Relationship')->nullable();
            $table->text('SIB10_Current_Grade')->nullable();
            $table->text('SIB10_Current_School')->nullable();
            $table->text('SIB10_Current_School_Not_Listed')->nullable();
            $table->text('SIB10_HS_Graduation_Year')->nullable();

            $table->date('Sibling_Info_Date')->nullable();

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
        Schema::dropIfExists('sibling_information');
    }
}
