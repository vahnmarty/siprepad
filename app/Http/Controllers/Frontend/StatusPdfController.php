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
    public function index(Request $request, $ntid, $uid,$application_ID)
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
                    $studentType = 's1';
                    $StudentApplicationStatus =  StudentApplicationStatus::where('Profile_ID', $uid)->select('s1_application_status')->first();
                    if ($StudentApplicationStatus) {
                        $getStudentApplicationStatus = $StudentApplicationStatus->s1_application_status;
                    } else {
                        $getStudentApplicationStatus = '';
                    }
                } else if ($notMessage->student_profile == Application::STUDENT_TWO) {
                    $studentType = 's2';
                    $StudentApplicationStatus =  StudentApplicationStatus::where('Profile_ID', $uid)->select('s2_application_status')->first();
                    if ($StudentApplicationStatus) {
                        $getStudentApplicationStatus = $StudentApplicationStatus->s2_application_status;
                    } else {
                        $getStudentApplicationStatus = '';
                    }
                } else if ($notMessage->student_profile == Application::STUDENT_THREE) {
                    $studentType = 's3';
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
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") .', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                    </tr>
            
                </thead>
            
            </table>
            <table class="items" width="100%" style="font-size: 11px; border-collapse: collapse;" cellpadding="8">
                <thead>
                    <tr>
                        <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . ' ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                            ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") .':
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
                            username and password you used to apply.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            To reserve a place in the Class of 2027, please click on the <strong>Accept</strong> button below
                            and make a <strong>deposit</strong> of <strong>$1,500.</strong>
                            As a courtesy to those students on our waitlist, we ask that those who do not intend to register at
                            SI indicate their intention by clicking on the<strong> Decline</strong> button below.
                            <span style="color:red" ;> The registration deadline is 8:00 am on March 24, 2023, or the acceptance
                                will be forfeited.</span>
                        </td>
            
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            Tuition for the 2023-2024 academic year is <strong> [Tuition_Amount].</strong> The Business Office
                            will have information on tuition payment plans and schedules in the online registration packet.
                            For families who applied for financial assistance, the Business Office has posted the Financial
                            Assistance Committee’s decision on this website for your reference.
                        </td>
            
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            For your information, we had over <strong>1,290</strong> applicants apply to St. Ignatius College
                            Preparatory for the Class of 2027.
                            The Admissions Committee was fortunate to have so many qualified applicants to select from in this
                            highly competitive applicant pool. We are excited to have ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our
                            talented Freshman class. ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s acceptance is contingent upon ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  continued
                            academic performance, good citizenship, and successful completion of eight grade at
                            ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") .'. It is our intention to see that your child has the academic challenge and
                            individual attention that have been a hallmark of Jesuit education.
                            To this end, we are looking forward to working closely with you and ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the
                            next four years. Once again, <strong>congratulations!</strong>
            
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
                       Kristy Jacobson<br>
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
                                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City").', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                                    ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                            </tr>
                
                        </thead>
                
                    </table>
                    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                        <thead>
                            <tr>
                                <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") .': 
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
                                ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City").', ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
                                ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_Zipcode") . ' </td>
                        </tr>
            
                    </thead>
            
                </table>
                <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
                    <thead>
                        <tr>
                            <td width="50%" style="text-align: left;">Dear ' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                                ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") .':
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
            }
            elseif ($getStudentApplicationStatus == Application::ACCEPTANCE_FINANCIAL_AID) {
                $html= '  <table width="100%" style="font-family: sans-serif;" cellpadding="10">
                <tr>
                    <td width="0%" style="border: 0 solid #eee;"> <a href="#" target="_blank"><img src="' .  asset("admin_assets/logo/logo_header2.png") . '"
                                width="100" height="110" alt="Logo" align="center" border="0"></a></td>
        
                    <td width="100%" style="border: 0 solid #eee; text-align: left; font-size: 12px">St. Ignatius College Preparatory<br> 2001
                        37th Avenue<br>San Francisco, CA 94116<br>(415) 731-7500
                        <br>  <br><br>Office of Admissions
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
                <td width="50%" style="text-align: left;">Dear' . self::getStudentInformation($studentType, $studentDetail, "P1_Salutation") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P1_Last_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "P2_Salutation") . ' 
                    ' . self::getStudentInformation($studentType, $studentDetail, "P2_Last_Name") .': 
               </td>
            </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">Congratulations!  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has been <strong>Accepted</strong>  to St. Ignatius College Preparatory.  Welcome to our school community!  We congratulate ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic diligence that has made this success possible.  The entire SI community pledges itself to your child’s intellectual, spiritual, and social development over the next four years.  We look forward to your participation and cooperation in this endeavor.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' ’s <strong>Acceptance</strong>  is based on ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . ' academic achievements and the gifts ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . ' will be to the SI community.  Placement in Honors level courses for math and foreign language will be determined by placement exams to be administered on April 22, 2023.  Your online registration packet will include more information on these exams.  The online registration packet will be available on March 27, 2023, with additional information and important dates.  To access the online registration packet, visit <a href="www.siprepadmissions">www.siprepadmissions</a>.org on March 27, 2023 using the username and password you used to apply.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            To reserve a place in the Class of 2027, please click on the <strong>Accept</strong> button below and make a <strong>deposit</strong>  of <strong>$1,500.</strong>  As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their intention by clicking on the <strong>Decline</strong> button below.  The registrationdeadline is 8:00 am on March 24, 2023, or the acceptance will be forfeited. <span style="color:red" ;> The registration deadline is 8:00 am on March 24, 2023, or the acceptance will be forfeited.</span>
                        </td>
        
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            Tuition for the 2023-2024 academic year is <strong>{Tuition_Amount}</strong>.The Business Office will have information on tuition payment plans and schedules in the online registration packet.  For families who applied for financial assistance, the Business Office has posted the Financial Assistance Committee’s decision on this website for your reference.
                        </td>
        
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">
                            For your information, we had over <strong>1,290</strong> applicants apply to St. Ignatius College Preparatory for the Class of 2027.  The Admissions Committee was fortunate to have so many qualified applicants to select from in this highly competitive applicant pool.  We are excited to have ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our talented Freshman class.  ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . ' ’s acceptance is contingent upon ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . ' continued academic performance, good citizenship, and successful completion of eight grade at ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") .'.  It is our intention to see that your child has the academic challenge and individual attention that have been a hallmark of Jesuit education.  To this end, we are looking forward to working closely with you and ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the next four years.  Once again, <strong>congratulations!</strong> 
                        </td>
        
                    </tr>
        
                </thead>
        
            </table>
        
            <table width="10%" style="font-family: sans-serif; font-size: 12px;">
        
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
                    <td style="padding: 0px; line-height: 20px;">
                        <br>
                        Kristy Jacobson<br>
                        Director of Admissions
                    </td>
                </tr>
        
            </table>
        
            <table width="40%" style="font-family: sans-serif; font-size: 12px;">
            <tr>
                    
                <td>      
               <span style="color:rgb(32, 143, 234); font-weight: bold;" >Financial Assistance Details for ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '</span> </td>
        
        </tr>
        </table>';
                   $mpdf = new \Mpdf\Mpdf();
   
                   $mpdf->SetTitle("Application Status");
   
                   $mpdf->WriteHTML($html);
   
                   $mpdf->Output();
   
               } 
            else {
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
    private function  getDateFunctions()
    {
        $time = Carbon::now();
        $year = date('Y');
        $date = date('d');

        $monthName = $time->format('F');
        $notification_time = $monthName . ' ' . $date . ', ' . $year;
        return $notification_time;
    }
    private function  getStudentInformation($studentType, $studentDetail, $type,$P2_Last_Name = '')
    {
        // dd($studentDetail);
        if ($studentType == 's1') {
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
                        return "His";
                    } else {
                        return "Her";
                    }
                case "he/she":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "He";
                    } else {
                        return "She";
                    }
                    break;
                default:
                    return "----";
            };
        }
    
        // Primary_Address_Street") . ' <br>' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_City") . ' , ' . self::getStudentInformation($studentType, $studentDetail, "Primary_Address_State") . ' 
    
        if ($studentType == 's2') {
    
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
                    if ($studentDetail->S1_Gender == "Male") {
                        return "His";
                    } else {
                        return "Her";
                    }
                case "he/she":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "He";
                    } else {
                        return "She";
                    }
                    break;
                default:
                    return "----";
            };
        }
        if ($studentType == 's3') {
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
                    if ($studentDetail->S1_Gender == "Male") {
                        return "His";
                    } else {
                        return "Her";
                    }
                case "he/she":
                    if ($studentDetail->S1_Gender == "Male") {
                        return "He";
                    } else {
                        return "She";
                    }
                    break;
                default:
                    return "----";
            };
        }
    }
}
