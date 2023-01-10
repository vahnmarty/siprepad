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
use App\Models\Payment;
use App\Models\StudentApplicationStatus;

class NotificationController extends Controller
{

    public function list()
    {
        $user = Auth::user('id');

        $ntfStatus = Global_Notifiable::select('notifiable')->first();

        if ($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error', 'You are not allowed to access this page');
        }

        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $notifications = Notification::where('profile_id', $profile_id)->get();

            $appid = Application::where('Profile_ID', $profile_id)->get('Application_ID')->first();
            $applicationId = $appid->Application_ID;

            $studentinfo = StudentInformation::where('Application_ID', $applicationId)->first();
            $application_status = StudentApplicationStatus::where('application_id', $applicationId)->first();

            if (!empty($notifications)) {

                $application = Application::Where('Profile_ID', $user->id)->first();

                $studentinfo = StudentInformation::where('Application_ID', $application->Application_ID)->first();

                if (!empty($application)) {
                    if ($application->candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                        $application->update([
                            'candidate_status' => Application::CANDIDATE_READ
                        ]);
                    }
                }

                return view('frontend.notification_list', compact('application_status', 'studentinfo'));
            } else {
                return redirect('/')->with('error', 'you donot have any notifications yet!!!');
            }
        }
    }

    public function show(Request $request, $nid)
    {
        $ntfStatus = Global_Notifiable::select('notifiable')->first();

        if ($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error', 'You are not allowed to access this page');
        }

        $profile_id = Auth::guard('customer')->user()->id;
        $studentDetail = StudentInformation::where('Profile_ID', $profile_id)->first();
        $ntfDetail = Notification::where('id', $nid)->first();

        $appDetail = Application::where('Profile_ID', $profile_id)->first();


        $appStatus = StudentApplicationStatus::where([
            [
                'profile_id',
                $ntfDetail->profile_id
            ],
            [
                'application_id',
                $ntfDetail->application_id
            ]
        ])->first();

        $student = StudentInformation::where('Application_ID', $ntfDetail->application_id)->first();
        if ($ntfDetail->student_profile == 'student_one') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S1_First_Name', 'S1_Last_name')->first();
            $name = ucfirst($studentname->S1_First_Name) . ' ' . ucfirst($studentname->S1_Last_name);

            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s1_application_status', 's1_candidate_status')->first();
            $student_status = $status->s1_application_status;
            $candidate = 's1';
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student','s1')->select('student')->first();
            if ($checkPayment) {
                if ($checkPayment->student == 's1') {
                    $student_accept_status = 'payment_successful';
                } else {
                    $student_accept_status = $status->s1_candidate_status;
                }

                if ($appStatus->s1_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                    $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s1_candidate_status' => Application::CANDIDATE_READ]);
                }
            } else {
                $student_accept_status = $status->s1_candidate_status;
            }

            $is_read_status = Notification::where('id', $nid)->first('is_read');
            $is_read_status = Notification::where('id', $nid)->first('is_read');
            if ($is_read_status->is_read == 0) {
                $is_read_update = Notification::where('id', $nid)->update([
                    'is_read' => Notification::NOTIFY_READ
                ]);
            }
        }
        if ($ntfDetail->student_profile == 'student_two') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S2_First_Name', 'S2_Last_name')->first();
            $name = ucfirst($studentname->S2_First_Name) . ' ' . ucfirst($studentname->S2_Last_name);
            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s2_application_status', 's2_candidate_status')->first();
            $student_status = $status->s2_application_status;
            $candidate = 's2';
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student','s2')->select('student')->first();
            if($checkPayment){
            if ($checkPayment->student == 's2') {
                $student_accept_status = "payment_successful";
            } else {
                $student_accept_status = $status->s2_candidate_status;
            }
        }
        else{
            $student_accept_status = $status->s2_candidate_status;

        }
            if ($appStatus->s2_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s2_candidate_status' => Application::CANDIDATE_READ]);
            }
            $is_read_status = Notification::where('id', $nid)->first('is_read');
            if ($is_read_status->is_read == 0) {
                $is_read_update = Notification::where('id', $nid)->update([
                    'is_read' => Notification::NOTIFY_READ
                ]);
            }
        }
        if ($ntfDetail->student_profile == 'student_three') {
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S3_First_Name', 'S3_Last_name')->first();

            $name = ucfirst($studentname->S3_First_Name) . ' ' . ucfirst($studentname->S3_Last_name);
            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s3_application_status', 's3_candidate_status')->first();
            $student_status = $status->s3_application_status;
            $student_accept_status = $status->s3_candidate_status;
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student','s3')->select('student')->first();
           
            if($checkPayment){
            if ($checkPayment->student == 's3') {
                $student_accept_status = 'payment_successful';
            } else {
                $student_accept_status = $status->s3_candidate_status;
            }
        }
        else{
            $student_accept_status = $status->s3_candidate_status;

        }
            $candidate = 's3';
            if ($appStatus->s3_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s3_candidate_status' => Application::CANDIDATE_READ]);
            }
            $is_read_status = Notification::where('id', $nid)->first('is_read');
            $is_read_update = Notification::where('id', $nid)->update([
                'is_read' => Notification::NOTIFY_READ
            ]);
        }

        return view('frontend.notificationDetail', compact('ntfDetail', 'appDetail', 'studentDetail', 'appStatus', 'name', 'student_status', 'candidate', 'student_accept_status'));

    }

    public function candidateResponse(Request $request, $apid, $candidate, $rsid)
    {
        $checkApp = StudentApplicationStatus::where('application_id', $apid)->first();

        $parentDetail = ParentInformation::where('Profile_ID', $checkApp->profile_id)->first();

        $studentDetail = StudentInformation::where('Profile_ID', $checkApp->profile_id)->first();

        if (!empty($checkApp)) {

            if ($candidate == 's1') {

                if ($checkApp->s1_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s1_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's1_candidate_status' => $rsid
                    ));

                    if ($updateCr) {

                       $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have recieved your response!!');
                    }

                    return redirect()->back()->with('error', 'Something went wrong! Please check after sometime');
                } else {
                    return redirect('/')->with('error', 'You can\'t change your response now!!');
                }
            }

            if ($candidate == 's2') {

                if ($checkApp->s2_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s2_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's2_candidate_status' => $rsid
                    ));

                    if ($updateCr) {

                       $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have recieved your response!!');
                    }

                    return redirect()->back()->with('error', 'Something went wrong! Please check after sometime');
                } else {
                    return redirect('/')->with('error', 'You can\'t change your response now!!');
                }
            }
            if ($candidate == 's3') {

                if ($checkApp->s3_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s3_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's3_candidate_status' => $rsid
                    ));

                    if ($updateCr) {

                        $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have recieved your response!!');
                    }

                    return redirect()->back()->with('error', 'Something went wrong! Please check after sometime');
                } else {
                    return redirect('/')->with('error', 'You can\'t change your response now!!');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Application Not found!!!');
        }
    }

    public function ShowStudentNotification($notificationid)
    {

        $notifications = Notification::where('id', $notificationid)->latest()->first();

        return view('frontend.notification', compact('notifications'));
    }
}