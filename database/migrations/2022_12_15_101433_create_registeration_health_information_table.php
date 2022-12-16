<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterationHealthInformationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registeration_health_information', function (Blueprint $table) {
            $table->id();
            $table->string('medical_insurance_company');
            $table->string('medical_policy_number');
            $table->string('physician_name');
            $table->string('physician_phone');
            $table->string('prescribed_medication');
            $table->string('allergies');
            $table->string('child_condition');
         

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
        Schema::dropIfExists('registeration_health_information');
    }
}
