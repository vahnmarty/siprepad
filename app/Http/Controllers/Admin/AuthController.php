<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/admin')->withSuccess('You have successfully logged out');
    }
}
