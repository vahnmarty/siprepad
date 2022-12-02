<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentInformation;
use App\Models\Notification;

class StatusPdfController extends Controller
{
    public function index(Request $request, $ntid, $uid) {
        
        $notificationID = $ntid;
        $notMessage = Notification::where('id',$notificationID)->first();
        $studentDetail = StudentInformation::where('Profile_ID',$uid)->first();
        
        $html = '
            <h1>St. Ignatius College Preparatory</h1>
            <p>Dear '.$studentDetail->S1_First_Name.' '.$studentDetail->S1_Last_Name.',</p>
            <p>'.$notMessage->message.'</p>
        ';
        $mpdf = new \Mpdf\Mpdf();
        
        $mpdf->SetTitle("Application Status");
        
        $mpdf->WriteHTML($html);
        
        $mpdf->Output();
    }
}
