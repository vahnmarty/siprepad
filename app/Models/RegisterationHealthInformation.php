<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationHealthInformation extends Model
{
    use HasFactory;
    
    protected $fillable = ['profile_id','medical_insurance_company','medical_policy_number',
        'physician_name','physician_phone','prescribed_medication','allergies','child_condition'
    ];
    
    
}
