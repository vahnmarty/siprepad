<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumns('notifications',['student_profile']))
        Schema::table('notifications', function (Blueprint $table) {
           
            $table->string('student_profile');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumns('notifications',['student_profile']))
        Schema::table('notifications', function (Blueprint $table) {
            
            $table->dropColumn('student_profile');
            
            
        });
    }
}
