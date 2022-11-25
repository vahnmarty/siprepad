<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ForgetUsernameMail;
use App\Models\Profile;
use App\Rules\EmailOrUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    //Login
    public function getLogin()
    {
        if (Auth::guard('customer')->check()) {
            return redirect('/'); //->withSuccess('You are already logged in');
        } else {
            return view('frontend.auth.login');
        }
    }

    public function postLogin(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'email' => ['required', 'string', new EmailOrUsername],
            'password' => ['required'],
        ], [
            'email.required' => Lang::get('validation.values.login_email.required')
        ]);

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (Auth::guard('customer')->attempt([$fieldType => $input['email'], 'password' => $input['password']])) {
            return redirect()->intended('/');
        } else {
            return redirect()->route('login.get')->with('error', 'The password you entered is incorrect');
        }
    }

    //Register
    public function getRegister()
    {
        if (Auth::guard('customer')->check()) {
            return redirect('/'); //->withSuccess('You are already logged in');
        } else {
            return view('frontend.auth.register');
        }
    }

    public function postRegister(Request $request)
    {

        $base_url =  config('app.url');

        $request->validate(
            [
                "first_name" => 'required',
                "last_name" => 'required',
                //'phone' => 'required|regex:/^[0-9]+$/|min:8|max:15',
                "email" => 'required|email:rfc,dns|unique:profiles,email',
                'password' => ['required', 'min:8', 'max:16', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/'],
                "confirm_password" => 'required|required_with:password|same:password',
            ],
            [
                'first_name.required' => Lang::get('validation.values.first_name.required'),
                'last_name.required' => Lang::get('validation.values.last_name.required'),
                'email.required' => Lang::get('validation.values.register_email.required')
            ]
        );

        DB::beginTransaction();
        try {

            $data = $request->all();
            // if ($request->hasFile('profile_image')) {
            //     $fileName = time() . '_' . $request->file->getClientOriginalName();
            //     $filePath = $request->file('profile_image')->storeAs('covid_document', $fileName, 'public');
            //     $data['profile_image'] = '/storage/' . $filePath;
            // }

            //Create UserName
            $Pro_First_Name = strtolower($request->first_name);
            $Pro_Last_Name = strtolower($request->last_name);
            $fullName = $Pro_First_Name[0] . $Pro_Last_Name;
            $username = Str::slug($fullName) . (Profile::max('id') + random_int(99, 9999));
            $i = 0;
            while (Profile::where('username', $username)->exists()) {
                $i++;
                $username = $Pro_First_Name[0] . $Pro_Last_Name . $i;
            }

            $data['Pro_First_Name'] = $request->first_name;
            $data['Pro_Last_Name'] = $request->last_name;
            $data['email'] = $request->email;
            $data['username'] = $username;
            $data['password'] = $request->password;
            $data['Last_Password_1'] = bcrypt($request->password);
            $profileObj = new Profile();
            $profileObj->fill($data);
            $profileObj->save();
            DB::commit();

            return redirect()->route('login.get')->with('success', 'Great!  You have successfully registered.');
        } catch (\Throwable $th) {
            Db::rollBack();
            // dd($th);
            return redirect()->back()->with('error', 'Oops!  Your registration failed.  Please try again.');
        }
    }

    //
    public function showForgotUsernameForm()
    {
        return view('frontend.auth.forgot-username');
    }
    public function submitForgotUsernameForm(Request $request)
    {
        $request->validate(
            [
                "email" => 'required|email:rfc,dns|exists:profiles'
            ]
        );

        $getUserName = Profile::where('email', $request->email)->first();
        if ($getUserName) {
            # send username to mail ...
            $details = array(
                'email' => $getUserName->email,
                'username' => $getUserName->username,
                'first_name' => $getUserName->Pro_First_Name
            );
            Mail::to($request->email)->send(new ForgetUsernameMail($details));
            if (count(Mail::failures()) > 0) {
                return redirect()->back()->with('error', 'Sending Mail failed');
            } else {
                return redirect()->route('login.get')->with('success', 'Check your email for your username');
            }
        } else {
            return redirect()->back()->with('error', 'Oops! No username found in this email.');
        }
    }

    //
    public function showForgotPasswordForm()
    {
        return view('frontend.auth.forgot-password');
    }
    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate(
            [
                "email" => 'required|email:rfc,dns|exists:profiles'
            ]
        );

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('login.get')->with('success', 'Check your email for instructions on how to reset your password');
    }

    //
    public function showResetPasswordForm($token)
    {
        return view('frontend.auth.reset-password', ['token' => $token]);
    }
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'confirmed', 'min:8', 'max:16', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/'],
                'password_confirmation' => 'required'
            ]
        );

        $updatePassword = DB::table('password_resets')
            ->where([
                // 'email' => $request->email,
                'token' => $request->token
            ])
            ->first();
        // dd($updatePassword);

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $profile = Profile::where('email',  $updatePassword->email)->first();

        if (Hash::check($request->password, $profile->password) || Hash::check($request->password, $profile->Last_Password_1) || Hash::check($request->password, $profile->Last_Password_2) || Hash::check($request->password, $profile->Last_Password_3) || Hash::check($request->password, $profile->Last_Password_4)) {
            return back()->with('error', "You previously used this password.  Please use another password.");
        }

        Profile::where('email', $updatePassword->email)->update([
            'password' => Hash::make($request->password),
            //'password' => $request->password,
            'Last_Password_1' => $profile->password,
            'Last_Password_2' => $profile->Last_Password_1,
            'Last_Password_3' => $profile->Last_Password_2,
            'Last_Password_4' => $profile->Last_Password_3,
        ]);

        DB::table('password_resets')->where(['token' => $request->token])->delete();

        return redirect()->route('login.get')->with('success', 'Your password has been changed!');
    }


    public function editProfile()
    {
        if (Auth::check()) {
            $profile = Profile::where('id', Auth::id())->first();
            return view('frontend.profile.edit-profile', ['profile' => $profile]);
        } else {
            abort(400, 'You are not authorize');
        }
    }
    public function updateProfile(Request $request)
    {
        $profile = Profile::where('id', Auth::id())->first();
        $profile->update([
            'Pro_First_Name' => $request->first_name,
            'Pro_Last_Name' => $request->last_name,
            'email' => $request->email,
            'Pro_Mobile' => $request->phone,
        ]);
        return redirect('/')->with('success', 'Your profile has been updated');
    }


    public function changePassword()
    {
        if (Auth::check()) {
            return view('frontend.profile.change-password');
        } else {
            abort(400, 'You are not authorize');
        }
    }
    public function submitChangePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => ['required', 'min:8', 'max:16', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/'],
                'confirm_password' => 'required|same:new_password'
            ]
        );
        $profile = Profile::where('id', Auth::id())->first();

        if ($request->old_password == $request->new_password) {
            return back()->with('error', Lang::get('validation.password_match'));
        } elseif (Hash::check($request->new_password, $profile->Last_Password_1)) {
            return back()->with('error', Lang::get('validation.password_used'));
        } elseif (Hash::check($request->new_password, $profile->Last_Password_2)) {
            return back()->with('error', Lang::get('validation.password_used'));
        } elseif (Hash::check($request->new_password, $profile->Last_Password_3)) {
            return back()->with('error', Lang::get('validation.password_used'));
        } elseif (Hash::check($request->new_password, $profile->Last_Password_4)) {
            return back()->with('error', Lang::get('validation.password_used'));
        } else {
            if (Hash::check($request->old_password, $profile->password)) {
                $profile->update([
                    'password' => $request->new_password,
                    'Last_Password_1' => bcrypt($request->new_password),
                    'Last_Password_2' => $profile->Last_Password_1,
                    'Last_Password_3' => $profile->Last_Password_2,
                    'Last_Password_4' => $profile->Last_Password_3,
                ]);
                return redirect('/')->with('success', 'Your password has been updated');
            } else {
                return back()->with('error', 'Old password is incorrect');
            }
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'You have successfully logged out');
    }
}
