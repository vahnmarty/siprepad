<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'Profile_ID', 'Application_ID',
        
        'first_name', 'middle_name', 'last_name',  'preffered_first_name', 'date_of_birth', 'gender',
         'student_phone_number', 't-shirt_size', 'religion', 'racial','ethinicity','current_school',
    ];
    
    

}
