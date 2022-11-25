<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxWordsRule implements Rule
{
    private $max_words;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($max_words = 1500)
    {
        $this->max_words = $max_words;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //dd(count(explode(' ', $value)) <= $this->max_words);
        //return str_word_count($value, 0, "#$%^&*()+=-[]\';,./{}|\":<>?~!") <= $this->max_words;
        return count(explode(' ', $value)) <= $this->max_words+75;
        //return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Your answer cannot be longer than ' . $this->max_words . ' words';
    }
}
