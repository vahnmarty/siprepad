<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WritingSample extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'Profile_ID', 'Application_ID',
        'S1_Writing_Sample', 'S1_Writing_Sample_Submitted_By', 'S1_Writing_Sample_Acknowledgment',
        'S2_Writing_Sample', 'S2_Writing_Sample_Submitted_By', 'S2_Writing_Sample_Acknowledgment',
        'S3_Writing_Sample', 'S3_Writing_Sample_Submitted_By', 'S3_Writing_Sample_Acknowledgment',
        'Writing_Sample_Date','is_step_complete'
    ];

}
