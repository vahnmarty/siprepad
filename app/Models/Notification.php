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
    const NOTIFY_READ = 1;
    const NOTIFY_LENGTH = 1;
    const NOTIFY_ACCEPTANCE_FINANCIAL_AID_YES = 5;
    const ACCEPTANCE_FINANCIAL_AID_NO = 6;
    const ACCEPTANCE_HONORS = 7;
    const ACCEPTANCE_Hon_W_FA_YES = 8;
    const ACCEPTANCE_Hon_W_FA_NO = 9;
    
    protected $fillable = ['profile_id', 'message', 'student_profile', 'application_status', 'application_id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
