<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterationParentInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'registeration_id',
        'relation_to_applicant',
        'parent_first_name',
        'parent_middle_name',
        'parent_last_name',
        'parent_cell_phone',
        'parent_email',
        'parent_employer',
        'parent_position',
        'parent_work_phone',
        'parent_school'
    ];
}
