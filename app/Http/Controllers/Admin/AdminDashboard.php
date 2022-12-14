<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Profile;
use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminDashboard extends Controller
{
    public function getDashboard()
    {
        if (Auth::check()) {

            $count['userCount'] = Profile::count();
            $count['applicationIncompleteCount'] = Application::where('status', 0)->count();
            $count['applicationCompleteCount'] = Application::where('status', 1)->count();
            $count['applicationAcceptedCount'] = Application::where('candidate_status', 1)->count();
            $count['applicationRejectedCount'] = Application::where('candidate_status', 2)->count();
            $count['applicationNotReadCount'] = Application::where('candidate_status', 0)->count();
            $count['applicationReadCount'] = Application::where('candidate_status', 3)->count();
            $count['applicationCount'] = Application::count();
            $getData = StudentInformation::join('applications', 'applications.Application_ID', 'student_information.Application_ID')
                ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
                //->where('applications.status', 1)
                //->where('applications.last_step_complete', 'ten')
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
