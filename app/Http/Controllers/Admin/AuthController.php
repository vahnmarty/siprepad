<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\EmailOrUsername;
use Illuminate\Support\Facades\Lang;
use App\Models\Application;
use App\Models\Profile;
use App\Models\StudentInformation;
use App\Models\StudentApplicationStatus;
use App\Models\Notification;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use App\Models\AddressInformation;
use App\Models\ApplytoLanguageChoice;
use App\Models\CoursePlacementInformation;
use App\Models\LanguageChoice;
use App\Models\LegacyInformation;
use App\Models\ParentInformation;
use App\Models\Recommendation;
use App\Models\Registeration;
use App\Models\RegisterationEmergencycontact;
use App\Models\RegisterationHealthInformation;
use App\Models\RegisterationHouseholdInformation;
use App\Models\ParentStatement;
use App\Models\RegisterationParentInformation;
use App\Models\RegisterationSchoolAccomodation;
use App\Models\ReleaseAuthorization;
use App\Models\SiblingInformation;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\StudentRegisteration;
use App\Models\StudentStatement;


use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StudentInformation::truncate();
        StudentApplicationStatus::truncate();
        Application::truncate();
        Notification::truncate();
        Payment::truncate();
        AddressInformation::truncate();
        Profile::truncate();
        ApplytoLanguageChoice::truncate();
        CoursePlacementInformation::truncate();
        LanguageChoice::truncate();
        LegacyInformation::truncate();
        LegacyInformation::truncate();
        ParentInformation::truncate();
        ParentStatement::truncate();
        Recommendation::truncate();
        Registeration::truncate();
        RegisterationEmergencycontact::truncate();
        RegisterationHealthInformation::truncate();
        RegisterationHouseholdInformation::truncate();
        RegisterationParentInformation::truncate();
        RegisterationSchoolAccomodation::truncate();
        ReleaseAuthorization::truncate();
        SiblingInformation::truncate();
        SpiritualAndCommunityInformation::truncate();
        StudentRegisteration::truncate();
        StudentStatement::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return 'Cleared.';
    }
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
