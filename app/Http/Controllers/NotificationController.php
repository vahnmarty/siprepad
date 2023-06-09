<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\StudentInformation;
use App\Models\StudentInformationAmount;
use App\Models\Global_Notifiable;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidateStatus;
use App\Models\ParentInformation;
use App\Models\AddressInformation;
use App\Models\GlobalRegisterable;
use App\Models\Payment;
use App\Models\AcceptanceDeclineSurvey;
use App\Models\StudentApplicationStatus;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
            if (!count($notifications) > 0) {
                return redirect('/')->with('error', 'You are not allowed to access this page');
            }
            $appid = Application::where('Profile_ID', $profile_id)->get('Application_ID')->first();
            $applicationId = $appid->Application_ID;

            $studentinfo = StudentInformation::where('Application_ID', $applicationId)->first();
            $application_status = StudentApplicationStatus::where('application_id', $applicationId)->select('s1_notification_id', 's2_notification_id', 's3_notification_id')->first();
            if (!empty($application_status)) {
                $notification_array = array($application_status->s1_notification_id, $application_status->s2_notification_id, $application_status->s3_notification_id);
                $notification_list =  count(array_filter($notification_array));
            } else {
                $notification_list = Notification::NOTIFY_NO_STATUS;
            }

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
                $studentCount = self::getApplicationsAccepted($application, $profile_id, Application::No_RESPONSE);
                if (count($studentCount) == 1) {
                    if ($studentCount[Application::TYPE_PENDING]['student_type'] == Application::STUDENT_ONE) {
                        return redirect('/notification/show/' . $application_status->s1_notification_id);
                    }
                    if ($studentCount[Application::TYPE_PENDING]['student_type'] == Application::STUDENT_TWO) {
                        return redirect('/notification/show/' . $application_status->s2_notification_id);
                    }
                    if ($studentCount[Application::TYPE_PENDING]['student_type'] == Application::STUDENT_THREE) {
                        return redirect('/notification/show/' . $application_status->s3_notification_id);
                    }
                } else {
                    return view('frontend.notification_list', compact('application_status', 'studentinfo', 'notification_list'));
                }
            } else {
                return redirect('/')->with('error', 'you donot have any notifications yet!!!');
            }
        }
    }
    public function showList()
    {

        $user = Auth::user('id');

        $ntfStatus = Global_Notifiable::select('notifiable')->first();

        if ($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error', 'You are not allowed to access this page');
        }

        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $notifications = Notification::where('profile_id', $profile_id)->get();
            if (!count($notifications) > 0) {
                return redirect('/')->with('error', 'You are not allowed to access this page');
            }
            $appid = Application::where('Profile_ID', $profile_id)->get('Application_ID')->first();
            $applicationId = $appid->Application_ID;

            $studentinfo = StudentInformation::where('Application_ID', $applicationId)->first();
            $application_status = StudentApplicationStatus::where('application_id', $applicationId)->select('s1_notification_id', 's2_notification_id', 's3_notification_id')->first();
            if (!empty($application_status)) {
                $notification_array = array($application_status->s1_notification_id, $application_status->s2_notification_id, $application_status->s3_notification_id);
                $notification_list =  count(array_filter($notification_array));
            } else {
                $notification_list = Notification::NOTIFY_NO_STATUS;
            }

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
                return view('frontend.notification_list', compact('application_status', 'studentinfo', 'notification_list'));
            } else {
                return redirect('/')->with('error', 'you donot have any notifications yet!!!');
            }
        }
    }
    private function getApplicationsAccepted($application, $profile_id, $applicationType)
    {
        $studentArr = [];
        $studentInfo = [];
        if ($application) {

            $getData = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->get();
            $StudentApplicationStatus = StudentApplicationStatus::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->get();


            foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
                $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_application_status'];
                $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_application_status'];
                $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_application_status'];
                $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
            }
            if (count($StudentApplicationStatus) > 0) {
                foreach ($getData as $key => $getStudentInfo) {
                    $student1 = [
                        "Application_ID" => $getStudentInfo->Application_ID,
                        "Photo" =>  $getStudentInfo->S1_Photo,
                        "First_Name" => Str::lower($getStudentInfo->S1_First_Name),

                        "student_type" => Application::STUDENT_ONE
                    ];
                    $student2 = [
                        "Application_ID" => $getStudentInfo->Application_ID,
                        "Photo" =>  $getStudentInfo->S2_Photo,
                        "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                        "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                        "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),

                        "student_type" => Application::STUDENT_TWO

                    ];
                    $student3 = [
                        "Application_ID" => $getStudentInfo->Application_ID,
                        "Photo" =>  $getStudentInfo->S3_Photo,
                        "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                        "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                        "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),

                        "student_type" => Application::STUDENT_THREE

                    ];
                    foreach ($StudentApplicationStatusResults as $result) {
                        if ($getStudentInfo->Application_ID == $result['application_id']) {
                            if ($result['s1_application_status'] == $applicationType) {
                                $studentArr[] = $student1 = null;
                            } else {
                                if ($result['s1_application_status'] == Application::TYPE_PENDING) {
                                    $studentArr[] = $student1 = null;
                                } else {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                }
                            }

                            if ($result['s2_application_status'] == $applicationType) {
                                $studentArr[] = $student2 = null;
                            } else {

                                if ($result['s2_application_status'] == Application::TYPE_PENDING) {
                                    $studentArr[] = $student2 = null;
                                } else {
                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                }
                            }
                            if ($result['s3_application_status'] == $applicationType) {
                                $studentArr[] = $student3 = null;
                            } else {

                                if ($result['s3_application_status'] == Application::TYPE_PENDING) {
                                    $studentArr[] = $student3 = null;
                                } else {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                }
                            }
                        }
                    }

                    $studentInfo = [];
                    foreach ($studentArr as $student) {
                        if (!is_null($student)) {
                            array_push($studentInfo, $student);
                        }
                    }
                }
            } else {
                $studentInfo = [];
            }
        } else {
            $studentInfo = [];
        }
        return $myCollectionObj = (array_filter($studentInfo));
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    public function candidateResponse(Request $request, $apid, $candidate, $rsid)
    {
        $checkApp = StudentApplicationStatus::where('application_id', $apid)->first();

        $parentDetail = ParentInformation::where('Profile_ID', $checkApp->profile_id)->first();

        $studentDetail = StudentInformation::where('Profile_ID', $checkApp->profile_id)->first();

        if (!empty($checkApp)) {

            if ($candidate == Application::STUDENT_S1) {

                if ($checkApp->s1_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s1_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's1_candidate_status' => $rsid
                    ));

                    if ($updateCr) {

                        //    $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have received your response!!');
                    }

                    return redirect()->back()->with('error', 'Something went wrong! Please check after sometime');
                } else {
                    return redirect('/')->with('error', 'You can\'t change your response now!!');
                }
            }

            if ($candidate == Application::STUDENT_S2) {

                if ($checkApp->s2_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s2_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's2_candidate_status' => $rsid
                    ));

                    if ($updateCr) {
                        //    $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have received your response!!');
                    }

                    return redirect()->back()->with('error', 'Something went wrong! Please check after sometime');
                } else {
                    return redirect('/')->with('error', 'You can\'t change your response now!!');
                }
            }
            if ($candidate == Application::STUDENT_S3) {

                if ($checkApp->s3_candidate_status == Application::CANDIDATE_NOT_DEFINED || $checkApp->s3_candidate_status == Application::CANDIDATE_READ) {
                    $updateCr = StudentApplicationStatus::where('application_id', $apid)->limit(1)->update(array(
                        's3_candidate_status' => $rsid
                    ));

                    if ($updateCr) {
                        // $res = Mail::to($parentDetail->P1_Personal_Email)->send(new CandidateStatus($studentDetail, $rsid, $parentDetail));
                        return redirect()->back()->with('success', 'Thank you, We have received your response!!');
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
    public function acceptanceSurvey(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "name_of_School_1" => "required",
            "name_of_School_2" => "required",
            "name_of_School_3" => "required",
            "name_of_School_4" => "required",
            "school_s_Decision_1" => "required",
            "school_s_Decision_2" => "required",
            "school_s_Decision_3" => "required",
            "school_s_Decision_4" => "required",
            "applied_for_Aid_1" => "required",
            "applied_for_Aid_2" => "required",
            "applied_for_Aid_3" => "required",
            "applied_for_Aid_4" => "required",
            "amount_of_Aid_or_scholarship_Offered_1" => "required",
            "amount_of_Aid_or_scholarship_Offered_2" => "required",
            "amount_of_Aid_or_scholarship_Offered_3" => "required",
            "amount_of_Aid_or_scholarship_Offered_4" => "required",
            "comment_1" => "required",
            "comment_2" => "required",
            "comment_3" => "required",
            "comment_4" => "required",
            "most_Important_Reason" => "required",
            "second_Most_Important_Reason" => "required",
            "third_Most_Important_Reason" => "required",
            "rank_Comment_1" => "required",
            "rank_Comment_2" => "required",
            "rank_Comment_3" => "required",
            "student_Visit_Program" => "required",
            "admissions_process" => "required",
            "student_type" => "required",

        ]);
        if ($validator->fails()) {
            $imploded = array();
            foreach (json_decode($validator->errors(), true) as $array) {
                $imploded[] = implode('~', $array);
            }
            $validatorError = implode(" & ", $imploded);
            $data['message'] = $validatorError;
            $data['status'] = "error";
            return $data;
        } else {
            $profile_id = Auth::guard('customer')->user()->id;
            $getApplication = Application::where('Profile_ID', $profile_id)->first();
            $application_id = $getApplication->Application_ID;
            $studentAppectanceStoreResult =  AcceptanceDeclineSurvey::create([
                'Profile_ID' => Auth::guard('customer')->user()->id,
                'application_id' => $application_id,
                "name_of_School_1" => $request->post('name_of_School_1'),
                "name_of_School_2" => $request->post('name_of_School_2'),
                "name_of_School_3" => $request->post('name_of_School_3'),
                "name_of_School_4" => $request->post('name_of_School_4'),
                "school_s_Decision_1" => $request->post('school_s_Decision_1'),
                "school_s_Decision_2" => $request->post('school_s_Decision_2'),
                "school_s_Decision_3" => $request->post('school_s_Decision_3'),
                "school_s_Decision_4" => $request->post('school_s_Decision_4'),
                "applied_for_Aid_1" => $request->post('applied_for_Aid_1'),
                "applied_for_Aid_2" => $request->post('applied_for_Aid_2'),
                "applied_for_Aid_3" => $request->post('applied_for_Aid_3'),
                "applied_for_Aid_4" => $request->post('applied_for_Aid_4'),
                "amount_of_Aid_or_scholarship_Offered_1" => $request->post('amount_of_Aid_or_scholarship_Offered_1'),
                "amount_of_Aid_or_scholarship_Offered_2" => $request->post('amount_of_Aid_or_scholarship_Offered_2'),
                "amount_of_Aid_or_scholarship_Offered_3" => $request->post('amount_of_Aid_or_scholarship_Offered_3'),
                "amount_of_Aid_or_scholarship_Offered_4" => $request->post('amount_of_Aid_or_scholarship_Offered_4'),
                "comment_1" => $request->post('comment_1'),
                "comment_2" => $request->post('comment_2'),
                "comment_3" => $request->post('comment_3'),
                "comment_4" => $request->post('comment_4'),
                "most_Important_Reason" => $request->post('most_Important_Reason'),
                "second_Most_Important_Reason" => $request->post('second_Most_Important_Reason'),
                "third_Most_Important_Reason" => $request->post('third_Most_Important_Reason'),
                "rank_Comment_1" => $request->post('rank_Comment_1'),
                "rank_Comment_2" => $request->post('rank_Comment_2'),
                "rank_Comment_3" => $request->post('rank_Comment_3'),
                "student_Visit_Program" => $request->post('student_Visit_Program'),
                "admissions_process" => $request->post('admissions_process'),
                "student_type" => $request->post('student_type'),
                "school_planning_attend" => $request->post('school_planning_attend'),
                "modal_type" => $request->post('modal_type'),


            ]);
            if ($studentAppectanceStoreResult) {
                $data['message'] = "Successfully data saved";
                $data['status'] = "success";
            } else {
                $data['message'] = "Missing data please try again";
                $data['status'] = "error";
            }
        }
        return $data;
    }
    public function ShowStudentNotification($notificationid)
    {
        $StudentApplicationStatusResults = [];
        $ntfStatus = Global_Notifiable::select('notifiable')->first();
        if ($ntfStatus->notifiable == Global_Notifiable::NOTIFICATION_OFF) {
            return redirect()->back()->with('error', 'You are not allowed to access this page');
        }
        $profile_id = Auth::guard('customer')->user()->id;
        $studentDetail = StudentInformation::where('Profile_ID', $profile_id)->first();
        $ntfDetail = Notification::where('id', $notificationid)->first();
        if (!$ntfDetail) {
            return redirect('/')->with('error', 'You are not allowed to access this page');
        }
        if (!$profile_id == $ntfDetail->profile_id) {
            return redirect('/')->with('error', 'You are not allowed to access this page');
        }
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
        $studentJoinsDetail = StudentInformation::leftjoin('parent_information', 'student_information.Profile_ID', '=', 'parent_information.Profile_ID')
            ->where('parent_information.Application_ID',  $ntfDetail->application_id)
            ->leftjoin('student_information_amount', 'student_information.Application_ID', '=', 'student_information_amount.application_id')
            ->leftjoin('address_information', 'student_information.Profile_ID', '=', 'address_information.Profile_ID')->where('student_information.Application_ID',  $ntfDetail->application_id)
            ->latest('address_information.ID')->first();

        $time = Carbon::now();
        $year = date('Y');
        $date = date('d');

        $monthName = $time->format('F');
        $notification_time = $monthName . ' ' . $date . ', ' . $year;
        // dd($notification_time);
        $student = StudentInformation::where('Application_ID', $ntfDetail->application_id)->first();
        if ($ntfDetail->student_profile == Application::STUDENT_ONE) {
            // if ($appStatus->s1_notification_id == null || $appStatus->s1_notification_id == "") {
            //     return redirect('/')->with('error', 'You are not allowed to access this page');
            // }
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S1_First_Name', 'S1_Last_name')->first();
            $name = ucfirst($studentname->S1_First_Name) . ' ' . ucfirst($studentname->S1_Last_name);

            $address = AddressInformation::where('Application_ID', $ntfDetail->application_id)->first();
            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s1_application_status', 's1_candidate_status')->first();
            if (!$status) {
                return redirect('/')->with('error', 'You are not allowed to access this page');
            }
            if ($appStatus->s1_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s1_candidate_status' => Application::CANDIDATE_READ]);
            }
            $student_status = $status->s1_application_status;
            if ($appStatus->s1_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s1_candidate_status' => Application::CANDIDATE_READ]);
            }
            $candidate = Application::STUDENT_S1;
            $studentInformationAmount =  StudentInformationAmount::where('application_id', $ntfDetail->application_id)->select('S1_Registration_Deposit_Amount')->first();
            if ($studentInformationAmount) {
                $studentInformationAmounts=$studentInformationAmount->S1_Registration_Deposit_Amount;
            } else {
                $studentInformationAmounts =Payment::PAYAMOUNT;
            }
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student', Application::STUDENT_S1)->select('student')->first();
            if ($checkPayment) {
                if ($checkPayment->student == Application::STUDENT_S1) {
                    $student_accept_status = 'payment_successful';
                } else {
                    $student_accept_status = $status->s1_candidate_status;
                }
            } else {
                $student_accept_status = $status->s1_candidate_status;
            }

            $is_read_status = Notification::where('id', $notificationid)->first('is_read');
            if ($is_read_status->is_read == 0) {
                $is_read_update = Notification::where('id', $notificationid)->update([
                    'is_read' => Notification::NOTIFY_READ
                ]);
            }
        }
        if ($ntfDetail->student_profile == Application::STUDENT_TWO) {
            // if ($appStatus->s2_notification_id == null || $appStatus->s1_notification_id == "") {
            //     return redirect('/')->with('error', 'You are not allowed to access this page');
            // }
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S2_First_Name', 'S2_Last_name')->first();
            $name = ucfirst($studentname->S2_First_Name) . ' ' . ucfirst($studentname->S2_Last_name);
            $address = AddressInformation::where('Application_ID', $ntfDetail->application_id)->first();

            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s2_application_status', 's2_candidate_status')->first();
            if (!$status) {
                return redirect('/')->with('error', 'You are not allowed to access this page');
            }
            $student_status = $status->s2_application_status;
            $candidate = Application::STUDENT_S2;
            $studentInformationAmount =  StudentInformationAmount::where('application_id', $ntfDetail->application_id)->select('S2_Registration_Deposit_Amount')->first();
            if ($studentInformationAmount) {
                $studentInformationAmounts=$studentInformationAmount->S2_Registration_Deposit_Amount;
            } else {
                $studentInformationAmounts =Payment::PAYAMOUNT;
            }
            // dd($studentInformationAmount);
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student', Application::STUDENT_S2)->select('student')->first();
            if ($checkPayment) {
                if ($checkPayment->student == Application::STUDENT_S2) {
                    $student_accept_status = "payment_successful";
                } else {
                    $student_accept_status = $status->s2_candidate_status;
                }
            } else {
                $student_accept_status = $status->s2_candidate_status;
            }
            if ($appStatus->s2_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s2_candidate_status' => Application::CANDIDATE_READ]);
            }
            $is_read_status = Notification::where('id', $notificationid)->first('is_read');

            if ($is_read_status->is_read == 0) {
                $is_read_update = Notification::where('id', $notificationid)->update([
                    'is_read' => Notification::NOTIFY_READ
                ]);
            }
        }
        if ($ntfDetail->student_profile == Application::STUDENT_THREE) {
            // if ($appStatus->s3_notification_id == null || $appStatus->s1_notification_id == "") {
            //     return redirect('/')->with('error', 'You are not allowed to access this page');
            // }
            $studentname = StudentInformation::where('Application_ID', $ntfDetail->application_id)->select('S3_First_Name', 'S3_Last_name')->first();
            $address = AddressInformation::where('Application_ID', $ntfDetail->application_id)->first();

            $name = ucfirst($studentname->S3_First_Name) . ' ' . ucfirst($studentname->S3_Last_name);
            $status = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->select('s3_application_status', 's3_candidate_status')->first();
            if (!$status) {
                return redirect('/')->with('error', 'You are not allowed to access this page');
            }

            $student_status = $status->s3_application_status;
            $student_accept_status = $status->s3_candidate_status;
            $studentInformationAmount =  StudentInformationAmount::where('application_id', $ntfDetail->application_id)->select('S3_Registration_Deposit_Amount')->first();
            if ($studentInformationAmount) {
                $studentInformationAmounts=$studentInformationAmount->S3_Registration_Deposit_Amount;
            } else {
                $studentInformationAmounts =Payment::PAYAMOUNT;
            }
            $checkPayment = Payment::where('Application_ID', $ntfDetail->application_id)->where('student', Application::STUDENT_S3)->select('student')->first();

            if ($checkPayment) {
                if ($checkPayment->student == Application::STUDENT_S3) {
                    $student_accept_status = 'payment_successful';
                } else {
                    $student_accept_status = $status->s3_candidate_status;
                }
            } else {
                $student_accept_status = $status->s3_candidate_status;
            }
            $candidate = Application::STUDENT_S3;
            if ($appStatus->s3_candidate_status == Application::CANDIDATE_NOT_DEFINED) {
                $updateCandidateStatus = StudentApplicationStatus::where('application_id', $ntfDetail->application_id)->update(['s3_candidate_status' => Application::CANDIDATE_READ]);
            }
            $is_read_status = Notification::where('id', $notificationid)->first('is_read');
            $is_read_update = Notification::where('id', $notificationid)->update([
                'is_read' => Notification::NOTIFY_READ
            ]);
        }
 
        return view('frontend.notificationDetail', compact('ntfDetail', 'studentInformationAmounts', 'appDetail', 'studentJoinsDetail', 'studentDetail', 'appStatus', 'name', 'student_status', 'candidate', 'student_accept_status', 'notification_time'));
    }
}
