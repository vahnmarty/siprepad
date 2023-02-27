<?php

namespace App\Http\Controllers\Admin;


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

class PdfController extends Controller
{
    public function index(Request $request, $ntid, $uid, $application_ID)
    {

        $studentType = '';
        $notificationID = $ntid;
        $notMessage = Notification::where('id', $notificationID)->first();
        if (!$notMessage) {
            return redirect('/admin/application')->with('error', 'You are not allowed to access this page');
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

            // if ($getStudentApplicationStatus == Application::TYPE_ACCEPTED) {
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
                        <td width="50%" style="text-align: left;">Congratulations! ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  ' . self::getStudentInformation($studentType, $studentDetail, "Student_Last_Name") . '  has been <b> Accepted </b> to St. Ignatius College Preparatory.
                        Welcome to our school community! We congratulate ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  for the academic diligence that has made this
                        success possible. The entire SI community pledges itself to your child’s intellectual, spiritual, and social development over the
                        next four years. We look forward to your participation and cooperation in this endeavor.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;">' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s <b>Acceptance </b> is based on ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  academic achievements and the gifts ' . self::getStudentInformation($studentType, $studentDetail, "he/she") . '  will bring to the SI
                        community. The online registration system will be available beginning on March 27, 2023, with additional information,
                        important dates and course information. To access the online registration system, visit <a href="https://www.siprepadmissions.org/login">www.siprepadmissions.org</a> on March
                        27, 2023 using the username and password you used to apply. The registration system will be due on April 3, 2023.
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="text-align: left;"><b>
                       To reserve a place in the Class of 2027</b>, please click on the <b>Enroll at SI</b> button below and make a <b>deposit</b> of {deposit
                            amount}. As a courtesy to those students on our waitlist, we ask that those who do not intend to register at SI indicate their
                            intention by clicking on the <b>Decline</b> button below. <b style="color:#dc3545;"> The registration deadline is 6:00 am on March 24, 2023, or the acceptance will be
                        forfeited.</b>
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
    <td width="50%" style="text-align: left;">We had over <b> 1,290</b> applicants apply to St. Ignatius College Preparatory for the Class of 2027. The Admissions Committee was
    fortunate to have so many qualified applicants to select from in this highly competitive applicant pool. We are excited to have
    ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  as a member of our talented Freshman class. ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '’s acceptance is contingent upon
    ' . self::getStudentInformation($studentType, $studentDetail, "his/her") . '  continued academic performance, good citizenship, and successful completion of eighth grade at
    ' . self::getStudentInformation($studentType, $studentDetail, "Student_Current_School") . '. It is our intention to see that your student has the academic challenge and individual attention that
    have been a hallmark of Jesuit education. To this end, we are looking forward to working closely with you and
    ' . self::getStudentInformation($studentType, $studentDetail, "Student_First_Name") . '  over the next four years. Once again, <b>congratulations</b>!

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
            // } else {
            //     $html = '
            //     <h1>St. Ignatius College Preparatory</h1>
            //     <p>Dear ' . $studentDetail->S1_First_Name . ' ' . $studentDetail->S1_Last_Name . ',</p>
            //     <p>' . $notMessage->message . '</p>
            // ';
            //     $mpdf = new \Mpdf\Mpdf();

            //     $mpdf->SetTitle("Application Status");

            //     $mpdf->WriteHTML($html);

            //     $mpdf->Output();
            // }
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
