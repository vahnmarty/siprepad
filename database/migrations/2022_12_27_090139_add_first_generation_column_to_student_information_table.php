<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstGenerationColumnToStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumns('student_information',['s1_first_generation','s2_first_generation','s3_first_generation']))
        Schema::table('student_information', function (Blueprint $table) 
            {
                $table->integer('s1_first_generation')->nullable();
                $table->integer('s2_first_generation')->nullable();
                $table->integer('s3_first_generation')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumns('student_information',['s1_first_generation','s2_first_generation','s3_first_generation']))
        Schema::table('student_information', function (Blueprint $table) 
        {
            $table->dropColumn('s1_first_generation');
            $table->dropColumn('s2_first_generation');
            $table->dropColumn('s3_first_generation');
        });
    }
}
