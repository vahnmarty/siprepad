<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStatement extends Model
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
        'Profile_ID', 'Application_ID',
        'Why_SI_for_Child',
        'S1_Endearing_Quality_and_Growth', 'S1_About_Child_Not_on_App', 'S2_Endearing_Quality_and_Growth', 'S2_About_Child_Not_on_App', 'S3_Endearing_Quality_and_Growth', 'S3_About_Child_Not_on_App',
        'Parent_Statement_Submitted_By', 'Parent_Statement_Relationship', 'Parent_Statement_Date','is_step_complete'
    ];

}
