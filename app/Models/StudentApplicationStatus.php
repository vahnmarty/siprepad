<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Silly\Application;

class StudentApplicationStatus extends Model
{
    use HasFactory;
    
    const CANDIDATE_NOT_DEFINED = 0;
    const CANDIDATE_ACCEPTED = 1;
    const CANDIDATE_REJECTED = 2;
    const CANDIDATE_READ = 3;
    
    
    
    
    protected $table = 'student_application_status';
    
    protected $fillable = ['profile_id','s1_application_status','s1_notification_id','s1_candidate_status','s2_application_status',
        's2_notification_id','s2_candidate_status','s3_application_status','s3_notification_id','s3_candidate_status'];
    
    
    public function application()
    {
        return $this->belongsTo(Application::class,'application_id');
    }
    
    public function user() {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    
    
}
