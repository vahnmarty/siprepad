<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentInformation;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\StudentApplicationStatus;


class StatusPdfController extends Controller
{
    public function index(Request $request, $ntid, $uid)
    {
        $studentType = '';
        $notificationID = $ntid;
        $notMessage = Notification::where('id', $notificationID)->first();
        $studentDetail = StudentInformation::where('Profile_ID', $uid)->first();

        if ($studentDetail) {
            if ($notMessage) {
                if ($notMessage->student_profile == Application::STUDENT_ONE) {
                    $studentType = 's1';
                } else if ($notMessage->student_profile == Application::STUDENT_TWO) {
                    $studentType = 's2';
                } else if ($notMessage->student_profile == Application::STUDENT_THREE) {
                    $studentType = 's3';
                }
            }
   
            $checkPayment = Payment::where('Application_ID', $studentDetail->Application_ID)->where('student', $studentType)->select('student')->first();

            if ($checkPayment) {
                $html = '
            <h1>St. Ignatius College Preparatory</h1>
            <p>Dear ' . $studentDetail->S1_First_Name . ' ' . $studentDetail->S1_Last_Name . ',</p>
            <p>' . $notMessage->message . '</p>
            <p>Your payment is received successfully</p>
        ';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } else {
                $html = '
            <h1>St. Ignatius College Preparatory</h1>
            <p>Dear ' . $studentDetail->S1_First_Name . ' ' . $studentDetail->S1_Last_Name . ',</p>
            <p>' . $notMessage->message . '</p>
        ';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            }
        }
    }
}
