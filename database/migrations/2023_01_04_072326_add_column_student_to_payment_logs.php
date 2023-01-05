<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStudentToPaymentLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('payment_logs', ['student'])) {
            Schema::table('payment_logs', function (Blueprint $table) {
                $table->string('student')->nullable("false");
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
        if (Schema::hasColumns('payment_logs', ['student'])) {
            Schema::table('payment_logs', function (Blueprint $table) {
                $table->dropColumn('student');
            });
        }
    }
}
