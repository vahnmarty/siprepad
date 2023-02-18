<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptanceDeclineSurvey extends Model
{
    use HasFactory;

    protected $table = "acceptance_decline_survey";

    protected $fillable = [
        'Profile_ID', 'application_id', 'student_type', 'school_that_planning', 'second_Most_Important_Reason', 'third_Most_Important_Reason', 'profile_id', 'name_of_School_1', 'name_of_School_2', 'name_of_School_3', 'name_of_School_4', 'school_s_Decision_1', 'school_s_Decision_2', 'school_s_Decision_3', 'school_s_Decision_4', 'applied_for_Aid_1', 'applied_for_Aid_2', 'applied_for_Aid_3', 'applied_for_Aid_4', 'amount_of_Aid_or_scholarship_Offered_1', 'amount_of_Aid_or_scholarship_Offered_2', 'amount_of_Aid_or_scholarship_Offered_3', 'amount_of_Aid_or_scholarship_Offered_4', 'comment_1', 'comment_2', 'comment_3', 'comment_4', 'most_Important_Reason', 'student_Visit_Program', 'rank_Comment_1', 'rank_Comment_2', 'rank_Comment_3', 'admissions_process'
    ];
}
