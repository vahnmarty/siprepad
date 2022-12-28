<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlacementInformation extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','profile_id','english_placement','math_placement',
        'math_challenge_test','language_selection','language_placement_test','languages','choose_other_language'
    ];
    
    const IS_SELECTED = 1;
    const NOT_SELECTED = 0;
    

    const FRENCH = 1;
    const LATIN = 2;
    const MANDARIN = 3;
    const SPANISH = 4;
    

    const SPEAK_LANGUAGE_EVERYDAY = 2;
    const UNDERSTAND_DO_NOT_SPEAK = 3;
    const OCASSIONALLY = 4;
    const LANGUAGE_IMMERSION_PROGRAM = 5;
    const CURRENTLY_HAVING_IN_SCHOOL = 6;
    const CURRENTLY_TAKING_OUTSIDE_SCHOOL = 7;
    const NONE = 8;

}

