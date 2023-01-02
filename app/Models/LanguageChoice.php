<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageChoice extends Model
{
    use HasFactory;
    protected $table = "language_choice";
    
    protected $fillable = ['profile_id','language_id','apply_to_language'
    ];
    
    const SPEAK_LANGUAGE_EVERYDAY = 1;
    const UNDERSTAND_DO_NOT_SPEAK = 2;
    const OCASSIONALLY = 3;
    const LANGUAGE_IMMERSION_PROGRAM = 4;
    const CURRENTLY_HAVING_IN_SCHOOL = 5;
    const CURRENTLY_TAKING_OUTSIDE_SCHOOL = 6;
    const NONE = 7;
    
    const LANG_COUNT = 0;
    
    public static function getLanguageAttributes()
    {
        return[
                self::SPEAK_LANGUAGE_EVERYDAY => 'I speak this language every day',
                self::UNDERSTAND_DO_NOT_SPEAK => 'I understand this language but do not speak this language',
                self:: OCASSIONALLY => 'I speak this language occasionally with family and/or friends',
                self::LANGUAGE_IMMERSION_PROGRAM => 'My current school is a language immersion program', 
                self::CURRENTLY_HAVING_IN_SCHOOL => 'I am currently taking or have taken this language at my current school', 
                self:: CURRENTLY_TAKING_OUTSIDE_SCHOOL => 'I am currently taking a course in this language outside of school', 
                self::NONE => 'None of the above'
            ];
    }
 
}
