<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformationAmount extends Model
{
    use HasFactory;

    protected $table = 'student_information_amount';

    protected $fillable = [
        'profile_id',
        'application_id',
        'S1_Has_Financial_Aid',
        'S1_Financial_Aid_Status',
        'S1_Yearly_Financial_Aid_Amount',
        'S1_Total_Financial_Aid',
        'S1_Registration_Deposit_Amount',
        'S2_Has_Financial_Aid',
        'S2_Financial_Aid_Status',
        'S2_Yearly_Financial_Aid_Amount',
        'S2_Total_Financial_Aid',
        'S2_Registration_Deposit_Amount',
        'S3_Has_Financial_Aid',
        'S3_Financial_Aid_Status',
        'S3_Yearly_Financial_Aid_Amount',
        'S3_Total_Financial_Aid',
        'S3_Registration_Deposit_Amount',
        'course_1',
        'course_2',
        'course_3',
    ];
}