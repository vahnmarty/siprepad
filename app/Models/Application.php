<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'Application_ID';
    

    protected $fillable = [
        'Profile_ID', 'Title', 'Description', 'status','last_step_complete'
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
