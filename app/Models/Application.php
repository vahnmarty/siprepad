<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'Application_ID';
    

    
    const TYPE_PENDING = 0;
    const TYPE_ACCEPTED = 1;
    const TYPE_WAIT_LISTED = 2;
    const TYPE_NOT_ACCEPTED = 3;
    
    const CANDIDATE_NOT_DEFINED = 0;
    const CANDIDATE_ACCEPTED = 1;
    const CANDIDATE_REJECTED = 2;
    const CANDIDATE_READ = 3;

    protected $fillable = [
        'Profile_ID', 'Title', 'Description', 'status','last_step_complete','application_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(Profile::class,'Profile_ID');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'Application_ID');
    }
}
