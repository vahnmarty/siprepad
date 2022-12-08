<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Global_Notifiable extends Model
{
    use HasFactory;

    protected $table = 'global_notifiables';    
const NOTIFICATION_OFF = 0;
const NOTIFICATION_ON = 1;

 protected $fillable = [
        'notifiable'
    ];
}
