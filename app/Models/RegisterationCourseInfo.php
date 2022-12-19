<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationCourseInfo extends Model
{
    use HasFactory;
    
    protected $fillables=['english_placement','math_placement','language','language_placement_test','checks_apply_to_language','open_to_choosing_another_language'];
}
