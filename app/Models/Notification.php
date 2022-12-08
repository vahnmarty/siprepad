<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    use HasFactory;
    
    const NOTIFY_NO_STATUS = 0;
    const NOTIFY_ACCEPTED = 1;
    const NOTIFY_WAITLIST = 2;
    const NOTIFY_REJECTED = 3;



    protected $fillable = ['profile_id', 'message'];
        
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
