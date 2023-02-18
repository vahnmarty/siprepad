<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AcceptanceSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hascolumns('acceptance_decline_survey', ['application_id', 'school_that_planning', 'student_type', 'profile_id', 'name_of_School_1', 'name_of_School_2', 'name_of_School_3', 'name_of_School_4', 'school_s_Decision_1', 'school_s_Decision_2', 'school_s_Decision_3', 'school_s_Decision_4', 'applied_for_Aid_1', 'applied_for_Aid_2', 'applied_for_Aid_3', 'applied_for_Aid_4', 'amount_of_Aid_or_scholarship_Offered_1', 'amount_of_Aid_or_scholarship_Offered_2', 'amount_of_Aid_or_scholarship_Offered_3', 'amount_of_Aid_or_scholarship_Offered_4', 'comment_1', 'comment_2', 'comment_3', 'comment_4', 'most_Important_Reason', 'student_Visit_Program', 'rank_Comment_1', 'rank_Comment_2', 'rank_Comment_3', 'admissions_process'])) {
            Schema::create('acceptance_decline_survey', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('application_id');
                $table->unsignedBigInteger('profile_id');
                $table->foreign('application_id')->references('Application_ID')->on('applications')->onDelete('cascade');
                $table->foreign('profile_iD')->references('id')->on('profiles')->onDelete('cascade');
                $table->string('name_of_School_1')->nullable();
                $table->string('name_of_School_2')->nullable();
                $table->string('name_of_School_3')->nullable();
                $table->string('name_of_School_4')->nullable();
                $table->string('school_s_Decision_1')->nullable();
                $table->string('school_s_Decision_2')->nullable();
                $table->string('school_s_Decision_3')->nullable();
                $table->string('school_s_Decision_4')->nullable();
                $table->string('applied_for_Aid_1')->nullable();
                $table->string('applied_for_Aid_2')->nullable();
                $table->string('applied_for_Aid_3')->nullable();
                $table->string('applied_for_Aid_4')->nullable();
                $table->string('amount_of_Aid_or_scholarship_Offered_1')->nullable();
                $table->string('amount_of_Aid_or_scholarship_Offered_2')->nullable();
                $table->string('amount_of_Aid_or_scholarship_Offered_3')->nullable();
                $table->string('amount_of_Aid_or_scholarship_Offered_4')->nullable();
                $table->string('comment_1')->nullable();
                $table->string('comment_2')->nullable();
                $table->string('comment_3')->nullable();
                $table->string('comment_4')->nullable();
                $table->string('most_Important_Reason')->nullable();
                $table->string('second_Most_Important_Reason')->nullable();
                $table->string('third_Most_Important_Reason')->nullable();
                $table->string('student_Visit_Program')->nullable();
                $table->string('rank_Comment_1')->nullable();
                $table->string('rank_Comment_2')->nullable();
                $table->string('rank_Comment_3')->nullable();
                $table->string('admissions_process')->nullable();
                $table->string('student_type')->nullable();
                $table->string('school_that_planning')->nullable();
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
        if (Schema::hascolumns('acceptance_decline_survey', ['application_id', 'school_that_planning', 'profile_id', 'student_type', 'name_of_School_1', 'name_of_School_2', 'name_of_School_3', 'name_of_School_4', 'school_s_Decision_1', 'school_s_Decision_2', 'school_s_Decision_3', 'school_s_Decision_4', 'applied_for_Aid_1', 'applied_for_Aid_2', 'applied_for_Aid_3', 'applied_for_Aid_4', 'amount_of_Aid_or_scholarship_Offered_1', 'amount_of_Aid_or_scholarship_Offered_2', 'amount_of_Aid_or_scholarship_Offered_3', 'amount_of_Aid_or_scholarship_Offered_4', 'comment_1', 'comment_2', 'comment_3', 'comment_4', 'most_Important_Reason', 'student_Visit_Program', 'rank_Comment_1', 'rank_Comment_2', 'rank_Comment_3', 'admissions_process'])) {
            Schema::table('acceptance_decline_survey', function (Blueprint $table) {
                $table->dropColumn('name_of_School_1');
                $table->dropColumn('name_of_School_2');
                $table->dropColumn('name_of_School_3');
                $table->dropColumn('name_of_School_4');
                $table->dropColumn('school_s_Decision_1');
                $table->dropColumn('school_s_Decision_2');
                $table->dropColumn('school_s_Decision_3');
                $table->dropColumn('school_s_Decision_4');
                $table->dropColumn('applied_for_Aid_1');
                $table->dropColumn('applied_for_Aid_2');
                $table->dropColumn('applied_for_Aid_3');
                $table->dropColumn('applied_for_Aid_4');
                $table->dropColumn('amount_of_Aid_or_scholarship_Offered_1');
                $table->dropColumn('amount_of_Aid_or_scholarship_Offered_2');
                $table->dropColumn('amount_of_Aid_or_scholarship_Offered_3');
                $table->dropColumn('amount_of_Aid_or_scholarship_Offered_4');
                $table->dropColumn('comment_1');
                $table->dropColumn('comment_2');
                $table->dropColumn('comment_3');
                $table->dropColumn('comment_4');
                $table->dropColumn('most_Important_Reason');
                $table->dropColumn('second_Most_Important_Reason');
                $table->dropColumn('third_Most_Important_Reason');
                $table->dropColumn('student_Visit_Program');
                $table->dropColumn('rank_Comment_1');
                $table->dropColumn('rank_Comment_2');
                $table->dropColumn('rank_Comment_3');
                $table->dropColumn('admissions_process');
                $table->dropColumn('student_type');
                $table->dropColumn('school_that_planning');
            });
        }
    }
}
