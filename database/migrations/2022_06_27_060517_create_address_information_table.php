<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_information', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('application_id')->nullable();
            // $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->unsignedBigInteger('Application_ID')->nullable();
            $table->foreign('Application_ID')->references('Application_ID')->on('applications')->onDelete('cascade');

            $table->text('Address_Type_1')->nullable();
            $table->text('Country_1')->nullable();
            $table->text('Address_1')->nullable();
            $table->text('City_1')->nullable();
            $table->text('State_1')->nullable();
            $table->text('Zipcode_1')->nullable();
            $table->text('Address_Phone_1')->nullable();

            $table->text('Address_Type_2')->nullable();
            $table->text('Country_2')->nullable();
            $table->text('Address_2')->nullable();
            $table->text('City_2')->nullable();
            $table->text('State_2')->nullable();
            $table->text('Zipcode_2')->nullable();
            $table->text('Address_Phone_2')->nullable();

            $table->text('Address_Type_3')->nullable();
            $table->text('Country_3')->nullable();
            $table->text('Address_3')->nullable();
            $table->text('City_3')->nullable();
            $table->text('State_3')->nullable();
            $table->text('Zipcode_3')->nullable();
            $table->text('Address_Phone_3')->nullable();

            $table->text('Address_Type_4')->nullable();
            $table->text('Country_4')->nullable();
            $table->text('Address_4')->nullable();
            $table->text('City_4')->nullable();
            $table->text('State_4')->nullable();
            $table->text('Zipcode_4')->nullable();
            $table->text('Address_Phone_4')->nullable();

            $table->text('Address_Info_Date')->nullable();

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
        Schema::dropIfExists('address_information');
    }
}
