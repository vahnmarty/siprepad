<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentInformation extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'P1_Living_Situation' => 'array',
    //     'P2_Living_Situation' => 'array',
    //     'P3_Living_Situation' => 'array',
    //     'P4_Living_Situation' => 'array'
    // ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public $fillable = [
        'Profile_ID', 'Application_ID',
        'P1_Relationship', 'P1_Salutation', 'P1_First_Name', 'P1_Middle_Name', 'P1_Last_Name', 'P1_Suffix', 'P1_Address_Type', 'P1_Mobile_Phone', 'P1_Personal_Email', 'P1_Employer', 'P1_Title', 'P1_Work_Email', 'P1_Work_Phone', 'P1_Work_Phone_Ext', 'P1_Schools', 'P1_Living_Situation', 'P1_Status',
        'P2_Relationship', 'P2_Salutation', 'P2_First_Name', 'P2_Middle_Name', 'P2_Last_Name', 'P2_Suffix', 'P2_Address_Type', 'P2_Mobile_Phone', 'P2_Personal_Email', 'P2_Employer', 'P2_Title', 'P2_Work_Email', 'P2_Work_Phone', 'P2_Work_Phone_Ext', 'P2_Schools', 'P2_Living_Situation', 'P2_Status',
        'P3_Relationship', 'P3_Salutation', 'P3_First_Name', 'P3_Middle_Name', 'P3_Last_Name', 'P3_Suffix', 'P3_Address_Type', 'P3_Mobile_Phone', 'P3_Personal_Email', 'P3_Employer', 'P3_Title', 'P3_Work_Email', 'P3_Work_Phone', 'P3_Work_Phone_Ext', 'P3_Schools', 'P3_Living_Situation', 'P3_Status',
        'P4_Relationship', 'P4_Salutation', 'P4_First_Name', 'P4_Middle_Name', 'P4_Last_Name', 'P4_Suffix', 'P4_Address_Type', 'P4_Mobile_Phone', 'P4_Personal_Email', 'P4_Employer', 'P4_Title', 'P4_Work_Email', 'P4_Work_Phone', 'P4_Work_Phone_Ext', 'P4_Schools', 'P4_Living_Situation', 'P4_Status',
        'Parent_Info_Date', 'is_step_complete'
    ];
}
