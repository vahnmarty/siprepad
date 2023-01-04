<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnApplicationIdToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumns('notifications', ['application_id'])) {

            Schema::table('notifications', function (Blueprint $table) {
                $table->string('application_id');
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
        if (Schema::hasColumns('notifications', ['application_id'])) {

            Schema::table('notifications', function (Blueprint $table) {
                $table->dropColumn('application_id');
            });
        }
    }
}
