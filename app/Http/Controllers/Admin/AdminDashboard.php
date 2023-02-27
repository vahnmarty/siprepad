<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Profile;
use App\Models\StudentInformation;
use App\Models\StudentApplicationStatus;
use App\Models\Notification;
use App\Models\Payment;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminDashboard extends Controller
{
    public function getDashboard()
    {



        if (Auth::check()) {


            $count['userCount'] = Profile::count();
            $count['applicationAcceptedCount'] = Application::where('candidate_status', 1)->count();
            $apps = Application::get()->toArray();
            $status = [];
            foreach ($apps as $key => $result) {
                $status[$key] = $result['status'];
            }
            $count_status = array_count_values($status);
            // Total Applications
            $count['applicationCount'] = self::getTotalApplications();

            // Incomplete Applications
            if (array_key_exists(0, $count_status)) {
                $count['applicationIncompleteCount'] = self::getIncompleteApplicationForm();
            } else {
                $count['applicationIncompleteCount'] = 0;
            }
            $count['applicationsAccepted'] = self::getAppliactionAccepted();

            $count['applicationCompleteCount'] = self::submittedApplications();


            $getData = StudentInformation::join('applications', 'applications.Application_ID', 'student_information.Application_ID')
                ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
                ->get();
            if (count($getData) > 0) {
                foreach ($getData as $key => $getStudentInfo) {
                    $studentInfo = [];

                    $student1 = [
                        "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                    ];

                    $student2 = [
                        "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                    ];
                    $student3 = [
                        "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                    ];

                    $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
                    $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
                    $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;

                    foreach ($studentArr as $student) {
                        if (!is_null($student)) {
                            array_push($studentInfo, $student);
                        }
                    }
                }
            } else {
                $studentInfo = [];
            }







            $count['studentCount'] = self::getIncompleteRegistration();
            if (array_key_exists(2, $count_status)) {
                $count['applicationRejectedCount'] = $count_status[2];
            } else {
                $count['applicationRejectedCount'] = 0;
            }
            if (array_key_exists(3, $count_status)) {
                $count['applicationReadCount'] = $count_status[3];
            } else {
                $count['applicationReadCount'] = 0;
            }
            $getStudentApplicationStatus = StudentApplicationStatus::get()->toArray();
            $candidateStatuss['TotalNotifications'] = Notification::count();
            $candidateStatus = array();
            $candidate_status = array();
            foreach ($getStudentApplicationStatus as $key => $value) {
                $candidateStatus[$key]['s1_application_status'] = $value['s1_application_status'];
                $candidateStatus[$key]['s2_application_status'] =  $value['s2_application_status'];
                $candidateStatus[$key]['s3_application_status'] = $value['s3_application_status'];
            }

            foreach ($getStudentApplicationStatus as $key => $values) {
                $candidate_status[$key]['s1_candidate_status'] = $values['s1_candidate_status'];
                $candidate_status[$key]['s2_candidate_status'] = $values['s2_candidate_status'];
                $candidate_status[$key]['s3_candidate_status'] = $values['s3_candidate_status'];
            }
            // dd($candidate_status);
            $candidateStatusValuees = array();
            $studentCountValues = $this->array_count_values($candidateStatus);
            $candidate_statuss = $this->array_count_values($candidate_status);

            if (array_key_exists(1, $candidate_statuss)) {
                $candidateStatuss['candidateStatusAccept'] = $candidate_statuss[1];
            } else {
                $candidateStatuss['candidateStatusAccept'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            if (array_key_exists(2, $candidate_statuss)) {
                $candidateStatuss['candidateStatusReject'] = $candidate_statuss[2];
            } else {
                $candidateStatuss['candidateStatusReject'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }

            if (array_key_exists(0, $studentCountValues)) {
                $candidateStatuss['candidateStatusNoDef'] = $studentCountValues[0];
            } else {
                $candidateStatuss['candidateStatusNoDef'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            if (array_key_exists(1, $studentCountValues)) {
                $candidateStatuss['applicationCompleteCount'] = $studentCountValues[1];
            } else {
                $candidateStatuss['applicationCompleteCount'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            if (array_key_exists(2, $studentCountValues)) {
                $candidateStatuss['candidateStatusWaitListed'] = $studentCountValues[2];
            } else {
                $candidateStatuss['candidateStatusWaitListed'] = 0;
            }
            // dd($studentCountValues);
            if (array_key_exists(3, $studentCountValues)) {
                $candidateStatuss['candidateStatusRejected'] = $studentCountValues[3];
            } else {
                $candidateStatuss['candidateStatusRejected'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }

            if (array_key_exists(4, $studentCountValues)) {
                $candidateStatuss['candidateStatusNoResponse'] = $studentCountValues[4];
            } else {
                $candidateStatuss['candidateStatusNoResponse'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            $notification = Notification::select("is_read")->get()->toArray();
            $notificationReadOrNot = [];
            foreach ($notification as $fetchNotification) {
                $notificationReadOrNot[] = $fetchNotification['is_read'];
            }
            $notificationValue =    array_count_values($notificationReadOrNot);


            // dd($candidateStatuss);
            if (array_key_exists(0, $notificationValue)) {
                $dbQuery = StudentInformation::query();
                $getData = $dbQuery
                    ->join('applications', function ($join) {
                        $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                    })
                    ->get();
                $StudentApplicationStatus = StudentApplicationStatus::get();


                if (count($StudentApplicationStatus) > 0) {
                    $candidateStatuss['notificationNotRead'] =  self::getNotRead($getData, $StudentApplicationStatus, 0, '');
                    //$candidateStatuss['notificationRead'] = self::getRead($getData, $StudentApplicationStatus, 0, '!');
                } else {
                    $candidateStatuss['notificationNotRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
                }
            } else {
                $candidateStatuss['notificationNotRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
                //$candidateStatuss['notificationRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }

            if (array_key_exists(1, $notificationValue)) {
                $dbQuery = StudentInformation::query();
                $getData = $dbQuery
                    ->join('applications', function ($join) {
                        $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                    })
                    ->get();
                $StudentApplicationStatus = StudentApplicationStatus::get();


                if (count($StudentApplicationStatus) > 0) {
                    $candidateStatuss['notificationRead'] = self::getRead($getData, $StudentApplicationStatus, 0, '!');
                } else {
                    $candidateStatuss['notificationRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
                }
            } else {
                $candidateStatuss['notificationRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }









            $payment = Payment::count();
            $candidateStatuss['payment'] = $payment;

            return view('admin.dashboard', compact('count', 'candidateStatuss'));
        } else {
            return view('auth.admin-login');
        }
    }
    private function getIncompleteApplicationForm()
    {
        $studentArr = [];
        $dbQuery = StudentInformation::query();
        $studentDetail = $dbQuery
            ->join('applications', function ($join) {
                $join->on('applications.Application_ID', '=', 'student_information.Application_ID')
                    ->where('applications.status', '=', StudentApplicationStatus::CANDIDATE_NOT_DEFINED);
            })
            ->get();
        if (count($studentDetail) > 0) {
            foreach ($studentDetail as $key => $getStudentInfo) {
                $studentInfo = [];

                $student1 = [
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                ];

                $student2 = [
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name)
                ];
                $student3 = [
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name)
                ];

                $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
                $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
                $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;

                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }
        return (count(array_filter($studentArr)));
    }
    private function getIncompleteRegistration()
    {
        $studentArr = [];
        $getData = StudentInformation::join('applications', 'applications.Application_ID', 'student_information.Application_ID')
            ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
            ->where('applications.last_step_complete', 'ten')
            ->get();
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $studentInfo = [];

                $student1 = [
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                ];

                $student2 = [
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name)
                ];
                $student3 = [
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name)
                ];

                $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
                $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
                $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;

                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }
        return (count(array_filter($studentArr)));
    }

    private function getTotalApplications()
    {
        $studentArr = [];
        $getData = StudentInformation::join('applications', 'applications.Application_ID', 'student_information.Application_ID')
            ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
            ->get();
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $studentInfo = [];

                $student1 = [
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name)
                ];

                $student2 = [
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name)
                ];
                $student3 = [
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name)
                ];

                $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
                $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
                $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;

                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }
        return (count(array_filter($studentArr)));
    }
    private function getNotRead($getData, $StudentApplicationStatus, $applicationType, $notNullOrNull)
    {

        $studentArr = [];

        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S1_Last_Name),
                    "Suffix" =>  $getStudentInfo->S1_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S1_Birthdate,
                    "Gender" =>  $getStudentInfo->S1_Gender,
                    "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                    "Race" => $getStudentInfo->S1_Race,
                    "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S1_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_ONE
                ];
                $student2 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S2_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),
                    "Suffix" =>  $getStudentInfo->S2_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S2_Birthdate,
                    "Gender" =>  $getStudentInfo->S2_Gender,
                    "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S2_Race,
                    "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S2_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_TWO

                ];
                $student3 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S3_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),
                    "Suffix" =>  $getStudentInfo->S3_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S3_Birthdate,
                    "Gender" =>  $getStudentInfo->S3_Gender,
                    "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S3_Race,
                    "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S3_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_THREE

                ];
                $studentInfo = [];
                foreach ($StudentApplicationStatusResults as $result) {

                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($notNullOrNull == "!") {
                            if (!$result['s1_application_status'] == $applicationType) {
                                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if (!$result['s2_application_status'] == $applicationType) {
                                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if (!$result['s3_application_status'] == $applicationType) {
                                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                            } else {



                                $studentArr[] = $student3 = null;
                            }
                        } else {


                            if ($result['s1_application_status'] == $applicationType) {

                                $notificationOne = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_one')->get();
                                if (count($notificationOne) > 0) {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                } else {
                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if ($result['s2_application_status'] == $applicationType) {
                                $notificationTwo = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_two')->get();
                                if (count($notificationTwo) > 0) {

                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                } else {

                                    $studentArr[] = $student2 = null;
                                }
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if ($result['s3_application_status'] == $applicationType) {
                                $notificationThree = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_three')->get();
                                if (count($notificationThree) > 0) {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                } else {
                                    $studentArr[] = $student3 = null;
                                }
                            } else {
                                $studentArr[] = $student3 = null;
                            }
                        }
                    }
                }


                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }
        return count(array_filter($studentInfo));
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }

    private function getRead($getData, $StudentApplicationStatus, $applicationType, $notNullOrNull)
    {
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
        $studentArr = [];
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S1_Last_Name),
                    "Suffix" =>  $getStudentInfo->S1_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S1_Birthdate,
                    "Gender" =>  $getStudentInfo->S1_Gender,
                    "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                    "Race" => $getStudentInfo->S1_Race,
                    "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S1_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_ONE
                ];
                $student2 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S2_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),
                    "Suffix" =>  $getStudentInfo->S2_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S2_Birthdate,
                    "Gender" =>  $getStudentInfo->S2_Gender,
                    "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S2_Race,
                    "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S2_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_TWO

                ];
                $student3 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S3_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),
                    "Suffix" =>  $getStudentInfo->S3_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S3_Birthdate,
                    "Gender" =>  $getStudentInfo->S3_Gender,
                    "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S3_Race,
                    "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S3_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_THREE

                ];
                $studentInfo = [];

                foreach ($StudentApplicationStatusResults as $result) {

                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($notNullOrNull == "!") {
                            if (!$result['s1_application_status'] == $applicationType) {
                                $notificationOne = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_one')->get()->where('is_read', '=', 1)->toArray();
                                if (count($notificationOne) > 0) {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if (!$result['s2_application_status'] == $applicationType) {
                                $notificationTwo = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_two')->where('is_read', '=', 1)->get();
                                if (count($notificationTwo) > 0) {
                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if (!$result['s3_application_status'] == $applicationType) {
                                $notificationThree = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_three')->where('is_read', '=', 1)->get();
                                if (count($notificationThree) > 0) {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {



                                $studentArr[] = $student3 = null;
                            }
                        } else {


                            if ($result['s1_application_status'] == $applicationType) {

                                $notificationOne = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_one')->get();
                                if (count($notificationOne) > 0) {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                } else {
                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if ($result['s2_application_status'] == $applicationType) {
                                $notificationTwo = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_two')->get();
                                if (count($notificationTwo) > 0) {

                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                } else {

                                    $studentArr[] = $student2 = null;
                                }
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if ($result['s3_application_status'] == $applicationType) {
                                $notificationThree = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_three')->get();
                                if (count($notificationThree) > 0) {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                } else {
                                    $studentArr[] = $student3 = null;
                                }
                            } else {
                                $studentArr[] = $student3 = null;
                            }
                        }
                    }
                }

                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }

        return count(array_filter($studentInfo));

        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }


    private function getAppliactionAccepted()
    {

        $dbQuery = StudentInformation::query();
        $getData = $dbQuery
            ->join('applications', function ($join) {
                $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
            })
            ->get();
        $StudentApplicationStatus = StudentApplicationStatus::get();
        if (count($StudentApplicationStatus) > 0) {
            $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 1);

            return (count($data));
        } else {
            return  StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
        }
    }

    private function getApplicationsAccepted($getData, $StudentApplicationStatus, $applicationType)
    {
        $studentArr = [];
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_application_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_application_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_application_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S1_Last_Name),
                    "Suffix" =>  $getStudentInfo->S1_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S1_Birthdate,
                    "Gender" =>  $getStudentInfo->S1_Gender,
                    "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                    "Race" => $getStudentInfo->S1_Race,
                    "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S1_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_ONE
                ];
                $student2 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S2_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),
                    "Suffix" =>  $getStudentInfo->S2_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S2_Birthdate,
                    "Gender" =>  $getStudentInfo->S2_Gender,
                    "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S2_Race,
                    "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S2_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_TWO

                ];
                $student3 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S3_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),
                    "Suffix" =>  $getStudentInfo->S3_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S3_Birthdate,
                    "Gender" =>  $getStudentInfo->S3_Gender,
                    "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S3_Race,
                    "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S3_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_THREE

                ];
                foreach ($StudentApplicationStatusResults as $result) {
                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($result['s1_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s2_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s3_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                            $studentArr[] = $student2 = null;
                            $studentArr[] = $student3 = null;
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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }

    private function submittedApplications()
    {
        $dbQuery = StudentInformation::query();
        $getData = $dbQuery->join('applications', 'applications.Application_ID', 'student_information.Application_ID')
            ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
            ->orderBy('Application_ID', 'desc')
            ->get();
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S1_Last_Name),
                    "Suffix" =>  $getStudentInfo->S1_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S1_Birthdate,
                    "Gender" =>  $getStudentInfo->S1_Gender,
                    "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                    "Race" => $getStudentInfo->S1_Race,
                    "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S1_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_ONE
                ];
                $student2 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S2_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),
                    "Suffix" =>  $getStudentInfo->S2_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S2_Birthdate,
                    "Gender" =>  $getStudentInfo->S2_Gender,
                    "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S2_Race,
                    "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S2_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_TWO

                ];
                $student3 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S3_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),
                    "Suffix" =>  $getStudentInfo->S3_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S3_Birthdate,
                    "Gender" =>  $getStudentInfo->S3_Gender,
                    "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S3_Race,
                    "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S3_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type" => Application::STUDENT_THREE

                ];
                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
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


        return count($studentInfo);
    }



    function array_count_values($arr, $lower = true)
    {

        $arr2 = array();
        if (!empty($arr)) {
            if (!is_array($arr['0'])) {
                $arr = array($arr);
            }
        }

        foreach ($arr as $k => $v) {

            foreach ($v as $v2) {

                if ($lower == true) {
                    $v2 = strtolower($v2);
                }

                if (!isset($arr2[$v2])) {

                    $arr2[$v2] = 1;
                } else {

                    $arr2[$v2]++;
                }
            }
        }

        return $arr2;
    }
    public function userCreateShow()
    {
        return view('admin.user-create');
    }
}
