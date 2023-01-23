<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Profile;
use App\Models\StudentInformation;
use App\Models\StudentApplicationStatus;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminDashboard extends Controller
{
    public function getDashboard()
    {
        if (Auth::check()) {

            $count['userCount'] = Profile::count();
            // $count['applicationIncompleteCount'] = Application::where('status', 0)->count();
            // $count['applicationCompleteCount'] = Application::where('status', 1)->count();
            $count['applicationAcceptedCount'] = Application::where('candidate_status', 1)->count();
            // $count['applicationRejectedCount'] = Application::where('candidate_status', 2)->count();
            // $count['applicationNotReadCount'] = Application::where('candidate_status', 0)->count();
            // $count['applicationReadCount'] = Application::where('candidate_status', 3)->count();
            // $count['applicationCount'] = Application::count();

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
                //->where('applications.status', 1)notification_array
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
            // dd($getStudentApplicationStatus);

            $candidateStatus = [];
            $candidateStatusRejected = [];
            $candidateStatusAccepeted = [];
            $candidateStatusWaitListed = [];
            $candidateStatusNoResponse = [];
            $candidateStatusNoDef = [];
            $candidateStatusValue = [];

            if ($getStudentApplicationStatus) {
                foreach ($getStudentApplicationStatus as $key => $value) {
                    $candidateStatus[$key]['s1_candidate_status'] = $value['s1_candidate_status'];
                    $candidateStatus[$key]['s2_candidate_status'] =  $value['s2_candidate_status'];
                    $candidateStatus[$key]['s3_candidate_status'] = $value['s3_candidate_status'];
                }

                foreach ($candidateStatus as $key => $candidateStatusValuee) {
                    $candidateStatusValue[$key] =$candidateStatusValuee['s1_candidate_status'];
                    $candidateStatusValue[$key] =$candidateStatusValuee['s2_candidate_status'];
                    $candidateStatusValue[$key] =$candidateStatusValuee['s3_candidate_status'];
                    
                
                }
                // dd($candidateStatusValue);
            }


//             if (array_key_exists(0, $candidateStatusValue)) {
//                 $candidateStatuss['candidateStatusNoDef'] = $candidateStatusValue[0];
//             } 
//             if (array_key_exists(1, $candidateStatusValue)) {
//                 $candidateStatuss['applicationCompleteCount'] = $candidateStatusValue[1];
//             } 
//             if (array_key_exists(2, $candidateStatusValue)) {
//                 $candidateStatuss['candidateStatusWaitListed'] = $candidateStatusValue[2];
//             } 
//             if (array_key_exists(3, $candidateStatusValue)) {
//                 $candidateStatuss['candidateStatusRejected'] = $candidateStatusValue[3];
//             } 
//             if (array_key_exists(4, $candidateStatusValue)) {
//                 $candidateStatuss['candidateStatusNoResponse'] = $candidateStatusValue[4];
//             } 
// dd($candidateStatus);
            return view('admin.dashboard', compact('count'));
        } else {
            return view('auth.admin-login');
        }
    }

    public function userCreateShow()
    {
        return view('admin.user-create');
    }
}
