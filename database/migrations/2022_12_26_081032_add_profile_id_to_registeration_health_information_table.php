<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileIdToRegisterationHealthInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('registeration_health_information','profile_id'))
        Schema::table('registeration_health_information', function (Blueprint $table) 
        {
            $table->string('profile_id');
        });
        
        if (Schema::hasColumns('registeration_health_information',['prescribed_medication','allergies','child_condition']))
        {
            Schema::table('registeration_health_information', function (Blueprint $table) 
            {
                $table->text('prescribed_medication')->change();
                $table->text('allergies')->change();
                $table->text('child_condition')->change();
            });
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
      if (Schema::hasColumns('registeration_health_information',['profile_id','prescribed_medication','allergies','child_condition']))
          {
             Schema::table('registeration_health_information', function (Blueprint $table)
               {
                    $table->dropColumn('profile_id');
                    $table->dropColumn('prescribed_medication');
                    $table->dropColumn('allergies');
                    $table->dropColumn('child_condition');
                });
           }
    }
}
