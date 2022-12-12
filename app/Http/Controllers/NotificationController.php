<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\StudentInformation;
use App\Models\Global_Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidateStatus;
use App\Models\ParentInformation;

class NotificationController extends Controller
{
    
    
    
    public function list() {
        
        $user = Auth::user('id');
       
        $application=Application::Where('Profile_ID',$user->id)->update(['candidate_status'=>3]);
        $ntfStatus = Global_Notifiable::select('notifiable')->first();
        
        if($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error','You are not allowed to access this page');
        }
        
        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $notifications = Notification::where('profile_id',$profile_id)->latest('id')->first();
//             dd($notifications->toArray());
            return view('frontend.notification',compact('notifications'));
            
        } else {
            return redirect('/');
        }
    }
    
    public function show(Request $request, $nid) {
        
        $ntfStatus = Global_Notifiable::select('notifiable')->first();
        
        if($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error','You are not allowed to access this page');
        }
        
        $profile_id = Auth::guard('customer')->user()->id;
        $studentDetail = StudentInformation::where('Profile_ID',$profile_id)->first();
        $ntfDetail = Notification::where('id',$nid)->first();
        $appDetail = Application::where('Profile_ID',$profile_id)->first();
        
        return view('frontend.notificationDetail',compact('ntfDetail','appDetail','studentDetail'));   
    }
    
    public function candidateResponse(Request $request, $apid, $rsid) {
        $checkApp = Application::where('Application_ID',$apid)->first();
        $parentDetail = ParentInformation::where('Profile_ID',$checkApp->Profile_ID)->first();
        $studentDetail = StudentInformation::where('Profile_ID',$checkApp->Profile_ID)->first();
        
        if(!empty($checkApp)) {
            if($checkApp->candidate_status == Application::CANDIDATE_NOT_DEFINED){
                $updateCr = Application::where('Application_ID',$apid)->limit(1)->update(array('candidate_status' => $rsid));
                
                if($updateCr) {
                    $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                    return redirect()->back()->with('success','Thankyou, We have recieved your response!!');
                }
                
                return redirect()->back()->with('error','Something went wrong! Please check after sometime');
            } else {
                return redirect('/')->with('error','You can\'t change your response now!!');
            }
        } else {
            return redirect()->back()->with('error','Application Not found!!!');
        }
    }
    
    
}
