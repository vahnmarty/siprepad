<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\EmailOrUsername;
use Illuminate\Support\Facades\Lang;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard'); //->withSuccess('You are already logged in');
        } else {
            return view('auth.admin-login');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_name == "SUPER-ADMIN") {
                
                return redirect()->to('/admin/dashboard')->withSuccess('You have successfully logged in');
                //return redirect('/admin')->withSuccess('You have successfully logged in');
            } else {
                Auth::logout();
                return redirect()->route('admin.login.get')->withSuccess('Oops! You have entered invalid credentials.');
            }
        }

        return redirect()->route('admin.login.get')->withErrors('Oops! You have entered invalid credentials.');

        // $input = $request->all();

        // $request->validate([
        //     'email' => ['required', 'string', new EmailOrUsername],
        //     'password' => ['required'],
        // ], [
        //     'email.required' => Lang::get('validation.values.login_email.required')
        // ]);

        // $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // if (Auth::guard('customer')->attempt([$fieldType => $input['email'], 'password' => $input['password']])) {
        //     return redirect('/admin')->withSuccess('You have successfully logged in');

        // } else {
        //     return redirect()->route('admin.login.get')->withErrors('Oops! You have entered invalid credentials.');
        // }
    }

    public function signout(Request $request)
    {
        Auth::logout();
        return redirect('/admin')->withSuccess('You have successfully logged out');
    }
}
