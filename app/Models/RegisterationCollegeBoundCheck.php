<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationCollegeBoundCheck extends Model
{
    use HasFactory;
    
    protected  $fillable = ['first_generation_college_bound_student'];
    
}
