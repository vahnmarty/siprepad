<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReligionColumnToStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hascolumns('student_information',['s1_religion','s2_religion','s3_religion']))
        Schema::table('student_information', function (Blueprint $table) 
        {
            $table->string('s1_religion')->nullable();
            $table->string('s2_religion')->nullable();
            $table->string('s3_religion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumns('student_information',['s1_religion','s2_religion','s3_religion']))
        Schema::table('student_information', function (Blueprint $table) 
        {
            $table->dropColumn('s1_religion');
            $table->dropColumn('s2_religion');
            $table->dropColumn('s3_religion');
        });
    }
}
