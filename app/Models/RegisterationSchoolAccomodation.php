<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationSchoolAccomodation extends Model
{
    use HasFactory;
    
    protected  $fillable = ['profile_id','formal_accomodations_provided','informal_accomodations_provided'];
    
}
