<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class NotificationController extends Controller
{
    
    public function list() {
        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $notifications = Notification::where('profile_id',$profile_id)->orderBy('id','DESC')->get();
            
            return view('frontend.notification',compact('notifications'));
            
        } else {
            return redirect('/');
        }
    }
    
    public function show(Request $request, $nid) {
        $profile_id = Auth::guard('customer')->user()->id;
        $ntfDetail = Notification::where('id',$nid)->first();
        $appDetail = Application::where('Profile_ID',$profile_id)->first();
        
        return view('frontend.notificationDetail',compact('ntfDetail','appDetail'));   
    }
    
    
}
