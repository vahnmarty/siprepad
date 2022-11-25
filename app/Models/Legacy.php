<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legacy extends Model
{
    use HasFactory;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'user_id', 'application_id', 'is_family_members_attended_si'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
