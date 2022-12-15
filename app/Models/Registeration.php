<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registeration extends Model
{
    use HasFactory;
    protected $primaryKey = 'registeration_id';
    
    
    const Pending = 0;
    const Complete = 1;
    
    
    protected $fillable = ['profile_id', 'status','last_step_complete'];
}
