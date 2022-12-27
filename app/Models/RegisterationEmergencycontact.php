<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationEmergencycontact extends Model
{
    use HasFactory;
    
    protected $fillable = ['profile_id','emergency_contact_name','relation_to_student',
        'home_phone','mobile_phone','work_phone'
    ];
    
}
