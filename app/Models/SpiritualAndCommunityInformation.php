<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpiritualAndCommunityInformation extends Model
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

    // protected $casts = [
    //     'Describe_Family_Spirituality' => 'array'
    // ];

    protected $fillable = [
        'Profile_ID', 'Application_ID',
        'Applicant_Religion', 'Applicant_Religion_Other', 'Church_Faith_Community', 'Church_Faith_Community_Location',
        'S1_Baptism_Year', 'S1_Confirmation_Year',
        'S2_Baptism_Year', 'S2_Confirmation_Year',
        'S3_Baptism_Year', 'S3_Confirmation_Year',
        'Impact_to_Community', 'Describe_Family_Spirituality', 'Describe_Practice_in_Detail', 'Religious_Studies_Classes',
        'Religious_Studies_Classes_Explanation', 'School_Liturgies', 'School_Liturgies_Explanation', 'Retreats', 'Retreats_Explanation',
        'Community_Service', 'Community_Service_Explanation', 'Religious_Form_Submitted_By', 'Religious_Form_Relationship', 'Religious_Form_Date','is_step_complete'
    ];
}
