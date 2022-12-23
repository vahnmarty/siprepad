<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTshirtColumnsToStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hascolumns('student_information',['s1_tshirt_size','s2_tshirt_size','s3_tshirt_size']))
        Schema::table('student_information', function (Blueprint $table) 
        {
            $table->string('s1_tshirt_size')->nullable();
            $table->string('s2_tshirt_size')->nullable();
            $table->string('s3_tshirt_size')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumns('student_information',['s1_tshirt_size','s2_tshirt_size','s3_tshirt_size']))
        Schema::table('student_information', function (Blueprint $table) 
        {
            $table->dropColumn('s1_tshirt_size');
            $table->dropColumn('s2_tshirt_size');
            $table->dropColumn('s3_tshirt_size');
        });  
    }
}
