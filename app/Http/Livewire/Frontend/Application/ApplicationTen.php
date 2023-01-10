<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\ReleaseAuthorization;
use App\Models\StudentInformation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\RequiredIf;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Payment;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitMail;
use App\Models\AddressInformation;
use App\Models\LegacyInformation;
use App\Models\ParentInformation;
use App\Models\ParentStatement;
use App\Models\SiblingInformation;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\StudentStatement;
use App\Models\WritingSample;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;

class ApplicationTen extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public  $isEdit = false, $release_authorization_id, $profile_id, $application_id, $releaseAuthorization = [], $is_button_clicked = false, $is_patment_compleate = false, $transaction_id, $paid_amount = 0;
    public $pay_amount = 0, $card_number, $card_holder_name, $card_cvv, $card_exp_mm, $card_exp_yy;
    public $first_name, $last_name, $email, $billing_address, $billing_city, $billing_state, $billing_zip_code, $studentInfo, $studentTransfer;

    public function mount($getReleaseAuthorization = null, $studentTransfer = null)
    {
        //dd($getReleaseAuthorization);

        $this->profile_id = Auth::guard('customer')->user()->id;
        $getApplication = Application::where('Profile_ID', $this->profile_id)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $getApplication->Application_ID)->first()->toArray();

        if ($getReleaseAuthorization) {

            $this->release_authorization_id = $getReleaseAuthorization->id;
            $this->studentTransfer = $studentTransfer;
            $entranceExamInfo = [];
            $arr1 = [
                "S1_Entrance_Exam_Reservation" => $getReleaseAuthorization->S1_Entrance_Exam_Reservation,
                "S1_Other_Catholic_School_Name" => $getReleaseAuthorization->S1_Other_Catholic_School_Name,
                "S1_Other_Catholic_School_Location" => $getReleaseAuthorization->S1_Other_Catholic_School_Location,
                "S1_Other_Catholic_School_Date" => $getReleaseAuthorization->S1_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

            ];
            $arr2 = [
                "S2_Entrance_Exam_Reservation" => $getReleaseAuthorization->S2_Entrance_Exam_Reservation,
                "S2_Other_Catholic_School_Name" => $getReleaseAuthorization->S2_Other_Catholic_School_Name,
                "S2_Other_Catholic_School_Location" => $getReleaseAuthorization->S2_Other_Catholic_School_Location,
                "S2_Other_Catholic_School_Date" => $getReleaseAuthorization->S2_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

            ];
            $arr3 = [
                "S3_Entrance_Exam_Reservation" => $getReleaseAuthorization->S3_Entrance_Exam_Reservation,
                "S3_Other_Catholic_School_Name" => $getReleaseAuthorization->S3_Other_Catholic_School_Name,
                "S3_Other_Catholic_School_Location" => $getReleaseAuthorization->S3_Other_Catholic_School_Location,
                "S3_Other_Catholic_School_Date" => $getReleaseAuthorization->S3_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

            ];
            // dd($getReleaseAuthorization['S1_Entrance_Exam_Reservation']);
            $newArr[] = $getStudent['S1_First_Name'] != '' ? $arr1 : null;
            $newArr[] = $getStudent['S2_First_Name'] != '' ? $arr2 : null;
            $newArr[] = $getStudent['S3_First_Name'] != '' ? $arr3 : null;

            foreach ($newArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($entranceExamInfo, $value);
                }
            }
            $this->pay_amount = 125 * count($entranceExamInfo);

            $this->releaseAuthorization = [
                'EntranceExamInfo' => $entranceExamInfo,
                'Extrance_Exam_Date' => $getReleaseAuthorization->Extrance_Exam_Date,
                'Agree_to_release_record' => $getReleaseAuthorization->Agree_to_release_record,
                'Agree_to_record_is_true' => $getReleaseAuthorization->Agree_to_record_is_true,
                'Release_Date' => $getReleaseAuthorization->Release_Date,
            ];
            // dd($this->releaseAuthorization);
            $this->isEdit = true;
        } else {

            $entranceExamInfo = [];
            $arr1 = [
                "S1_Entrance_Exam_Reservation" => '',
                "S1_Other_Catholic_School_Name" => '',
                "S1_Other_Catholic_School_Location" => '',
                "S1_Other_Catholic_School_Date" => '',
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $arr2 = [
                "S2_Entrance_Exam_Reservation" => '',
                "S2_Other_Catholic_School_Name" => '',
                "S2_Other_Catholic_School_Location" => '',
                "S2_Other_Catholic_School_Date" => '',
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $arr3 = [
                "S3_Entrance_Exam_Reservation" => '',
                "S3_Other_Catholic_School_Name" => '',
                "S3_Other_Catholic_School_Location" => '',
                "S3_Other_Catholic_School_Date" => '',
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
            $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
            $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
            //dd($getStudent,$studentArr);
            foreach ($studentArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($entranceExamInfo, $arr);
                }
            }
            //dd($getStudent, $studentArr, count($entranceExamInfo));
            $this->pay_amount = 125 * count($entranceExamInfo);
            $this->paid_amount = 125 * count($entranceExamInfo);


            $this->releaseAuthorization = [
                'EntranceExamInfo' => $entranceExamInfo,
                'Extrance_Exam_Date' => '',
                'Agree_to_release_record' => '',
                'Agree_to_record_is_true' => '',
                'Release_Date' => ''
            ];
            // dd($getStudent,$studentArr,$this->releaseAuthorization);
        }

        $getPayment = Payment::where('user_id', Auth::guard('customer')->user()->id)
            ->where('application_id', $getApplication->Application_ID)->first();
        //dd($getPayment);
        if ($getPayment) {
            if ($getPayment->transaction_id) {
                $this->transaction_id = $getPayment->transaction_id;
                $this->paid_amount = $getPayment->amount;
                if ($this->paid_amount == $this->pay_amount) {
                    $this->is_patment_compleate = true;
                }
            } else {
                $this->pay_amount = count($this->releaseAuthorization['EntranceExamInfo']) * $getPayment->promo_amount;
            }
        }
    }

    public function saveOrUpdate()
    {
        //dd($this->releaseAuthorization);
        //Check all the step compleat
        $getStudentInfo = StudentInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getAddressInfo = AddressInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getParentInfo = ParentInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        //$getSiblingInfo = SiblingInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        //$getLegacyInfo = LegacyInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getParentStatement = ParentStatement::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getSpiritualCommunityInfo = SpiritualAndCommunityInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getStudentStatementInfo = StudentStatement::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getWritingSample = WritingSample::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();

        //dd(!isset($getStudentInfo), $getAddressInfo, $getParentInfo, $getParentStatement, $getSpiritualCommunityInfo, $getStudentStatementInfo, $getWritingSample);
        if (!isset($getStudentInfo) || !isset($getAddressInfo) || !isset($getParentInfo) || !isset($getParentStatement) || !isset($getSpiritualCommunityInfo) || !isset($getStudentStatementInfo) || !isset($getWritingSample)) {
            //dd('kk');
            return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'Please complete all the steps before submit your application.');
        }

        if (count($this->releaseAuthorization['EntranceExamInfo']) == 1) {
            $this->validate($this->entranceExamInfoOneValidation());
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 2) {
            $this->validate($this->entranceExamInfoTwoValidation());
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 3) {
            $this->validate($this->entranceExamInfoThreeValidation());
        }
        //dd($this->releaseAuthorization);

        $new_entrance_exam_info_arr = Arr::collapse($this->releaseAuthorization['EntranceExamInfo']);
        unset($new_entrance_exam_info_arr['Student_name']);
        //$this->releaseAuthorization['EntranceExamInfo'] = $new_entrance_exam_info_arr;

        $this->releaseAuthorization['S1_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S1_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S1_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Date'] : '';

        $this->releaseAuthorization['S2_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S2_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S2_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Date'] : '';

        $this->releaseAuthorization['S3_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S3_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S3_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Date'] : '';


        unset($this->releaseAuthorization['EntranceExamInfo']);
        // dd($new_entrance_exam_info_arr, $this->releaseAuthorization);

        //         if ($this->isEdit) {
        //             ReleaseAuthorization::find($this->release_authorization_id)->delete();
        //         } commented for payment stop functionality


        $this->releaseAuthorization['Profile_ID'] = Auth::guard('customer')->user()->id;
        $this->releaseAuthorization['Application_ID'] = $this->application_id;
        $this->releaseAuthorization['Transaction_ID'] = $this->transaction_id;


        ReleaseAuthorization::create($this->releaseAuthorization);

        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['status' => 1]);

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $this->application_id)->first()->toArray();
        $stuarr1 = [
            "Rec_Student" => $getStudent['S1_First_Name'] . " " . $getStudent['S1_Last_Name'],
        ];

        $stuarr2 = [
            "Rec_Student" => $getStudent['S2_First_Name'] . " " . $getStudent['S2_Last_Name'],
        ];

        $stuarr3 = [
            "Rec_Student" => $getStudent['S3_First_Name'] . " " . $getStudent['S3_Last_Name'],
        ];


        //For send mail
        $studentArr[] = $getStudent['S1_First_Name'] ? $stuarr1 : null;
        $studentArr[] = $getStudent['S2_First_Name'] ? $stuarr2 : null;
        $studentArr[] = $getStudent['S3_First_Name'] ? $stuarr3 : null;
        $getAllStudent = array();

        foreach ($studentArr as $key => $student) {
            //dd($student);
            if (!is_null($student)) {
                array_push($getAllStudent, $student['Rec_Student']);
            }
        }
        $data = [
            "subject" => "Application Confirmation",
            'user_first_name' => Auth::guard('customer')->user()->Pro_First_Name,
            'applicant_name' => $getAllStudent
        ];

        $usermail = Auth::guard('customer')->user()->email;

        return redirect()->route('thank.you')->with('success', 'Thank you for submitting an application.');
        //send to mail code here
        //Mail::to($usermail)->bcc('admissions@siprep.org')->send(new ApplicationSubmitMail($data));

        //         if (Mail::failures()) {
        //             return redirect()->route('thank.you')->with('error', 'Application submitted but mail not sent');
        //         } else {
        //             return redirect()->route('thank.you')->with('success', 'Thank you for submitting an application.');
        //         } commented for payment stop functionality
    }

    public function render()
    {
        return view('livewire.frontend.application.application-ten');
    }

    //Validition and Custom Message
    public function entranceExamInfoOneValidation(): array
    {
        return [
            'releaseAuthorization.EntranceExamInfo.0.S1_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.Agree_to_release_record' => ['accepted'],
            'releaseAuthorization.Agree_to_record_is_true' => ['accepted']
        ];
    }

    public function entranceExamInfoTwoValidation(): array
    {
        return [
            'releaseAuthorization.EntranceExamInfo.0.S1_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.EntranceExamInfo.1.S2_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.Agree_to_release_record' => ['accepted'],
            'releaseAuthorization.Agree_to_record_is_true' => ['accepted'],
        ];
    }

    public function entranceExamInfoThreeValidation(): array
    {
        return [
            'releaseAuthorization.EntranceExamInfo.0.S1_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.0.S1_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][0]['S1_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.EntranceExamInfo.1.S2_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.1.S2_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][1]['S2_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.EntranceExamInfo.2.S3_Entrance_Exam_Reservation' => ['required'],
            'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Name' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][2]['S3_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Location' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][2]['S3_Entrance_Exam_Reservation'] == 0),
            'releaseAuthorization.EntranceExamInfo.2.S3_Other_Catholic_School_Date' => new RequiredIf($this->releaseAuthorization['EntranceExamInfo'][2]['S3_Entrance_Exam_Reservation'] == 0),

            'releaseAuthorization.Agree_to_release_record' => ['accepted'],
            'releaseAuthorization.Agree_to_record_is_true' => ['accepted'],


        ];
    }

    public function openModal()
    {
        $new_entrance_exam_info_arr = Arr::collapse($this->releaseAuthorization['EntranceExamInfo']);
        unset($new_entrance_exam_info_arr['Student_name']);

        $this->releaseAuthorization['S1_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S1_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S1_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S1_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S1_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S1_Other_Catholic_School_Date'] : '';

        $this->releaseAuthorization['S2_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S2_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S2_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S2_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S2_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S2_Other_Catholic_School_Date'] : '';

        $this->releaseAuthorization['S3_Entrance_Exam_Reservation'] = isset($new_entrance_exam_info_arr['S3_Entrance_Exam_Reservation']) ? $new_entrance_exam_info_arr['S3_Entrance_Exam_Reservation'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Name'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Name']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Name'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Location'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Location']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Location'] : '';
        $this->releaseAuthorization['S3_Other_Catholic_School_Date'] = isset($new_entrance_exam_info_arr['S3_Other_Catholic_School_Date']) ? $new_entrance_exam_info_arr['S3_Other_Catholic_School_Date'] : '';
        unset($this->releaseAuthorization['EntranceExamInfo']);

        if ($this->isEdit) {
            ReleaseAuthorization::find($this->release_authorization_id)->delete();
        }
        $this->releaseAuthorization['Profile_ID'] = Auth::guard('customer')->user()->id;
        $this->releaseAuthorization['Application_ID'] = $this->application_id;
        $this->releaseAuthorization['Transaction_ID'] = $this->transaction_id;

        $this->releaseAuthorization['Agree_to_release_record'] = $this->releaseAuthorization['Agree_to_release_record'] ? 1 : 0;
        $this->releaseAuthorization['Agree_to_record_is_true'] = $this->releaseAuthorization['Agree_to_record_is_true'] ? 1 : 0;

        //dd($this->releaseAuthorization);
        $getReleaseAuthorization = ReleaseAuthorization::create($this->releaseAuthorization);
        //dd($getReleaseAuthorization);
        $this->release_authorization_id = $getReleaseAuthorization->id;
        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID',  $this->application_id)->first()->toArray();

        $entranceExamInfo = [];

        $arr1 = [
            "S1_Entrance_Exam_Reservation" => $getReleaseAuthorization->S1_Entrance_Exam_Reservation,
            "S1_Other_Catholic_School_Name" => $getReleaseAuthorization->S1_Other_Catholic_School_Name,
            "S1_Other_Catholic_School_Location" => $getReleaseAuthorization->S1_Other_Catholic_School_Location,
            "S1_Other_Catholic_School_Date" => $getReleaseAuthorization->S1_Other_Catholic_School_Date,
            "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

        ];
        $arr2 = [
            "S2_Entrance_Exam_Reservation" => $getReleaseAuthorization->S2_Entrance_Exam_Reservation,
            "S2_Other_Catholic_School_Name" => $getReleaseAuthorization->S2_Other_Catholic_School_Name,
            "S2_Other_Catholic_School_Location" => $getReleaseAuthorization->S2_Other_Catholic_School_Location,
            "S2_Other_Catholic_School_Date" => $getReleaseAuthorization->S2_Other_Catholic_School_Date,
            "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

        ];
        $arr3 = [
            "S3_Entrance_Exam_Reservation" => $getReleaseAuthorization->S3_Entrance_Exam_Reservation,
            "S3_Other_Catholic_School_Name" => $getReleaseAuthorization->S3_Other_Catholic_School_Name,
            "S3_Other_Catholic_School_Location" => $getReleaseAuthorization->S3_Other_Catholic_School_Location,
            "S3_Other_Catholic_School_Date" => $getReleaseAuthorization->S3_Other_Catholic_School_Date,
            "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

        ];
        $newArr[] = $getStudent['S1_First_Name'] != '' ? $arr1 : null;
        $newArr[] = $getStudent['S2_First_Name'] != '' ? $arr2 : null;
        $newArr[] = $getStudent['S3_First_Name'] != '' ? $arr3 : null;

        foreach ($newArr as $key => $value) {
            if (!is_null($value)) {
                array_push($entranceExamInfo, $value);
            }
        }
        //$this->pay_amount = 125 * count($entranceExamInfo);
        $this->releaseAuthorization = [
            'EntranceExamInfo' => $entranceExamInfo,
            'Extrance_Exam_Date' => $getReleaseAuthorization->Extrance_Exam_Date,
            'Agree_to_release_record' => $getReleaseAuthorization->Agree_to_release_record,
            'Agree_to_record_is_true' => $getReleaseAuthorization->Agree_to_record_is_true,
            'Release_Date' => $getReleaseAuthorization->Release_Date,
        ];

        $this->isEdit = true;
        $this->emit('openPaymentModal');
    }

    public function payApplicationFees()
    {

        //First Check the all steps(1 to 10) are complete ??
        $getReleaseAuthorization = ReleaseAuthorization::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();

        if (count($this->releaseAuthorization['EntranceExamInfo']) == 1) {
            if ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0) {
                //dd(empty($getReleaseAuthorization->S1_Other_Catholic_School_Name));
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            }
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 2) {
            if ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 0) {
                //dd(empty($getReleaseAuthorization->S1_Other_Catholic_School_Name));
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            } elseif ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 1 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 0) {
                if (empty($getReleaseAuthorization->S2_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            } elseif ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 1) {
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            }
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 3) {
            if ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S3_Entrance_Exam_Reservation == 0) {
                //dd(empty($getReleaseAuthorization->S1_Other_Catholic_School_Name));
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            } elseif ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 1 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S3_Entrance_Exam_Reservation == 0) {
                if (empty($getReleaseAuthorization->S2_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            } elseif ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 1 && $getReleaseAuthorization->S3_Entrance_Exam_Reservation == 0) {
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S3_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            } elseif ($getReleaseAuthorization->S1_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S2_Entrance_Exam_Reservation == 0 && $getReleaseAuthorization->S3_Entrance_Exam_Reservation == 1) {
                if (empty($getReleaseAuthorization->S1_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S1_Other_Catholic_School_Date) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Name) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Location) || empty($getReleaseAuthorization->S2_Other_Catholic_School_Date)) {
                    return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
                }
            }
        }

        if (count($this->releaseAuthorization['EntranceExamInfo']) == 1) {
            //dd(is_null($getReleaseAuthorization->S1_Entrance_Exam_Reservation));
            if (is_null($getReleaseAuthorization->S1_Entrance_Exam_Reservation) || empty($getReleaseAuthorization->Agree_to_release_record) || empty($getReleaseAuthorization->Agree_to_record_is_true)) {
                //dd('Step ==> 10');
                return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
            }
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 2) {
            //dd('Step ==> 10',is_null($getReleaseAuthorization->S1_Entrance_Exam_Reservation),is_null($getReleaseAuthorization->S2_Entrance_Exam_Reservation));
            if (is_null($getReleaseAuthorization->S1_Entrance_Exam_Reservation) || is_null($getReleaseAuthorization->S2_Entrance_Exam_Reservation) || empty($getReleaseAuthorization->Agree_to_release_record) || empty($getReleaseAuthorization->Agree_to_record_is_true)) {
                //dd('Step ==> 10');
                return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
            }
        } elseif (count($this->releaseAuthorization['EntranceExamInfo']) == 3) {
            if (is_null($getReleaseAuthorization->S1_Entrance_Exam_Reservation) || is_null($getReleaseAuthorization->S2_Entrance_Exam_Reservation) || is_null($getReleaseAuthorization->S3_Entrance_Exam_Reservation) || empty($getReleaseAuthorization->Agree_to_release_record) || empty($getReleaseAuthorization->Agree_to_record_is_true)) {
                //dd('Step ==> 10');
                return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
            }
        }
        $getStudentInfo = StudentInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getAddressInfo = AddressInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getParentInfo = ParentInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getSiblingInfo = SiblingInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getLegacyInfo = LegacyInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getParentStatement = ParentStatement::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getSpiritualCommunityInfo = SpiritualAndCommunityInformation::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getStudentStatementInfo = StudentStatement::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();
        $getWritingSample = WritingSample::where('Profile_ID',  $this->profile_id)->where('Application_ID', $this->application_id)->first();

        if (!isset($getStudentInfo) || !isset($getAddressInfo) || !isset($getParentInfo) || !isset($getParentStatement) || !isset($getSpiritualCommunityInfo) || !isset($getStudentStatementInfo) || !isset($getWritingSample) || !isset($getReleaseAuthorization)) {
            //dd('Step ==> 1 to 9');
            return redirect()->route('admission-application', ['step' => 'ten'])->with('error', 'All required fields must be completed before you can make a payment.');
        }
        //If all steps are complete then check payment modal all fields validation
        $this->validate($this->payValidation());
        $input = [
            'pay_amount' => $this->pay_amount,
            'card_number' => $this->card_number,
            'card_holder_name' => $this->first_name . ' ' . $this->last_name,
            'card_cvv' => $this->card_cvv,
            'card_exp_mm' => $this->card_exp_mm,
            'card_exp_yy' => $this->card_exp_yy,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'billing_address' => $this->billing_address,
            'billing_city' => $this->billing_city,
            'billing_state' => $this->billing_state,
            'billing_zip_code' => $this->billing_zip_code,
        ];

        $this->is_button_clicked = true;
        $response = $this->handleOnLinePay($input);
        if ($response != null) {
            if ($response->getMessages()->getResultCode() == "Ok") {
                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getMessages() != null) {

                    $data['message'] = "Your payment is successfull";
                    $data['status'] = "success";
                    $getPaymentLog = Payment::where('user_id', Auth::guard('customer')->user()->id)->where('application_id', $this->application_id)->first();
                    if ($getPaymentLog) {
                        $getPaymentLog->update([
                            'amount' => $input['pay_amount'],
                            'response_code' => $tresponse->getResponseCode(),
                            'transaction_id' => $tresponse->getTransId(),
                            'auth_id' => $tresponse->getAuthCode(),
                            'message_code' => $tresponse->getMessages()[0]->getCode(),
                            'name_on_card' => trim($input['card_holder_name']),
                            'quantity' => 1
                        ]);
                    } else {
                        Payment::create([
                            'user_id' => Auth::guard('customer')->user()->id,
                            'application_id' => $this->application_id,
                            'amount' => $input['pay_amount'],
                            'response_code' => $tresponse->getResponseCode(),
                            'transaction_id' => $tresponse->getTransId(),
                            'auth_id' => $tresponse->getAuthCode(),
                            'message_code' => $tresponse->getMessages()[0]->getCode(),
                            'name_on_card' => trim($input['card_holder_name']),
                            'quantity' => 1
                        ]);
                    }

                    //Update Next step
                    Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'ten']);

                    $this->transaction_id = $tresponse->getTransId();
                    $this->is_patment_compleate = true;
                    $this->is_button_clicked = false;
                    $this->clear();
                } else {
                    $this->is_button_clicked = false;
                    $data['message'] = 'There were some issue with the payment. Please try again later.';
                    $data['status'] = "error";

                    if ($tresponse->getErrors() != null) {
                        $data['message'] = $tresponse->getErrors()[0]->getErrorText();
                        $data['status'] = "error";
                    }
                }
            } else {

                $this->is_button_clicked = false;
                $data['message'] = 'There were some issue with the payment. Please try again later.';
                $data['status'] = "error";

                $tresponse = $response->getTransactionResponse();

                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $data['message'] = $tresponse->getErrors()[0]->getErrorText();
                    $data['status'] = "error";
                } else {
                    $data['message'] = $response->getMessages()->getMessage()[0]->getText();
                    $data['status'] = "error";
                }
            }
        } else {
            $this->is_button_clicked = false;
            $data['message'] = "No response returned";
            $data['status'] = "error";
        }

        $this->emit('hidePaymentModal', $data);
    }

    public function payValidation(): array
    {
        return [
            'pay_amount' => ['required'],
            //'card_number' => ['required', 'min:15', 'max:19'],
            //'card_cvv' => ['required', 'min:3', 'max:4'],
            //'card_exp_mm' => ['required'],
            //'card_exp_yy' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'billing_address' => ['required'],
            'billing_city' => ['required'],
            'billing_state' => ['required'],
            'billing_zip_code' => ['required'],

            'card_number' => ['required', new CardNumber],
            'card_exp_yy' => ['required', new CardExpirationYear($this->card_exp_mm)],
            'card_exp_mm' => ['required', new CardExpirationMonth($this->card_exp_yy)],
            'card_cvv' => ['required', new CardCvc($this->card_number)]
        ];
    }

    public function handleOnLinePay($input)
    {
        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(config('app.merchant_login_id'));
        $merchantAuthentication->setTransactionKey(config('app.merchant_transaction_key'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['card_number']);

        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['card_exp_yy'] . "-" . $input['card_exp_mm']);
        $creditCard->setCardCode($input['card_cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create order information
        $invoice_number = "AppFee_" . Auth::guard('customer')->user()->id;
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($invoice_number);
        $order->setDescription("Payment For Admission Application Submit");

        // Set the customer's Bill To address
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($input['first_name']);
        $customerAddress->setLastName($input['last_name']);
        //$customerAddress->setEmail($input['email']);
        //$customerAddress->setCompany("Souveniropolis");
        $customerAddress->setAddress($input['billing_address']);
        $customerAddress->setCity($input['billing_city']);
        $customerAddress->setState($input['billing_state']);
        $customerAddress->setZip($input['billing_zip_code']);
        $customerAddress->setCountry("USA");

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['pay_amount']);
        $transactionRequestType->setOrder($order);
        $transactionRequestType->setPayment($paymentOne);
        $transactionRequestType->setBillTo($customerAddress);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $server = config('app.env');
        if ($server == 'production') {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        } else {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        }
        return $response;
    }

    public function hideModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->clear();
        $this->emit('hidePayment');
    }

    public function clear()
    {
        $this->card_number = '';
        $this->card_cvv = '';
        $this->card_exp_mm = '';
        $this->card_exp_yy = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->billing_address = '';
        $this->billing_city = '';
        $this->billing_state = '';
        $this->billing_zip_code = '';
    }
}
