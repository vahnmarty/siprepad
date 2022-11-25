<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentStatement extends Model
{
    use HasFactory;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
       'Profile_ID', 'Application_ID',
       //
       'S1_Why_did_you_decide_to_apply_to_SI', 'S1_Greatest_Challenge', 'S1_Religious_Activities_for_Growth', 'S1_Favorite_and_most_difficult_subjects',
       'S2_Why_did_you_decide_to_apply_to_SI', 'S2_Greatest_Challenge', 'S2_Religious_Activities_for_Growth', 'S2_Favorite_and_most_difficult_subjects',
       'S3_Why_did_you_decide_to_apply_to_SI', 'S3_Greatest_Challenge', 'S3_Religious_Activities_for_Growth', 'S3_Favorite_and_most_difficult_subjects',

       //
       'S1_A1_Activity_Name', 'S1_A1_Number_of_Years', 'S1_A1_Hours_Per_Week', 'S1_A1_Info_about_activity',
       'S1_A2_Activity_Name', 'S1_A2_Number_of_Years', 'S1_A2_Hours_Per_Week', 'S1_A2_Info_about_activity',
       'S1_A3_Activity_Name', 'S1_A3_Number_of_Years', 'S1_A3_Hours_Per_Week', 'S1_A3_Info_about_activity',
       'S1_A4_Activity_Name', 'S1_A4_Number_of_Years', 'S1_A4_Hours_Per_Week', 'S1_A4_Info_about_activity',

       'S2_A1_Activity_Name', 'S2_A1_Number_of_Years', 'S2_A1_Hours_Per_Week', 'S2_A1_Info_about_activity',
       'S2_A2_Activity_Name', 'S2_A2_Number_of_Years', 'S2_A2_Hours_Per_Week', 'S2_A2_Info_about_activity',
       'S2_A3_Activity_Name', 'S2_A3_Number_of_Years', 'S2_A3_Hours_Per_Week', 'S2_A3_Info_about_activity',
       'S2_A4_Activity_Name', 'S2_A4_Number_of_Years', 'S2_A4_Hours_Per_Week', 'S2_A4_Info_about_activity',

       'S3_A1_Activity_Name', 'S3_A1_Number_of_Years', 'S3_A1_Hours_Per_Week', 'S3_A1_Info_about_activity',
       'S3_A2_Activity_Name', 'S3_A2_Number_of_Years', 'S3_A2_Hours_Per_Week', 'S3_A2_Info_about_activity',
       'S3_A3_Activity_Name', 'S3_A3_Number_of_Years', 'S3_A3_Hours_Per_Week', 'S3_A3_Info_about_activity',
       'S3_A4_Activity_Name', 'S3_A4_Number_of_Years', 'S3_A4_Hours_Per_Week', 'S3_A4_Info_about_activity',

       //
       'S1_Most_Passionate_Activity', 'S1_Extracurricular_Activity_at_SI',
       'S2_Most_Passionate_Activity', 'S2_Extracurricular_Activity_at_SI',
       'S3_Most_Passionate_Activity', 'S3_Extracurricular_Activity_at_SI',

       'Student_Statement_Date','is_step_complete'
    ];
}
