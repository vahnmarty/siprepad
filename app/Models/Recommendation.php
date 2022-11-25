<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Profile_ID',
        'Rec_Name',
        'Rec_Email',
        'Rec_Student',
        'Rec_Message',
        'Rec_Request_Send_Date',
        'Rec_Relationship_to_Student',
        'Rec_Years_Known_Student',
        'Rec_Recommendation',
        'Rec_Send_Date',
        'Status'
    ];

    public function user()
    {
        return $this->belongsTo(Profile::class,'Profile_ID');
    }
}
