<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('application_types', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->index();

            $table->string('message');
            $table->boolean('is_read')->default(0);

            $table->timestamps();
        });
        
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('is_notifiable')->default('1')->after('Pro_Mobile');
        });
        
        Schema::table('applications', function (Blueprint $table) {
            $table->foreignId('application_type_id')->index()->after('Profile_ID');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('application_types');
        Schema::dropIfExists('notifications');
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('is_notifiable');
        });        
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('application_type_id');

        });
    }
}
