<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'S1_Race' => 'array',
    //     'S2_Race' => 'array',
    //     'S3_Race' => 'array'
    // ];

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

        'S1_Photo', 'S1_First_Name', 'S1_Middle_Name', 'S1_Last_Name', 'S1_Suffix', 'S1_Preferred_First_Name', 'S1_Birthdate', 'S1_Gender',
        'S1_Personal_Email', 'S1_Mobile_Phone', 'S1_Race', 'S1_Ethnicity', 'S1_Current_School', 'S1_Current_School_Not_Listed',
        'S1_Other_High_School_1', 'S1_Other_High_School_2', 'S1_Other_High_School_3', 'S1_Other_High_School_4',

        'S2_Photo', 'S2_First_Name', 'S2_Middle_Name', 'S2_Last_Name', 'S2_Suffix', 'S2_Preferred_First_Name',
        'S2_Birthdate', 'S2_Gender', 'S2_Personal_Email', 'S2_Mobile_Phone', 'S2_Race', 'S2_Ethnicity', 'S2_Current_School',
        'S2_Current_School_Not_Listed', 'S2_Other_High_School_1', 'S2_Other_High_School_2', 'S2_Other_High_School_3', 'S2_Other_High_School_4',

        'S3_Photo', 'S3_First_Name', 'S3_Middle_Name', 'S3_Last_Name', 'S3_Suffix', 'S3_Preferred_First_Name', 'S3_Birthdate', 'S3_Gender',
        'S3_Personal_Email', 'S3_Mobile_Phone', 'S3_Race', 'S3_Ethnicity', 'S3_Current_School', 'S3_Current_School_Not_Listed',
        'S3_Other_High_School_1', 'S3_Other_High_School_2', 'S3_Other_High_School_3', 'S3_Other_High_School_4', 'Applying_for_Grade',

        'Academic_Year_Applying_For', 'Graduation_Year', 'Student_Info_Date', 'is_step_complete'
    ];
}
