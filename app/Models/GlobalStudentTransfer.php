<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalStudentTransfer extends Model
{
    use HasFactory;

    protected $table = 'global_student_transfer';    
const STUDENTTRANSFER_OFF = 0;
const STEP_ONE = 'one';
const STEP_TWO = 'two'; 
const STEP_THREE = 'three';
const STEP_FOUR = 'four';
const STEP_FIVE = 'five';
const STEP_SIX = 'six';
const STEP_SEVEN = 'seven';
const STEP_EIGHT = 'eight';
const STEP_NINE = 'nine';
const STEP_TEN = 'ten';
const STEP_FINAL = 'final';
const STUDENTTRANSFER_ON = 1;

 protected $fillable = [
        'student_transfer'
    ];
}
