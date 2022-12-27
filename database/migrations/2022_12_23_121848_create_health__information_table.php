<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health__information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('application_id');
            $table->string('s1_medical_insurance_company');
            $table->string('s1_medical_policy_number');
            $table->string('s1_physician_name');
            $table->string('s1_medications');
            $table->string('s1_allergies');
            $table->string('s1_other_medical_information');
            $table->string('s2_medical_insurance_company');
            $table->string('s2_medical_policy_number');
            $table->string('s2_physician_name');
            $table->string('s2_medications');
            $table->string('s2_allergies');
            $table->string('s2_other_medical_information');
            $table->string('s3_medical_insurance_company');
            $table->string('s3_medical_policy_number');
            $table->string('s3_physician_name');
            $table->string('s3_medications');
            $table->string('s3_allergies');
            $table->string('s3_other_medical_information');
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
        Schema::dropIfExists('health__information');
    }
}
