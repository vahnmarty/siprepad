<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidateStatus;
use App\Models\ParentInformation;
use App\Models\GlobalRegisterable;

class RegistrationController extends Controller
{
    public function formOne()
    {    
        $registration = StudentInformation::get();
        
        return view('frontend.registeration.registeration-one', compact('registration'));
    }
    
    public function formTwo()
    {
        $registration = StudentInformation::get();
        
        return view('frontend.registeration.registeration-two', compact('registration'));
    }
    
}