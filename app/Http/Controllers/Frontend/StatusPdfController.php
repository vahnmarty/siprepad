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
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class StatusPdfController extends Controller
{
    public function index(Request $request, $ntid, $uid, $application_ID)
    {

        $studentType = '';
        $notificationID = $ntid;
        $notMessage = Notification::where('id', $notificationID)->first();
        if (!$notMessage) {
            return redirect('/')->with('error', 'You are not allowed to access this page');
        }
        // $studentDetail = StudentInformation::where('Profile_ID', $uid)->first();
        $studentDetail = StudentInformation::leftjoin('parent_information', 'student_information.Profile_ID', '=', 'parent_information.Profile_ID')
            ->where('parent_information.Application_ID', $application_ID)
            ->leftjoin('address_information', 'student_information.Profile_ID', '=', 'address_information.Profile_ID')->where('student_information.Application_ID', $application_ID)
            ->latest('address_information.ID')->first();
        if ($studentDetail) {
            if ($notMessage) {
                if ($notMessage->student_profile == Application::STUDENT_ONE) {
                    $studentType = Application::STUDENT_S1;
                    $StudentApplicationStatus =  StudentApplicationStatus::where('Profile_ID', $uid)->select('s1_application_status')->first();
                    if ($StudentApplicationStatus) {
                        $getStudentApplicationStatus = $StudentApplicationStatus->s1_application_status;
                    } else {
                        $getStudentApplicationStatus = '';
                    }
                } else if ($notMessage->student_profile == Application::STUDENT_TWO) {
                    $studentType = Application::STUDENT_S2;
                    $StudentApplicationStatus =  StudentApplicationStatus::where('Profile_ID', $uid)->select('s2_application_status')->first();
                    if ($StudentApplicationStatus) {
                        $getStudentApplicationStatus = $StudentApplicationStatus->s2_application_status;
                    } else {
                        $getStudentApplicationStatus = '';
                    }
                } else if ($notMessage->student_profile == Application::STUDENT_THREE) {
                    $studentType = Application::STUDENT_S3;
                    $StudentApplicationStatus =  StudentApplicationStatus::where('Profile_ID', $uid)->select('s3_application_status')->first();
                    if ($StudentApplicationStatus) {
                        $getStudentApplicationStatus = $StudentApplicationStatus->s3_application_status;
                    } else {
                        $getStudentApplicationStatus = '';
                    }
                }
            }

            if ($getStudentApplicationStatus == Application::TYPE_ACCEPTED) {
                $html = '<table width="100%" style="font-family: sans-serif;" cellpadding="10">
                <tr>
                    <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                                width="100" height="110" alt="Logo" align="center" border="0"></a></td>
            
                    <td width="100%" style="border: 0 solid #eee; text-align: left;">St. Ignatius College Preparatory<br> 2001
                        37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                        <br> <br>Office of Admissions
                    </td>
                </tr>
            </table>
            
            <table width="100%" style="font-family: sans-serif; font-size: 11px;">
                <tr>
                    <td>
                        <table width="60%" align="left" style="font-family: sans-serif; font-size: 11px;">
                            <tr>
                                <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                            </tr>
                        </table>
                        <table width="40%" align="right" style="font-family: sans-serif; font-size: 11px;">
                            <tr>
                                <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            
            <table class="items" width="100%" style="font-size: 11px; border-collapse: collapse;" cellpadding="8">
                <thead>
                    <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                    </tr>
            
                </thead>
            
            </table>
            <table class="items" width="100%" style="font-size: 11px; border-collapse: collapse;" cellpadding="8">
                <thead>
                    <tr>
                        <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">Congratulations! ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has
                            been <strong>Accepted</strong> to St. Ignatius College Preparatory.
                            Welcome to our school community! We congratulate ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic diligence
                            that has made this success possible.
                            The entire SI community pledges itself to your child’s intellectual, spiritual, and social
                            development over the next four years. We look forward to your participation and cooperation in this
                            endeavor.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s <strong>Acceptance</strong> is based on
                            ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  academic achievements and the gifts ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . '  will be to the SI community. Placement in
                            Honors level courses for math and foreign language will be determined by placement exams to be
                            administered on April 22, 2023.
                            Your online registration packet will include more information on these exams. The online
                            registration packet will be available on March 27, 2023, with additional information and important
                            dates.
                            To access the online registration packet, visit <a
                                href="https://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27, 2023 using the
                            username and password you used to apply. The registration system will be due on April 3, 2023.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                        <b>To reserve a place in the Class of 2027</b>, please click on the <b> Enroll at SI</b> button below and make a <b>deposit</b> of {deposit amount}.
                        As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by
                        clicking on the <b>Decline</b> button below.<b style="color:#dc3545;"> The registration deadline is 8:00 am on March 24, 2023, or the acceptance
                            will be forfeited.</b>
                        </td>
            
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            Tuition for the 2023-2024 academic year is <strong>' .  self::getTuitionAmount() . '.</strong> The Business Office
                            will have information on tuition payment plans and schedules in the online registration packet.
                            For families who applied for financial assistance, the Business Office has posted the Financial
                            Assistance Committee’s decision on this website for your reference.
                        </td>
            
                    </tr>
                   
                    <tr>
    <td width="50%" style="text-align: left;">
        We had over <b> 1,290</b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
        fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have
        ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' as a member of our talented Freshman class. ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s acceptance is contingent upon
        ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . ' continued academic performance, good citizenship, and successful completion of eighth grade at
        ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") . '. It is our intention to see that your student has the academic challenge and individual attention that
        have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and
        ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' over the next four years. Once again,<strong>congratulations!</strong>

</tr>
            
            
                </thead>
            
            </table>
            
            
            <table width="10%" style="font-family: sans-serif; font-size: 11px;">
            
                <tr>
                    <td style="padding: 0px; line-height: 20px;">
                        Sincerely,
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; line-height: 20px; border:0;">
                        <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                            width="100" height="70" alt="Logo" align="center" border="0"  style="object-fit: contain;"></a> 
                    </td>
                </tr>
                <br>
                <tr>
                    <td style="padding: 0px; line-height: 15px;">
                        <br>
                        Ms. Kristy Cahill Jacobson ‘98<br>
                        Director of Admissions
                    </td>
                </tr>
            </table>';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::TYPE_WAIT_LISTED) {

                $html = '<html>

                <head>
                
                </head>
                
                <body>
                
                    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                        <tr>
                            <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                            width="100" height="110" alt="Logo" align="center" border="0"></a></td>
                
                            <td width="100%" style="border: 0 solid #eee; text-align: left;">St. Ignatius College Preparatory<br> 2001
                                37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                                <br> <br>Office of Admissions
                            </td>
                        </tr>
                    </table>
                
                    <table width="100%" style="font-family: sans-serif; font-size: 14px;">
                        <tr>
                            <td>
                                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;">
                                    <tr>
                                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                                    </tr>
                                </table>
                                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;">
                                    <tr>
                                        <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                        <thead>
                            <tr>
                                <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name") . ' 
                                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                                    ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                            </tr>
                
                        </thead>
                
                    </table>
                    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                        <thead>
                            <tr>
                                <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ': 
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: left;">The Admissions Committee wants to thank you and ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for submitting a very thoughtful application. 
                                     The Committee was very impressed with ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s many fine qualities.
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: left;">After careful review, the Admissions Committee has placed ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  on the <strong>Wait List</strong>  for the Class of 2027.  
                                    The <strong>Wait Listed</strong>  applicants were extremely competitive candidates in the applicant pool. 
                                     We are aware that ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  likely has other admission offers from which to choose. Being placed on the St. Ignatius College Preparatory <strong>Wait List</strong>  is evidence of the strong positive impression ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  made throughout our review process. 
                                     <strong> Wait Listed</strong> applicants were carefully selected by the Admissions Committee as students who they would like as members of the upcoming Freshman class. 
                                     We recognize that ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  would be an asset to the class and sincerely hope that there will be a place available should ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . '  desire to attend St. 
                                     Ignatius College Preparatory.
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: left;">
                                    Click below for important<strong> Wait List</strong> Information from the Admissions Staff.
                                      Please read it carefully as it answers the most frequently asked questions and details all pertinent information available.
                                </td>
                
                            </tr>
                            <tr>
                                <td width="50%" style="text-align: left;">
                                    For your information, we had over <strong>1,290</strong> applicants apply to St. Ignatius College Preparatory for 375 places in the Class of 2027. 
                                     There were many qualified applicants in this large and talented applicant pool that we were unable to accept.
                                      In fact, we could fill two more schools the size of St. Ignatius that would be just as strong academically as the students we have accepted for next year`s Freshman class.
                                </td>
                
                            </tr>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                We appreciate your patience and understanding while awaiting our final decision.  Please be assured that the Admissions Committee will continue to give strong consideration to all legacies. 
                                 Thank you for your interest in St. Ignatius College Preparatory and for entrusting us with ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s application this year.
                            </td>
                
                        </tr>
                
                
                        </thead>
                
                    </table>
                
                    <br>
                    <table width="10%" style="font-family: sans-serif; font-size: 14px;">
                
                        <tr>
                            <td style="padding: 0px; line-height: 20px;">
                                Respectfully,
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; line-height: 20px; border:0;">
                                <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                                width="100" height="110" alt="Logo" align="center" border="0"></a> 
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td style="padding: 0px; line-height: 20px;">
                                <br>
                                Kristy Jacobson<br>
                                Director of Admissions
                            </td>
                        </tr>
                    </table>
                </body>
                
                </html>';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_FINANCIAL_AID_YES) {
                $html = ' <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                <tr>
                    <td width="0%" style="border: 0;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
        
                    <td width="100%" style="border: 0; text-align: left; font-size: 12px">St. Ignatius College
                        Preparatory<br> 2001
                        37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                        <br> <br><br>Office of Admissions
        
                    </td>
                </tr>
            </table>
        
            <table width="100%" style="font-family: sans-serif; font-size: 12px;">
                <tr>
                    <td>
                        <table width="60%" align="left" style="font-family: sans-serif; font-size: 12px;">
                            <tr>
                                <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                            </tr>
                        </table>
                        <table width="40%" align="right" style="font-family: sans-serif; font-size: 12px;">
                            <tr>
                                <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
            <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                <thead>
                <tr>
                <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
            </tr>
        
                </thead>
        
            </table>
            <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                <thead>
                <tr>
                <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                </td>
            </tr>
                    <tr>
                        <td width="100%" style="text-align: left;">My sincere congratulations to ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  upon
                            acceptance to the Class of 2027 of St. Ignatius College Preparatory!
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" style="text-align: left;">Your financial aid has been approved. You will receive
                            {Financial Aid Amount} a year for the next four years, for a total of
                            {Total Financial Aid Amount}. Your registration fee for Freshman year will be {Registration Fee}.
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" style="text-align: left;">We look forward to partnering with you as we provide an
                            exceptional Jesuit education in the next four years.
                        </td>
                    </tr>
                </thead>
        
            </table>
        
            <table width="100%" style="font-family: sans-serif; font-size: 12px;">
        
                <tr>
                    <td style="padding: 10px; line-height: 20px;">
                        Sincerely,
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; line-height: 20px; border:0;">
                        <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature2.png") . '"
                        width="100" height="110" alt="Logo" align="center" border="0"></a>
                    </td>
                </tr>
                <br>
                <tr>
                    <td style="padding: 10px; line-height: 20px;">
                        <br>
                        Ken Stupi<br>
                        VP of Finance & Administration
                    </td>
                </tr>
        
            </table>';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::TYPE_NOT_ACCEPTED) {
                $html = '

                <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                    <tr>
                        <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
            
                        <td width="100%" style="border: 0 solid #eee; text-align: left;">St. Ignatius College Preparatory<br> 2001
                            37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                            <br> <br>Office of Admissions
                        </td>
                    </tr>
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 14px;">
                    <tr>
                        <td>
                            <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;">
                                <tr>
                                    <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;">
                                <tr>
                                    <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                            <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name") . ' 
                                ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                                ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                        </tr>
            
                    </thead>
            
                </table>
                <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                            <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                                ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">The Admissions Committee wants to thank you and ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for submitting a very thoughtful application.
                                  We were fortunate to have so many qualified applicants to select from in this highly competitive applicant pool.
                                  The Committee was very impressed with ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '`s many fine qualities.
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">We had over<strong> 1,290</strong> applicants apply to St. Ignatius College Preparatory for the Class of 2027.
                                  We regret that we will not be able to offer ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  a place in SI`s Freshman class. 
                                   There were many qualified applicants in this large and talented pool that we were unable to accept.
                                     In fact, we could fill two more schools the size of SI that would be just as strong academically as the students we have accepted for next year`s Freshman class.
                                       ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  is to be congratulated for all ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . '  has accomplished in ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  first eight years of school.
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                We sincerely wish ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  continued success in high school.
                                 The high school ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . '  attends will be fortunate to have [him/her] as a student.  
                                Thank you for entrusting us with ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '`s application. 
                                 We appreciate your interest in St. Ignatius College Preparatory and your understanding of how difficult our selection process was this year with so many qualified applicants.
                            </td>
            
                        </tr>
            
                    </thead>
            
                </table>
            
                <br>
                <table width="10%" style="font-family: sans-serif; font-size: 14px;">
            
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            Respectfully,
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; line-height: 20px; border:0;">
                            <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                                width="100" height="70" alt="Logo" align="center" border="0"  style="object-fit: contain;"></a> 
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <br>
                            Kristy Jacobson<br>
                            Director of Admissions
                        </td>
                    </tr>
                </table>
            ';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_HONORS) {

                $html = '
                <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                    <tr>
                        <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
            
                        <td width="100%" style="border: 0 solid #eee; text-align: left; font-size: 12px">St. Ignatius College
                            Preparatory<br> 2001
                            37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                            <br> <br><br>Office of Admissions
                        </td>
                    </tr>
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
                    <tr>
                        <td>
                            <table width="60%" align="left" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="40%" align="right" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                        <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                    </tr>
                        </tr>
            
                    </thead>
            
                </table>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                    <tr>
                        <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                        </td>
                    </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">Congratulations!  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '   ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has
                                been <b>Accepted with Honors</b> to St. Ignatius College
                                Preparatory. Welcome to our school community! We congratulate  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic
                                diligence that has
                                made this success possible. The entire SI community pledges itself to your child’s intellectual,
                                spiritual, and social
                                development over the next four years. We look forward to your participation and cooperation in this
                                endeavor.</td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;"> ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s <b>Acceptance with Honors</b>
                                is a distinction reserved for the top 10% of applicants. This honor is
                                based on  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s superior academic records and test scores and because of  ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . ' 
                                academic
                                achievements {he/she} will automatically be placed in the following Honors course(s):
                                <br> <b>• {Class_Information}</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                The online registration system will be available beginning on March 27, 2023, with additional information, important
                                dates and course information. To access the online registration system, visit <a href="http://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27,
                                2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                <b> To reserve a place in the Class of 2027</b>, please click on the <b>Enroll at
                                    SI</b> button below and make a <b>deposit</b> of <b>{deposit
                                    amount}</b>.
                                As a courtesy to those students on our waitlist, we ask that those who do not intend to register at
                                SI indicate their intention by
                                clicking on the <b>Decline</b> button below. <span class="color:red;">The registration
                                    deadline is 6:00 am on March 24, 2023, or the acceptance will be
                                    forfeited.</span>
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have
                                information on tuition payment plans and
                                schedules in the online registration system. For families who applied for financial assistance, the
                                Business Office has posted
                                the Financial Assistance Committee’s decision in this portal for your reference.
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                We had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for the
                                Class of 2027. The Admissions Committee was
                                fortunate to have so many qualified applicants to select from in this highly competitive applicant
                                pool. We are excited to have
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our talented Freshman class.  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' ’s acceptance
                                is contingent upon
                                 ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  continued academic performance, good citizenship, and successful completion of eighth
                                grade at
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") . ' . It is our intention to see that your student has the academic challenge
                                and individual attention that
                                have been a hallmark of Jesuit education. To this end, we are looking forward to working closely
                                with you and
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the next four years. Once again, <b>congratulations!</b>
                            </td>
            
                        </tr>
            
                    </thead>
            
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
            
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            Sincerely,
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; line-height: 20px; border: 0;">
                            <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                            width="100" height="70" alt="Logo" align="center" border="0"  style="object-fit: contain;"></a>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <br>
                            Ms. Kristy Cahill Jacobson ‘98<br>
                            Director of Admissions
                        </td>
                    </tr>
                </table>';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_FINANCIAL_AID_NO) {

                $html = '<table width="100%" style="font-family: sans-serif;" cellpadding="10">
                <tr>
                    <td width="0%" style="border: 0;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
        
                    <td width="100%" style="border: 0; text-align: left; font-size: 12px">St. Ignatius College
                        Preparatory<br> 2001
                        37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                        <br> <br><br>Office of Admissions
        
                    </td>
                </tr>
            </table>
        
            <table width="100%" style="font-family: sans-serif; font-size: 12px;">
                <tr>
                    <td>
                        <table width="60%" align="left" style="font-family: sans-serif; font-size: 12px;">
                            <tr>
                                <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                            </tr>
                        </table>
                        <table width="40%" align="right" style="font-family: sans-serif; font-size: 12px;">
                            <tr>
                                <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
            <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                <thead>
                <tr>
                <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
            </tr>
        
                </thead>
        
            </table>
            <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                <thead>
                <tr>
                <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                </td>
            </tr>
            <tr>
            <td width="100%" style="text-align: left;">My sincere congratulations to ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  upon acceptance to the Class of 2027 of St. Ignatius College Preparatory!
            </td>
        </tr>

                    <tr>
                        <td width="100%" style="text-align: left;">I am writing to convey the decision of the Financial
                            Assistance Committee. We regret to inform you that we are unable to
                            provide financial assistance for the 2023-2024 school year.
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" style="text-align: left;">Our financial assistance funds are limited, and we have made
                            every effort to evaluate your family’s demonstrated need. We
                            cannot support any appeals unless there have been significant changes in your financial
                            circumstances that occurred after
                            your application for aid was filed. Examples of significant changes include:
                            <ul>
                                <li>Loss of income (wages, benefits, etc.) due to unemployment</li>
                                <li>New major medical issue or family death</li>
                            </ul>
        
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" style="text-align: left;">
                            If you are moving forward with an appeal, please detail and document these changes by noon on
                            Friday, March 25. All
                            required documents, including your 2022 taxes, must be on file in your TADS application to be
                            considered for an appeal.
                            Submit your appeal here: https://www.siprep.org/appeal.
                            <br><br>
                            Tuition payments are collected through FACTS, and you will be notified by e-mail to sign up for this
                            payment process.
                            <br><br>
                            It is our intention to make a Saint Ignatius education possible for all families and you are most
                            welcome to apply for financial
                            assistance in future years. Information about next year`s assistance process will be available on
                            the SI website in October
                            2023.
                            <br><br>
                            Once again, the Financial Assistance Committee regrets that we were not able to meet your request.
                            We look forward to
                            partnering with you as we provide an exceptional Jesuit education in these next four years.
        
                        </td>
                    </tr>
                </thead>
        
            </table>
        
            <table width="100%" style="font-family: sans-serif; font-size: 12px;">
        
                <tr>
                    <td style="padding: 10px; line-height: 20px;">
                        Sincerely,
                        <br>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px; line-height: 20px; border:0;">
                        <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature2.png") . '"
                        width="100" height="110" alt="Logo" align="center" border="0"></a>
                    </td>
                </tr>
                <br>
                <tr>
                    <td style="padding: 10px; line-height: 20px;">
                        <br>
                        Ken Stupi<br>
                        VP of Finance & Administration
                    </td>
                </tr>
        
            </table>
        
           
           ';
                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_Hon_W_FA_YES) {
                $html = '
                <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                    <tr>
                        <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
            
                        <td width="100%" style="border: 0 solid #eee; text-align: left; font-size: 12px">St. Ignatius College
                            Preparatory<br> 2001
                            37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                            <br> <br><br>Office of Admissions
                        </td>
                    </tr>
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
                    <tr>
                        <td>
                            <table width="60%" align="left" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="40%" align="right" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                        <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                    </tr>
                        </tr>
            
                    </thead>
            
                </table>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                    <tr>
                    <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                        ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                    </td>
                </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">Congratulations!  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '   ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has been <b>Accepted with Honors</b> to St. Ignatius College
                                Preparatory. Welcome to our school community! We congratulate  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic diligence that has
                                made this success possible. The entire SI community pledges itself to your child’s intellectual, spiritual, and social
                                development over the next four years. We look forward to your participation and cooperation in this endeavor.</td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;"> ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s <b>Acceptance with Honors</b> is a distinction reserved for the top 10% of applicants. This honor is
                                based on  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s superior academic records and test scores and because of  ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  academic
                                achievements {he/she} will automatically be placed in the following Honors course(s):
                                
                            <br><b>• {Class_Information}</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                The online registration system will be available beginning on March 27, 2023, with additional information, important
                                dates and course information. To access the online registration system, visit <a href="http://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27,
                                2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                               <b> To reserve a place in the Class of 2027</b>, please click on the <b>Enroll at SI</b> button below and make a <b>deposit</b> of <b>{deposit amount}.</b>
                                As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by
                                clicking on the <b>Decline</b> button below. <span color="red">The registration deadline is 6:00 am on March 24, 2023, or the acceptance will be
                                    forfeited.</span>
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have information on tuition payment plans and
                                schedules in the online registration system. For families who applied for financial assistance, the Business Office has posted
                                the Financial Assistance Committee’s decision in this portal for your reference.
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                We had over <b>1,290 </b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
                                fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our talented Freshman class.  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' ’s acceptance is contingent upon
                                 ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  continued academic performance, good citizenship, and successful completion of eighth grade at
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") . ' . It is our intention to see that your student has the academic challenge and individual attention that
                                have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the next four years. Once again, <b>congratulations!</b>
                            </td>
                        </tr>
            
                    </thead>
            
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
            
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            Sincerely,
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; line-height: 20px; border: 0;">
                            <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                            width="100" height="70" alt="Logo" align="center" border="0"  style="object-fit: contain;"></a>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <br>
                            Ms. Kristy Cahill Jacobson ‘98<br>
                            Director of Admissions
                        </td>
                    </tr>
                </table>
        ';

                $mpdf = new \Mpdf\Mpdf();

                $mpdf->SetTitle("Application Status");

                $mpdf->WriteHTML($html);

                $mpdf->Output();
            } elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_Hon_W_FA_NO) {
                $html = '
                <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                    <tr>
                        <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                    width="100" height="110" alt="Logo" align="center" border="0"></a></td>
            
                        <td width="100%" style="border: 0 solid #eee; text-align: left; font-size: 12px">St. Ignatius College
                            Preparatory<br> 2001
                            37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                            <br> <br><br>Office of Admissions
                        </td>
                    </tr>
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
                    <tr>
                        <td>
                            <table width="60%" align="left" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>
                            <table width="40%" align="right" style="font-family: sans-serif; font-size: 12px;">
                                <tr>
                                    <td style="padding: 0px 8px; line-height: 20px; text-align: right;">' . self::getDateFunctions() . '</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <br>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                        <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "P1_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_First_Name", 'P2_Last_Name') . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                    </tr>
                        </tr>
            
                    </thead>
            
                </table>
                <table class="items" width="100%" style="font-size: 12px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                    <tr>
                    <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                        ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ':
                    </td>
                </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">Congratulations!  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '   ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has been <b>Accepted with Honors</b> to St. Ignatius College
                                Preparatory. Welcome to our school community! We congratulate  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic diligence that has
                                made this success possible. The entire SI community pledges itself to your child’s intellectual, spiritual, and social
                                development over the next four years. We look forward to your participation and cooperation in this endeavor.</td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;"> ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s <b>Acceptance with Honors</b> is a distinction reserved for the top 10% of applicants. This honor is
                                based on  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' `s superior academic records and test scores and because of  ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  academic
                                achievements {he/she} will automatically be placed in the following Honors course(s):
                                <b>• {Class Information}</b>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                The online registration system will be available beginning on March 27, 2023, with additional information, important
                                dates and course information. To access the online registration system, visit <a href="http://www.siprepadmissions.org/">www.siprepadmissions.org</a> on March 27,
                                2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                <b>To reserve a place in the Class of 2027,</b> please click on the <b>Enroll at SI</b> button below and make a <b>deposit</b> of <b>{deposit amount}.</b>
                                As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by
                                clicking on the Decline button below. <span color="red"> The registration deadline is 6:00 am on March 24, 2023, or the acceptance will be
                                    forfeited.</span>
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                Tuition for the 2023-2024 academic year is <b>$31,225</b>. The Business Office will have information on tuition payment plans and
                                schedules in the online registration system. For families who applied for financial assistance, the Business Office has posted
                                the Financial Assistance Committee’s decision in this portal for your reference.
                            </td>
            
                        </tr>
                        <tr>
                            <td width="50%" style="text-align: left;">
                                We had over <b>1,290</b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
                                fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our talented Freshman class.  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' ’s acceptance is contingent upon
                                 ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  continued academic performance, good citizenship, and successful completion of eighth grade at
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") . ' . It is our intention to see that your student has the academic challenge and individual attention that
                                have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and
                                 ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the next four years. Once again, <b>congratulations!</b>
                            </td>
            
                        </tr>
            
                    </thead>
            
                </table>
            
                <table width="100%" style="font-family: sans-serif; font-size: 12px;">
            
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            Sincerely,
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; line-height: 20px; border: 0;">
                            <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/signature.png") . '"
                            width="100" height="70" alt="Logo" align="center" border="0"  style="object-fit: contain;"></a>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <br>
                            Ms. Kristy Cahill Jacobson ‘98<br>
                            Director of Admissions
                        </td>
                    </tr>
                  
                </table>';

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
    private function  manageContentType($studentType, $studentDetail, $type, $P2_Last_Name = '')
    {
        // dd($studentDetail);
        if ($studentType == Application::STUDENT_S1) {
            switch ($type) {

                case "Student_First_Name":


                    return ucwords($studentDetail->S1_First_Name);
                    break;
                case "Student_Last_Name":
                    return ucwords($studentDetail->S1_Last_Name);

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return '' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }
                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }

        // Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ' , ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 

        if ($studentType == Application::STUDENT_S2) {

            switch ($type) {
                case "Student_First_Name":
                    // dd($studentDetail);
                    return $studentDetail->S2_First_Name;
                    break;
                case "Student_Last_Name":
                    return $studentDetail->S2_Last_Name;

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                        return ucwords($studentDetail->P2_Salutation);
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    // dd($P2_Last_Name);

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return '' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    // dd($type);
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }

                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S2_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S2_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }
        if ($studentType == Application::STUDENT_S3) {
            switch ($type) {
                case "Student_First_Name":
                    // dd($studentDetail);
                    return ucwords($studentDetail->S3_First_Name);
                    break;
                case "Student_Last_Name":
                    return ucwords($studentDetail->S3_Last_Name);

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                        return ucwords($studentDetail->P2_Salutation);
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }
                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S3_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S3_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }
    }
    private function  getDateFunctions()
    {
        $time = Carbon::now();
        $year = date('Y');
        $date = date('d');

        $monthName = $time->format('F');
        $notification_time = $monthName . ' ' . $date . ', ' . $year;
        return $notification_time;
    }
    function getTuitionAmount()
    {
        return "$31,225";
    }

    private function  getStudentInformation($studentType, $studentDetail, $type, $P2_Last_Name = '')
    {
        // dd($studentDetail);
        if ($studentType == Application::STUDENT_S1) {
            switch ($type) {

                case "Student_First_Name":


                    return ucwords($studentDetail->S1_First_Name);
                    break;
                case "Student_Last_Name":
                    return ucwords($studentDetail->S1_Last_Name);

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return '' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }
                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }

        // Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ' , ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 

        if ($studentType == Application::STUDENT_S2) {

            switch ($type) {
                case "Student_First_Name":
                    // dd($studentDetail);
                    return $studentDetail->S2_First_Name;
                    break;
                case "Student_Last_Name":
                    return $studentDetail->S2_Last_Name;

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                        return ucwords($studentDetail->P2_Salutation);
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    // dd($P2_Last_Name);

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return '' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    // dd($type);
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }

                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S2_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S2_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }
        if ($studentType == Application::STUDENT_S3) {
            switch ($type) {
                case "Student_First_Name":
                    // dd($studentDetail);
                    return ucwords($studentDetail->S3_First_Name);
                    break;
                case "Student_Last_Name":
                    return ucwords($studentDetail->S3_Last_Name);

                    break;
                case "P1_Salutation":
                    return ucwords($studentDetail->P1_Salutation);

                    break;

                case "P2_Salutation":
                    if ($studentDetail->P2_Salutation == null) {
                        return ucwords($studentDetail->P2_Salutation);
                    } else {
                        return 'and ' . ucwords($studentDetail->P2_Salutation);
                    }

                    break;
                case "P2_Last_Name":
                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P2_Last_Name);
                    } else {
                        if ($P2_Last_Name == 'P2_Last_Name') {
                            return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                        } else {
                            if ($studentDetail->P2_Salutation == null) {

                                return 'and ' . ucwords($studentDetail->P2_Last_Name) . '';
                            } else {
                                return ' ' . ucwords($studentDetail->P2_Last_Name) . '';
                            }
                        }
                    }
                    break;
                case "P1_First_Name":
                    return ucwords($studentDetail->P1_First_Name);
                    break;
                case "P1_Last_Name":

                    if ($studentDetail->P2_Last_Name == null) {
                        return ucwords($studentDetail->P1_Last_Name) . '';
                    } else {
                        return ucwords($studentDetail->P1_Last_Name);
                    }
                    break;

                case "P2_First_Name":
                    if ($studentDetail->P2_First_Name == null) {

                        return ucwords($studentDetail->P2_First_Name);
                    } else {

                        return 'and ' . ucwords($studentDetail->P2_First_Name);
                    }
                    break;
                case "Primary_Address_Street":
                    return ucwords($studentDetail->Address_1);
                    break;
                case "Primary_Address_City":

                    return ucwords($studentDetail->City_1);
                    break;
                case "Primary_Address_State":
                    return ucwords($studentDetail->State_1);
                    break;
                case "Primary_Address_Zipcode":
                    return ucwords($studentDetail->Zipcode_1);
                    break;
                case "Student_Current_School":
                    return ucwords($studentDetail->S1_Current_School);
                    break;
                case "his/her":
                    if ($studentDetail->S3_Gender == "Male") {
                        return "his";
                    } else {
                        return "her";
                    }
                case "he/she":
                    if ($studentDetail->S3_Gender == "Male") {
                        return "he";
                    } else {
                        return "she";
                    }
                    break;
                default:
                    return "----";
            };
        }
    }
}
