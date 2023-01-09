<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalStudentTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('global_student_transfer', ['student_transfer'])) {
            Schema::create('global_student_transfer', function (Blueprint $table) {
                $table->id();
                $table->boolean('student_transfer')->default(0);
                $table->timestamps();
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
        if (Schema::hasColumns('global_student_transfer', ['student_transfer'])) {
            Schema::table('global_student_transfer', function (Blueprint $table) {
                $table->dropColumn('student_transfer');
            });

        }
    }
}
