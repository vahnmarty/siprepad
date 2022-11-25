<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Rules\NewOldPasswordNotSame;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        //dd($input);
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'min:8', new NewOldPasswordNotSame($input['current_password'])],
            'password_confirmation' => ['required', 'min:8', 'same:password'],
        ])->after(function ($validator) use ($user, $input) {
            if (!isset($input['current_password']) || !Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => $input['password'], //Hash::make($input['password']),
        ])->save();
        return redirect()->route('admin.profile')->with('success', 'Your password has been changed successfully');
    }
}
