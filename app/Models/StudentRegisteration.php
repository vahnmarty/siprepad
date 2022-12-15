<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegisteration extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
    
        'Profile_ID','first_name', 'middle_name', 'last_name',  'preffered_first_name', 'date_of_birth', 'gender',
        'student_phone_number', 'tshirt_size', 'religion', 'racial','ethnicity','current_school','last_step_complete',
    ];
    
    
    public function user()
    {
        return $this->belongsTo(Profile::class,'id');
    }
    
   
    
}
