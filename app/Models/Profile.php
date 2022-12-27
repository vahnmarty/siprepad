<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profile extends Authenticatable
{
    use HasFactory, Notifiable,HasProfilePhoto;
    
    const NOTIFICATION_OFF = 1;
    const NOTIFICATION_ON = 0;


    protected $guard='customer';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Pro_First_Name', 'Pro_Last_Name', 'email', 'Pro_Mobile', 'username', 'password',
        'Last_Password_1', 'Last_Password_2', 'Last_Password_3', 'Last_Password_4'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
 
    public function getFullNameAttribute()
    {
        return "{$this->Pro_First_Name} {$this->Pro_Last_Name}";
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }
    
    public function registeration()
    {
        return $this->hasOne(StudentRegisteration::class);
    }
    
    public function ApplicationStatus()
    {
        return $this->hasOne(StudentApplicationStatus::class);
    }
}
