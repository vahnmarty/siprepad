<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalRegisterable extends Model
{
    use HasFactory;
    const REGISTERTATION_OFF = 0;
    const Registeration_ON = 1;
    
    protected $fillable = [
        'registerable'
    ];
}
