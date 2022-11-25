<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegacyInformation extends Model
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
        'L1_First_Name', 'L1_Last_Name', 'L1_Relationship', 'L1_Graduation_Year',
        'L2_First_Name', 'L2_Last_Name', 'L2_Relationship', 'L2_Graduation_Year',
        'L3_First_Name', 'L3_Last_Name', 'L3_Relationship', 'L3_Graduation_Year',
        'L4_First_Name', 'L4_Last_Name', 'L4_Relationship', 'L4_Graduation_Year',
        'L5_First_Name', 'L5_Last_Name', 'L5_Relationship', 'L5_Graduation_Year',
        'Legacy_Info_Date','is_step_complete'
    ];
}
