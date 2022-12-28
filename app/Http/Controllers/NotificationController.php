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
use App\Models\GlobalRegisterable;
use App\Models\StudentApplicationStatus;

class NotificationController extends Controller
{

    public function list() {
        
        $user = Auth::user('id');
       

        $ntfStatus = Global_Notifiable::select('notifiable')->first();
       
        if($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error','You are not allowed to access this page');
        }
        
        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $notifications =Notification::where('profile_id',$profile_id)->get();
    
            $appid = Application::where('Profile_ID',$profile_id)->get('Application_ID')->first();
              $applicationId    =     $appid->Application_ID;
             
              $studentinfo = StudentInformation::where('Application_ID',$applicationId)->first();
              $application_status = StudentApplicationStatus::where('application_id',$applicationId)->first();

            if(!empty($notifications)){
                
                $application=Application::Where('Profile_ID',$user->id)->first();
                
                $studentinfo = StudentInformation::where('Application_ID',$application->Application_ID)->get();
                
                if(!empty($application)){
                    if($application->candidate_status == Application::CANDIDATE_NOT_DEFINED){
                        $application->update(['candidate_status'=>Application::CANDIDATE_READ]);
                    }
                    
                }
                
                return view('frontend.notification_list',compact('application_status'));
                
            }else{
                return  redirect('/')->with('error','you donot have any notifications yet!!!');
            }
            
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
        $is_read_status= Notification::where('id',$nid)->pluck('is_read');
        if($is_read_status[0] == 0){
        $is_read_update=Notification::where('id',$nid)->update(['is_read'=>Notification::NOTIFY_READ]);
        }

        return view('frontend.notificationDetail',compact('ntfDetail','appDetail','studentDetail'));   
    }
    
    public function candidateResponse(Request $request, $apid, $rsid) {
        $checkApp = Application::where('Application_ID',$apid)->first();
        $parentDetail = ParentInformation::where('Profile_ID',$checkApp->Profile_ID)->first();
        $studentDetail = StudentInformation::where('Profile_ID',$checkApp->Profile_ID)->first();

        
        if(!empty($checkApp)) {
            if($checkApp->candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->candidate_status == Application::CANDIDATE_READ){
                $updateCr = Application::where('Application_ID',$apid)->limit(1)->update(array('candidate_status' => $rsid));
                
                if($updateCr) {

                    $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                    return redirect()->back()->with('success','Thank you, We have recieved your response!!');

                }
                
                return redirect()->back()->with('error','Something went wrong! Please check after sometime');
            } else {
                return redirect('/')->with('error','You can\'t change your response now!!');
            }
        } else {
            return redirect()->back()->with('error','Application Not found!!!');
        }
    }
    
    public function ShowStudentNotification($notificationid){
        
        $notifications= Notification::where('id',$notificationid)->latest()->first();
       return view('frontend.notification',compact('notifications'));
       
    }
}
