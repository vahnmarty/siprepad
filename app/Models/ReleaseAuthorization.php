<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseAuthorization extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'Profile_ID', 'Application_ID',
        'S1_Entrance_Exam_Reservation', 'S1_Other_Catholic_School_Name', 'S1_Other_Catholic_School_Location', 'S1_Other_Catholic_School_Date',
        'S2_Entrance_Exam_Reservation', 'S2_Other_Catholic_School_Name', 'S2_Other_Catholic_School_Location', 'S2_Other_Catholic_School_Date',
        'S3_Entrance_Exam_Reservation', 'S3_Other_Catholic_School_Name', 'S3_Other_Catholic_School_Location', 'S3_Other_Catholic_School_Date',
        'Extrance_Exam_Date', 'Agree_to_release_record', 'Agree_to_record_is_true', 'Release_Date',
        'S1_Promo_Code_Applied', 'S2_Promo_Code_Applied', 'S3_Promo_Code_Applied',
        'S1_Application_Fee', 'S2_Application_Fee', 'S3_Application_Fee',
        'Submission_Date', 'Transaction_ID', 'Applying_for_Grade', 'Academic_Year_Applying_For', 'Graduation_Year','is_step_complete'
    ];
}
