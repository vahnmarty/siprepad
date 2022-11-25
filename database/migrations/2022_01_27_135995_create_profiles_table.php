<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable()->unique();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('Profile_ID')->nullable()->unique();
            $table->string('Pro_First_Name')->nullable();
            $table->string('Pro_Last_Name')->nullable();
            $table->string('Pro_Email')->nullable();
            $table->string('Pro_Mobile')->nullable();
            $table->string('Last_Password_1')->nullable();
            $table->string('Last_Password_2')->nullable();
            $table->string('Last_Password_3')->nullable();
            $table->string('Last_Password_4')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
