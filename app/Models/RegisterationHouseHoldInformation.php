<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationHouseHoldInformation extends Model
{
    use HasFactory;
    
    protected $fillable =['profile_id','registeration_id','live_with','street','city','state','zip_code',
        'home_phone','primary_parent'
    ];
}
