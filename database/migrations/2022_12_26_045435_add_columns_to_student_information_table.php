<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_information', function (Blueprint $table) {
          
            $table->string('s1_notification_status');
            $table->string('s1_notification_decision');
            $table->string('s2_notification_status');
            $table->string('s2_notification_decision');
            $table->string('s3_notification_status');
            $table->string('s3_notification_decision');
 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_information', function (Blueprint $table) {
           
            
            $columns = ['s1_notification_status','s1_notification_decision','s2_notification_status','s2_notification_decision','s3_notification_status','s3_notification_decision'];
            
                $table->dropColumn($columns);
            
        });
    }
}
