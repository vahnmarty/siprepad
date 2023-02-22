<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToStudentInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hascolumns('student_information', ['S1_Has_Financial_Aid', 'S1_Financial_Aid_Status', 'S1_Yearly_Financial_Aid_Amount', 'S1_Total_Financial_Aid', 'S1_Registration_Deposit_Amount', 'S2_Has_Financial_Aid', 'S2_Financial_Aid_Status', 'S2_Yearly_Financial_Aid_Amount', 'S2_Total_Financial_Aid', 'S2_Registration_Deposit_Amount', 'S3_Has_Financial_Aid', 'S3_Financial_Aid_Status', 'S3_Yearly_Financial_Aid_Amount', 'S3_Total_Financial_Aid', 'S3_Registration_Deposit_Amount']))
            Schema::table('student_information', function (Blueprint $table) {
                $table->string('S1_Has_Financial_Aid', 100)->nullable();
                $table->string('S1_Financial_Aid_Status', 100)->nullable();
                $table->string('S1_Yearly_Financial_Aid_Amount', 100)->nullable();
                $table->string('S1_Total_Financial_Aid', 100)->nullable();
                $table->string('S1_Registration_Deposit_Amount', 100)->nullable();
                $table->string('S2_Has_Financial_Aid', 100)->nullable();
                $table->string('S2_Financial_Aid_Status', 100)->nullable();
                $table->string('S2_Yearly_Financial_Aid_Amount', 100)->nullable();
                $table->string('S2_Total_Financial_Aid', 100)->nullable();
                $table->string('S2_Registration_Deposit_Amount', 100)->nullable();
                $table->string('S3_Has_Financial_Aid', 100)->nullable();
                $table->string('S3_Financial_Aid_Status', 100)->nullable();
                $table->string('S3_Yearly_Financial_Aid_Amount', 100)->nullable();
                $table->string('S3_Total_Financial_Aid', 100)->nullable();
                $table->string('S3_Registration_Deposit_Amount', 100)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('student_information', ['S1_Has_Financial_Aid', 'S1_Financial_Aid_Status', 'S1_Yearly_Financial_Aid_Amount', 'S1_Total_Financial_Aid', 'S1_Registration_Deposit_Amount', 'S2_Has_Financial_Aid', 'S2_Financial_Aid_Status', 'S2_Yearly_Financial_Aid_Amount', 'S2_Total_Financial_Aid', 'S2_Registration_Deposit_Amount', 'S3_Has_Financial_Aid', 'S3_Financial_Aid_Status', 'S3_Yearly_Financial_Aid_Amount', 'S3_Total_Financial_Aid', 'S3_Registration_Deposit_Amount']))
            Schema::table('student_information', function (Blueprint $table) {
                $table->dropColumn('S1_Has_Financial_Aid');
                $table->dropColumn('S1_Financial_Aid_Status');
                $table->dropColumn('S1_Yearly_Financial_Aid_Amount');
                $table->dropColumn('S1_Total_Financial_Aid');
                $table->dropColumn('S1_Registration_Deposit_Amount');
                $table->dropColumn('S2_Has_Financial_Aid');
                $table->dropColumn('S2_Financial_Aid_Status');
                $table->dropColumn('S2_Yearly_Financial_Aid_Amount');
                $table->dropColumn('S2_Total_Financial_Aid');
                $table->dropColumn('S2_Registration_Deposit_Amount');
                $table->dropColumn('S3_Has_Financial_Aid');
                $table->dropColumn('S3_Financial_Aid_Status');
                $table->dropColumn('S3_Yearly_Financial_Aid_Amount');
                $table->dropColumn('S3_Total_Financial_Aid');
                $table->dropColumn('S3_Registration_Deposit_Amount');
            });
    }
}
