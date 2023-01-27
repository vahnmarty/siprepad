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
            $count['applicationCount'] = count($apps);

            // Incomplete Applications
            if (array_key_exists(0, $count_status)) {
                $count['applicationIncompleteCount'] = $count_status[0];
            } else {
                $count['applicationIncompleteCount'] = 0;
            }

            // Submitted Applications
            if (array_key_exists(1, $count_status)) {
                $count['applicationCompleteCount'] = $count_status[1];
            } else {
                $count['applicationCompleteCount'] = 0;
            }

            // Total Students
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
            $count['studentCount'] = count($studentInfo);
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
            $candidateStatusValuees = array();
            $studentCountValues = $this->array_count_values($candidateStatus);
            $candidate_statuss = $this->array_count_values($candidate_status);
            // dd($studentCountValues);

            // if (array_key_exists(2, $candidate_status)) {
            //     $candidateStatuss['candidateStatusRejected'] = $candidate_status[2];
            // } else {
            //     $candidateStatuss['candidateStatusRejected'] = 0;
            // }
            if (array_key_exists(1, $candidate_statuss)) {
                $candidateStatuss['candidateStatusAccept'] = $candidate_statuss[1];
            } else {
                $candidateStatuss['candidateStatusAccept'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            if (array_key_exists(3, $candidate_statuss)) {
                $candidateStatuss['candidateStatusReject'] = $candidate_statuss[3];
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
            // NOTIFICATIONS STATUS SUMMARY SECTION
            $notification = Notification::select("is_read")->get()->toArray();
            $notificationReadOrNot = [];
            foreach ($notification as $fetchNotification) {
                $notificationReadOrNot[] = $fetchNotification['is_read'];
            }
            $notificationValue =    array_count_values($notificationReadOrNot);

            if (array_key_exists(1, $notificationValue)) {
                $candidateStatuss['notificationRead'] = $notificationValue[1];
            } else {
                $candidateStatuss['notificationRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            if (array_key_exists(0, $notificationValue)) {
                $dbQuery = StudentInformation::query();
                $getData = $dbQuery
                    ->join('applications', function ($join) {
                        $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                    })
                    ->get();
                $StudentApplicationStatus = StudentApplicationStatus::get();


                
                if (count($StudentApplicationStatus) > 0) {
                    $candidateStatuss['notificationNotRead'] =  self::getReadOrNotRead($getData, $StudentApplicationStatus, 0, '');
                } else {
                    $candidateStatuss['notificationNotRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
                }
            } else {
                $candidateStatuss['notificationNotRead'] = StudentApplicationStatus::CANDIDATE_NOT_DEFINED;
            }
            $payment = Payment::count();
            $candidateStatuss['payment'] = $payment;

            return view('admin.dashboard', compact('count', 'candidateStatuss'));
        } else {
            return view('auth.admin-login');
        }
    }


    private function getReadOrNotRead($getData, $StudentApplicationStatus, $applicationType, $notNullOrNull)
    {
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                ];
                $student2 = [
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                ];
                $student3 = [
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                ];
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
                                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if ($result['s2_application_status'] == $applicationType) {
                                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if ($result['s3_application_status'] == $applicationType) {
                                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                            } else {


                                $studentArr[] = $student3 = null;
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

        return count(array_filter($studentInfo));
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
