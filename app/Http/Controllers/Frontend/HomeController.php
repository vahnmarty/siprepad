<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RecommendationMail;
use App\Models\Global_Notifiable;
use App\Models\AddressInformation;
use App\Models\Application;
use App\Models\LegacyInformation;
use App\Models\ParentInformation;
use App\Models\ParentStatement;
use App\Models\StudentInformation;
use App\Models\Recommendation;
use App\Models\ReleaseAuthorization;
use App\Models\SiblingInformation;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\StudentStatement;
use App\Models\WritingSample;
use Illuminate\Support\Str;
use App\Rules\MaxWordsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Registeration;
use App\Models\StudentRegisteration;
use App\Models\GlobalRegisterable;
use App\Models\GlobalStudentTransfer;
use App\Helpers\Helper;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\StudentApplicationStatus;

class HomeController extends Controller
{
    public $GlobalNotifiable;
    public $GlobalRegisterable;
    public $GlobalStudentTransfer;
    public function __construct()
    {
        $this->GlobalNotifiable = Helper::getGlobalNotifiable();
        $this->GlobalRegisterable = Helper::getGlobalRegisterable();
        $this->GlobalStudentTransfer = Helper::getGlobalStudentTransfer();
    }
    public function home()
    {
        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->first();
            $recommendationStudent = Recommendation::where('Profile_ID', $profile_id)->select('Rec_Student')->get()->toArray();
            $getStudentCount = 0;
            $studentCount = self::getApplicationsAccepted($application, $profile_id, Application::No_RESPONSE);
            $paymentStudentCount = self::getMadePayment($application, $profile_id, Application::No_RESPONSE);
            // dd($studentCount);
            $getCandidateStatus = '';
            if ($application) {

                $getAllStudent = [];
                $studentData =     $getStudent = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->first()->toArray();

                $arr1 = [
                    "Rec_Student" => $getStudent['S1_First_Name'] . " " . $getStudent['S1_Last_Name'],
                ];

                $arr2 = [
                    "Rec_Student" => $getStudent['S2_First_Name'] . " " . $getStudent['S2_Last_Name'],
                ];

                $arr3 = [
                    "Rec_Student" => $getStudent['S3_First_Name'] . " " . $getStudent['S3_Last_Name'],
                ];

                $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;

                foreach ($studentArr as $key => $student) {
                    if (!is_null($student)) {
                        array_push($getAllStudent, $student);
                    }
                }
                //check all the student recommendation send or not
                $getStudent = [];
                foreach ($studentArr as $key => $student) {
                    if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                        array_push($getStudent, $student);
                    }
                }
                $StudentApplicationStatus = StudentApplicationStatus::get();
                $getStudentCount = count($getStudent);
                $getCandidateStatus = self::getCandidateAccepted($studentData, $StudentApplicationStatus, 1);
            }
            $dbQuery = StudentInformation::query();




            $notifications = $this->GlobalNotifiable;
            $registerable = $this->GlobalRegisterable;
            $studentTransfer = $this->GlobalStudentTransfer;
            $application_status = StudentApplicationStatus::Where('profile_id', $profile_id)->first();
            if (!empty($application_status)) {
                $notification_array = array($application_status->s1_notification_id, $application_status->s2_notification_id, $application_status->s3_notification_id);
                $notification_list =  count(array_filter($notification_array));
            } else {
                $notification_list = Notification::NOTIFY_NO_STATUS;
            }

            return view('frontend.home', compact('application', 'getStudentCount', 'studentCount', 'getCandidateStatus', 'paymentStudentCount', 'notifications', 'application_status', 'registerable', 'studentTransfer', 'notification_list'));
        } else {
            return redirect('/login');
        }
    }

    public function bookWildcatExperience()
    {
        return response()->json("You clicked on book wildcat experience", 200);
    }
    private function getMadePayment($application, $profile_id, $applicationType)
    {
        $studentArr = [];
        $studentInfo = [];
        $StudentApplicationStatusResults = [];
        if ($application) {

            $getData = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->get();
            $StudentPaymentStatus = Payment::where('Application_ID', $application->Application_ID)->get();
            foreach ($StudentPaymentStatus as $key => $StudentApplicationStatusResult) {
                $StudentApplicationStatusResults[$key]['studentType'] = $StudentApplicationStatusResult['student'];
                $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
            }
            if (count($StudentPaymentStatus) > 0) {
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
                            if ($result['studentType'] == Application::STUDENT_S1) {
                                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                            } elseif ($result['studentType'] == Application::STUDENT_S2) {
                                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                            } elseif ($result['studentType'] == Application::STUDENT_S3) {
                                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
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
    }

    private function getCandidateAccepted($getStudentInfo, $StudentApplicationStatus, $applicationType)
    {
        $studentArr = [];
        $StudentApplicationStatusResults = [];
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }




        $student1 = [
            "Application_ID" => $getStudentInfo['Application_ID'],
            "First_Name" => Str::lower($getStudentInfo['S1_First_Name']),
            "student_type" => Application::STUDENT_ONE
        ];
        $student2 = [
            "Application_ID" => $getStudentInfo['Application_ID'],
            "First_Name" => Str::lower($getStudentInfo['S2_First_Name']),
            "student_type" => Application::STUDENT_TWO

        ];
        $student3 = [
            "Application_ID" => $getStudentInfo['Application_ID'],
            "First_Name" => Str::lower($getStudentInfo['S3_First_Name']),
            "student_type" => Application::STUDENT_THREE

        ];
        foreach ($StudentApplicationStatusResults as $result) {
            if ($getStudentInfo['Application_ID'] == $result['application_id']) {
                if ($result['s1_application_status'] == $applicationType) {
                    $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
                } else {

                    $studentArr[] = $student1 = null;
                }
                if ($result['s2_application_status'] == $applicationType) {
                    $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
                } else {

                    $studentArr[] = $student2 = null;
                }
                if ($result['s3_application_status'] == $applicationType) {
                    $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;
                } else {


                    $studentArr[] = $student3 = null;
                }
            }
        }



        return $myCollectionObj = array_filter($studentArr);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
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
    public function admissionApplication($step = GlobalStudentTransfer::STEP_ONE)
    {


        if (Auth::guard('customer')->check()) {

            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->where('status', 0)->first();
            $studentTransfer = $this->GlobalStudentTransfer;

            if ($application) {

                if ($step == GlobalStudentTransfer::STEP_ONE) {
                    $getStudentInfo = null;
                    if (!is_null($application)) {
                        $getStudentInfo = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-one', compact('getStudentInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_TWO) {
                    $getAddressInfo = null;
                    if (!is_null($application)) {

                        $getAddressInfo = AddressInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-two', compact('getAddressInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_THREE) {
                    $getParentInfo = null;
                    if (!is_null($application)) {
                        $getParentInfo = ParentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-three', compact('getParentInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_FOUR) {
                    $getSiblingInfo = null;
                    if (!is_null($application)) {
                        $getSiblingInfo = SiblingInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-four', compact('getSiblingInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_FIVE) {
                    $getLegacyInfo = null;
                    if (!is_null($application)) {
                        $getLegacyInfo = LegacyInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-five', compact('getLegacyInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_SIX) {
                    $getParentStatement = null;
                    if (!is_null($application)) {
                        $getParentStatement = ParentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-six', ['getParentStatement' => $getParentStatement]);
                } elseif ($step == GlobalStudentTransfer::STEP_SEVEN) {
                    $getSpiritualCommunityInfo = null;
                    if (!is_null($application)) {
                        $getSpiritualCommunityInfo = SpiritualAndCommunityInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-seven', compact('getSpiritualCommunityInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_EIGHT) {
                    $getStudentStatementInfo = null;
                    if (!is_null($application)) {
                        $getStudentStatementInfo = StudentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-eight', compact('getStudentStatementInfo'));
                } elseif ($step == GlobalStudentTransfer::STEP_NINE) {
                    $getWritingSample = null;
                    if (!is_null($application)) {
                        $getWritingSample = WritingSample::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    return view('frontend.application.application-nine', compact('getWritingSample'));
                } elseif ($step == GlobalStudentTransfer::STEP_TEN) {
                    $getReleaseAuthorization = null;
                    if (!is_null($application)) {
                        $getReleaseAuthorization = ReleaseAuthorization::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }

                    return view('frontend.application.application-ten', compact('getReleaseAuthorization', 'studentTransfer'));
                }
            } else {
                $getStudentInfo = null;
                return view('frontend.application.application-one', compact('getStudentInfo'));
            }
        } else {
            abort(400, 'You are not authorize');
        }
    }

    public function appForm($application_id = null)
    {

        return view('frontend.application.view-application', compact('application_id'));
    }

    // public function listViewApplication($application_id = null)
    // {
    //     $payment = Payment::where('application_id', Auth::user()->id)->get();
    //     if ($payment->count() > Payment::COUNT) {
    //         return view('frontend.view_application', compact('payment', 'application_id'));
    //     } else {
    //         return view('frontend.application.view-application', compact('application_id'));
    //     }
    // }

    public function viewApplication($application_id = null)
    {
        //todo: Do setup on livewire
        //return response()->json("We are working on this", 200);
            // $payment = Payment::where('application_id', Auth::user()->id)->get();
            // if ($payment->count() > Payment::COUNT) {
            //     return view('frontend.view_application', compact('payment', 'application_id'));
            // } else {
            //     return view('frontend.application.view-application', compact('application_id'));
            // }
        return view('frontend.application.view-application', compact('application_id'));
    }

    public function supplementalRecommendation()
    {
        if (Auth::guard('customer')->check()) {
            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->where('status', 1)->first();
            if ($application) {
                $recommendationStudent = Recommendation::where('Profile_ID', $profile_id)->select('Rec_Student')->get()->toArray();
                $getAllStudent = [];
                $getStudent = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->first()->toArray();
                $arr1 = [
                    "Rec_Student" => $getStudent['S1_First_Name'] . " " . $getStudent['S1_Last_Name'],
                ];
                $arr2 = [
                    "Rec_Student" => $getStudent['S2_First_Name'] . " " . $getStudent['S2_Last_Name'],
                ];

                $arr3 = [
                    "Rec_Student" => $getStudent['S3_First_Name'] . " " . $getStudent['S3_Last_Name'],
                ];

                $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
                foreach ($studentArr as $key => $student) {
                    // if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                    //     array_push($getAllStudent, $student);
                    // }
                    if (!is_null($student)) {
                        array_push($getAllStudent, $student);
                    }
                }
                //check all the student recommendation send or not
                $getStudent = [];
                foreach ($studentArr as $key => $student) {
                    if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                        array_push($getStudent, $student);
                    }
                }
                if (count($getStudent) == 0) {
                    return redirect('/')->with('info', 'Recommendation requests have been sent.');
                }

                return view('frontend.recommend.recommend', compact('getAllStudent', 'recommendationStudent'));
            } else {
                return redirect('/')->with('error', 'You must submit an application before you can submit a supplemental recommendation. The supplemental recommendation is not due until December 15th.');
            }
        } else {
            abort(400, 'You are not authrize');
        }
    }
    public function submitSupplemental(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                'student' => 'required',
                'message' => ['required', 'max:1000', new MaxWordsRule(75)],
            ]
        );
        DB::beginTransaction();
        try {

            $getRecommendation = Recommendation::create([
                'Profile_ID' => Auth::id(),
                'Rec_Name' => $request->name,
                'Rec_Email' => $request->email,
                'Rec_Student' => $request->student,
                'Rec_Message' => $request->message,
                'Rec_Request_Send_Date' => date('Y-m-d'),
            ]);
            //$recommendation = Recommendation::where('Rec_Student', $request->student)->first();
            $getUserName = Auth::guard('customer')->user()->full_name;
            $mailSubject = 'Recommendation Request from ' . $getUserName;

            $data = [
                "recommendation_id" => $getRecommendation->id,
                'name' => $request->name,
                'email' => $request->email,
                'student' => $request->student,
                'message' => $request->message,
                'mailSubject' => $mailSubject,
                'user_full_name' => $getUserName
            ];

            //send to mail code here
            Mail::to($data['email'])->send(new RecommendationMail($data));
            // check for failures
            if (Mail::failures()) {
                return back()->with('error', 'An unknown error has occurred.  Please try again later.');
            } else {
                DB::commit();
                return redirect('/')->with('success', 'Your request has been sent.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error', 'An unknown error has occurred.  Please try again later.');
        }
    }

    public function writtenRecommendation($id)
    {
        $recommendation_id = decrypt($id);
        $getRecommendation = Recommendation::where('id', $recommendation_id)->first();
        if ($getRecommendation) {
            $getData = Recommendation::where('id', $recommendation_id)->where('Status', 1)->first();
            if ($getData) {
                return view('frontend.recommend.write-view', compact('getRecommendation'));
            } else {
                return view('frontend.recommend.write', compact('getRecommendation'));
            }
        } else {
            abort(400, 'You are not authorize');
        }
    }
    public function submitWritten(Request $request)
    {
        $request->validate(
            [
                'relationStudent' => 'required',
                'yearStudent' => 'required',
                'recommen' => ['required', 'max:1000', new MaxWordsRule(150)],
            ]
        );
        $profile = Recommendation::where('id', $request->id)->where('Status', 0)->first();
        if ($profile) {
            $profile->update([
                'Rec_Relationship_to_Student' => $request->relationStudent,
                'Rec_Years_Known_Student' => $request->yearStudent,
                'Rec_Recommendation' => $request->recommen,
                'Status' => 1,
                'Rec_Send_Date' => date('Y-m-d')
            ]);
            $msg = 'Thank you for submitting a recommendation for ' . $profile->Rec_Student;

            return redirect()->route('thank-you')->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'You have already submitted a recommendation.');
        }
    }

    public function thankYou()
    {
        return view('frontend.thankyou');
    }

    public function thankYou2()
    {
        return view('frontend.thankyou2');
    }
    public function registerationApplication($step)
    {

        $profile_id = Auth::guard('customer')->user()->id;
        $registeration = Registeration::where('Profile_ID', $profile_id)->where('status', 0)->first();

        if ($step == GlobalStudentTransfer::STEP_ONE) {
            $student_info = StudentInformation::where('Profile_id', $profile_id)->first();

            $registeration_student_info = StudentRegisteration::where('Profile_ID', $profile_id)->where('id', $registeration->id)->first();
            return view('frontend.registeration.registeration-one', compact('registeration_student_info', 'student_info'));
        } elseif ($step == GlobalStudentTransfer::STEP_TWO) {


            $registeration = Registeration::where('last_step_complete', 'one')->latest('id')->first();
            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {
                $reg_id = $registeration->id;

                return view('frontend.registeration.registeration-two', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_THREE) {
            $registeration = Registeration::where('last_step_complete', 'two')->latest('id')->first();
            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;
                return view('frontend.registeration.registeration-three', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_FOUR) {

            $registeration = Registeration::where('last_step_complete', 'three')->latest('id')->first();

            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;
                return view('frontend.registeration.registeration-four', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_FIVE) {

            $registeration = Registeration::where('last_step_complete', 'four')->latest('id')->first();

            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;
                return view('frontend.registeration.registeration-five', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_SIX) {

            $registeration = Registeration::where('last_step_complete', 'five')->latest('id')->first();
            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;


                return view('frontend.registeration.registeration-six', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_SEVEN) {

            $registeration = Registeration::where('last_step_complete', 'six')->latest('id')->first();

            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;


                return view('frontend.registeration.registeration-seven', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_FINAL) {
            $registeration = Registeration::where('last_step_complete', 'five')->latest('id')->first();
            if ($registeration == null) {
                return redirect()->back()->with('error', 'Please fill the all steps');
            } else {

                $reg_id = $registeration->id;


                return view('frontend.registeration.registeration-six', compact('reg_id'));
            }
        } elseif ($step == GlobalStudentTransfer::STEP_SEVEN) {

            return redirect('/')->with('success', 'You successfully fill the six steps of form');
        }
    }
}
