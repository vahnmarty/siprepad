<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStudentNameStudentEmailStudentDOBToPaymentLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('payment_logs', ['student_name', 'student_email', 'student_dob'])) {
            Schema::table('payment_logs', function (Blueprint $table) {
                $table->string('student_name')->nullable("false");
                $table->string('student_email')->nullable("false");
                $table->string('student_dob')->nullable("false");
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
        if (Schema::hasColumns('payment_logs', ['student_name', 'student_email', 'student_dob'])) {
            Schema::table('payment_logs', function (Blueprint $table) {
                $table->dropColumn('student_name');
                $table->dropColumn('student_email');
                $table->dropColumn('student_dob');
            });
        }
    }
}
