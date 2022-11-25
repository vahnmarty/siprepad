<?php

namespace App\Rules;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class EmailOrUsername implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    // public function passes($attribute, $value)
    // {
    //     return User::where(function ($q) use ($value) {
    //         $q->orWhere('email', $value)->orWhere('username', $value);
    //     })->count() > 0;
    // }
    public function passes($attribute, $value)
    {
        return Profile::where(function ($q) use ($value) {
            $q->orWhere('email', $value)->orWhere('username', $value);
        })->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Lang::get('validation.values.login_email_username.exists');
        //return 'The username/email is not in the system.  Click below to create an account or retrieve your username';
    }
}
