<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiblingInformation extends Model
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
        'SIB01_First_Name', 'SIB01_Middle_Name', 'SIB01_Last_Name', 'SIB01_Suffix', 'SIB01_Relationship', 'SIB01_Current_Grade', 'SIB01_Current_School', 'SIB01_Current_School_Not_Listed', 'SIB01_HS_Graduation_Year',
        'SIB02_First_Name', 'SIB02_Middle_Name', 'SIB02_Last_Name', 'SIB02_Suffix', 'SIB02_Relationship', 'SIB02_Current_Grade', 'SIB02_Current_School', 'SIB02_Current_School_Not_Listed', 'SIB02_HS_Graduation_Year',
        'SIB03_First_Name', 'SIB03_Middle_Name', 'SIB03_Last_Name', 'SIB03_Suffix', 'SIB03_Relationship', 'SIB03_Current_Grade', 'SIB03_Current_School', 'SIB03_Current_School_Not_Listed', 'SIB03_HS_Graduation_Year',
        'SIB04_First_Name', 'SIB04_Middle_Name', 'SIB04_Last_Name', 'SIB04_Suffix', 'SIB04_Relationship', 'SIB04_Current_Grade', 'SIB04_Current_School', 'SIB04_Current_School_Not_Listed', 'SIB04_HS_Graduation_Year',
        'SIB05_First_Name', 'SIB05_Middle_Name', 'SIB05_Last_Name', 'SIB05_Suffix', 'SIB05_Relationship', 'SIB05_Current_Grade', 'SIB05_Current_School', 'SIB05_Current_School_Not_Listed', 'SIB05_HS_Graduation_Year',
        'SIB06_First_Name', 'SIB06_Middle_Name', 'SIB06_Last_Name', 'SIB06_Suffix', 'SIB06_Relationship', 'SIB06_Current_Grade', 'SIB06_Current_School', 'SIB06_Current_School_Not_Listed', 'SIB06_HS_Graduation_Year',
        'SIB07_First_Name', 'SIB07_Middle_Name', 'SIB07_Last_Name', 'SIB07_Suffix', 'SIB07_Relationship', 'SIB07_Current_Grade', 'SIB07_Current_School', 'SIB07_Current_School_Not_Listed', 'SIB07_HS_Graduation_Year',
        'SIB08_First_Name', 'SIB08_Middle_Name', 'SIB08_Last_Name', 'SIB08_Suffix', 'SIB08_Relationship', 'SIB08_Current_Grade', 'SIB08_Current_School', 'SIB08_Current_School_Not_Listed', 'SIB08_HS_Graduation_Year',
        'SIB09_First_Name', 'SIB09_Middle_Name', 'SIB09_Last_Name', 'SIB09_Suffix', 'SIB09_Relationship', 'SIB09_Current_Grade', 'SIB09_Current_School', 'SIB09_Current_School_Not_Listed', 'SIB09_HS_Graduation_Year',
        'SIB10_First_Name', 'SIB10_Middle_Name', 'SIB10_Last_Name', 'SIB10_Suffix', 'SIB10_Relationship', 'SIB10_Current_Grade', 'SIB10_Current_School', 'SIB10_Current_School_Not_Listed', 'SIB10_HS_Graduation_Year',
        'Sibling_Info_Date','is_step_complete'
    ];
}
