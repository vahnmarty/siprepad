<?php

namespace App\Http\Livewire\Admin\Application;

use App\Helpers\ApplicationConstHelper;
use App\Models\AddressInformation;
use App\Models\LegacyInformation;
use App\Models\ParentInformation;
use App\Models\ParentStatement;
use App\Models\SiblingInformation;
use App\Models\StudentInformation;
use Livewire\Component;
use App\Models\IdentifyRacially;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\Promocode;
use App\Models\ReleaseAuthorization;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\Spirituality;
use App\Models\StudentStatement;
use App\Models\WritingSample;

class Show extends Component
{
    public $studentInfo = [], $addressInfo = [], $parentInfo = [], $siblingInfo = [], $legacyInfo = [];
    public $parentStatement = [], $spiritualCommunityInfo = [], $studentStatementInfo = [], $writingSample = [], $releaseAuthorization = [];
    public $identifyRacially = [], $applicationId, $user, $promoCodes = [], $promo_code, $paymentLog;


    public function mount($application = null)
    {
        $profile_id = $application->Profile_ID;
        $this->user = Profile::where('id', $profile_id)->first();
        //dd($this->user);
        $application_id = $application->Application_ID;
        $this->applicationId = $application_id;
        //Step 1
        $this->studentInfo = $this->getStudentInfo($application_id, $profile_id);
        //dd($this->studentInfo);

        //Step 2
        $this->addressInfo = $this->getAddressInfo($application_id, $profile_id);
        //dd($this->addressInfo);

        //Step 3
        $this->parentInfo = $this->getParentInfo($application_id, $profile_id);
        //dd($this->parentInfo);

        //Step 4
        $this->siblingInfo = $this->getSiblingInfo($application_id, $profile_id);
        //dd($this->siblingInfo);

        //Step 5
        $this->legacyInfo = $this->getLegacyInfo($application_id, $profile_id);
        //dd($this->legacyInfo);

        //Step 6
        $this->parentStatement = $this->getParentStatement($application_id, $profile_id);
        //dd($this->parentStatement);

        //Step 7
        $this->spiritualCommunityInfo = $this->getSpiritualCommunityInfo($application_id, $profile_id);
        //dd($this->spiritualCommunityInfo);

        //Step 8
        $this->studentStatementInfo = $this->getStudentStatementInfo($application_id, $profile_id);
        //dd($this->studentStatementInfo);

        //Step 9
        $this->writingSample = $this->getWritingSample($application_id, $profile_id);
        //dd($this->writingSample);

        //Step 10
        $this->releaseAuthorization = $this->getReleaseAuthorization($application_id, $profile_id);
        //dd($this->releaseAuthorization);

        $this->identifyRacially = IdentifyRacially::get()->toArray();

        $this->promoCodes = Promocode::get();

        $this->paymentLog = Payment::where('user_id', $this->user->id)->where('application_id', $this->applicationId)->first();
    }
    public function render()
    {
        return view('livewire.admin.application.show');
    }

    public function applyPromoCode()
    {
        $this->validate($this->payValidation());

        $getPromo = Promocode::where('promo_code', $this->promo_code)->first();
        if ($getPromo) {

            $getReleaseAuthorization = ReleaseAuthorization::where('Profile_ID', $this->user->id)->where('Application_ID', $this->applicationId)->first();
            $getPaymentLog = Payment::where('user_id', $this->user->id)->where('application_id', $this->applicationId)->first();
            if ($getPaymentLog) {
                if (count($this->studentInfo) == 1) {
                    // $getReleaseAuthorization->update([
                    //     'S1_Promo_Code_Applied' => $this->promo_code
                    // ]);
                    $getPaymentLog->update([
                        'promo_code' => $this->promo_code,
                        'promo_amount' => $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 1
                    ]);
                } else if (count($this->studentInfo) == 2) {
                    // $getReleaseAuthorization->update([
                    //     'S1_Promo_Code_Applied' => $this->promo_code,
                    //     'S2_Promo_Code_Applied' => $this->promo_code
                    // ]);
                    $getPaymentLog->update([
                        'promo_code' => $this->promo_code,
                        'promo_amount' => $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 2
                    ]);
                } else if (count($this->studentInfo) == 3) {
                    // $getReleaseAuthorization->update([
                    //     'S1_Promo_Code_Applied' => $this->promo_code,
                    //     'S2_Promo_Code_Applied' => $this->promo_code,
                    //     'S3_Promo_Code_Applied' => $this->promo_code
                    // ]);
                    $getPaymentLog->update([
                        'promo_code' => $this->promo_code,
                        'promo_amount' =>  $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 3
                    ]);
                }
            } else {
                if (count($this->studentInfo) == 1) {
                    Payment::create([
                        'user_id' => $this->user->id,
                        'application_id' => $this->applicationId,
                        'amount' => 100,
                        'quantity' => 1,
                        'promo_code' => $this->promo_code,
                        'promo_amount' => $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 1
                    ]);
                } else if (count($this->studentInfo) == 2) {
                    Payment::create([
                        'user_id' => $this->user->id,
                        'application_id' => $this->applicationId,
                        'amount' => 200,
                        'quantity' => 1,
                        'promo_code' => $this->promo_code,
                        'promo_amount' => $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 2
                    ]);
                } else if (count($this->studentInfo) == 3) {
                    Payment::create([
                        'user_id' => $this->user->id,
                        'application_id' => $this->applicationId,
                        'amount' => 300,
                        'quantity' => 1,
                        'promo_code' => $this->promo_code,
                        'promo_amount' => $getPromo->discount_amount,
                        'final_amount' => $getPromo->discount_amount * 3
                    ]);
                }
            }

            $data['message'] = "Promo code applied successfully";
            $data['status'] = "success";
            $this->emit('hidePromoCodeModal', $data);
        } else {
            $data['message'] = "Promo code applied error!";
            $data['status'] = "error";
            $this->emit('hidePromoCodeModal', $data);
        }
    }

    public function hideModal()
    {
        $this->emit('hidePromoModal');
    }

    public function payValidation(): array
    {
        return [
            'promo_code' => ['required'],
        ];
    }



    //Step 1
    public function getStudentInfo($application_id, $profile_id)
    {
        $studentInfo = [];

        $getStudentInfo = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();

        if ($getStudentInfo) {

            $getS1Racially = [];
            if ($getStudentInfo->S1_Race) {
                $getS1Racially = ApplicationConstHelper::getRacially($getStudentInfo->S1_Race);
            }
            $getS2Racially = [];
            if ($getStudentInfo->S2_Race) {
                $getS2Racially = ApplicationConstHelper::getRacially($getStudentInfo->S2_Race);
            }
            $getS3Racially = [];
            if ($getStudentInfo->S3_Race) {
                $getS3Racially = ApplicationConstHelper::getRacially($getStudentInfo->S3_Race);
            }

            $student1 = [
                "Photo" => $getStudentInfo->S1_Photo,
                "First_Name" => $getStudentInfo->S1_First_Name,
                "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                "Last_Name" =>  $getStudentInfo->S1_Last_Name,
                "Suffix" =>  $getStudentInfo->S1_Suffix,
                "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                "Birthdate" =>  $getStudentInfo->S1_Birthdate,
                "Gender" =>  $getStudentInfo->S1_Gender,
                "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                "Race" => $getS1Racially,
                "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                "Current_School" =>  $getStudentInfo->S1_Current_School,
                "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4
            ];

            $student2 = [
                "Photo" =>  $getStudentInfo->S2_Photo,
                "First_Name" => $getStudentInfo->S2_First_Name,
                "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                "Last_Name" =>  $getStudentInfo->S2_Last_Name,
                "Suffix" =>  $getStudentInfo->S2_Suffix,
                "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                "Birthdate" =>  $getStudentInfo->S2_Birthdate,
                "Gender" =>  $getStudentInfo->S2_Gender,
                "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                "Race" =>  $getS2Racially,
                "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                "Current_School" =>  $getStudentInfo->S2_Current_School,
                "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4
            ];

            $student3 = [
                "Photo" =>  $getStudentInfo->S3_Photo,
                "First_Name" => $getStudentInfo->S3_First_Name,
                "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                "Last_Name" =>  $getStudentInfo->S3_Last_Name,
                "Suffix" =>  $getStudentInfo->S3_Suffix,
                "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                "Birthdate" =>  $getStudentInfo->S3_Birthdate,
                "Gender" =>  $getStudentInfo->S3_Gender,
                "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                "Race" =>  $getS3Racially,
                "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                "Current_School" =>  $getStudentInfo->S3_Current_School,
                "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4
            ];

            $studentArr[] = $getStudentInfo['S1_First_Name'] ? $student1 : null;
            $studentArr[] = $getStudentInfo['S2_First_Name'] ? $student2 : null;
            $studentArr[] = $getStudentInfo['S3_First_Name'] ? $student3 : null;
            //dd($studentArr);
            foreach ($studentArr as $student) {
                if (!is_null($student)) {
                    array_push($studentInfo, $student);
                }
            }
        }
        return $studentInfo;
    }

    //Step 2
    public function getAddressInfo($application_id, $profile_id)
    {
        $addressInfo = [];
        $getAddressInfo = AddressInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();

        if ($getAddressInfo) {

            $arr1 = [
                "Address_Type" => $getAddressInfo->Address_Type_1,
                "Country" => $getAddressInfo->Country_1,
                "Address" =>  $getAddressInfo->Address_1,
                "City" =>  $getAddressInfo->City_1,
                "State" =>  $getAddressInfo->State_1,
                "Zipcode" =>  $getAddressInfo->Zipcode_1,
                "Address_Phone" =>  $getAddressInfo->Address_Phone_1
            ];

            $arr2 = [
                "Address_Type" => $getAddressInfo->Address_Type_2,
                "Country" => $getAddressInfo->Country_2,
                "Address" =>  $getAddressInfo->Address_2,
                "City" =>  $getAddressInfo->City_2,
                "State" =>  $getAddressInfo->State_2,
                "Zipcode" =>  $getAddressInfo->Zipcode_2,
                "Address_Phone" =>  $getAddressInfo->Address_Phone_2
            ];
            $arr3 = [
                "Address_Type" => $getAddressInfo->Address_Type_3,
                "Country" => $getAddressInfo->Country_3,
                "Address" =>  $getAddressInfo->Address_3,
                "City" =>  $getAddressInfo->City_3,
                "State" =>  $getAddressInfo->State_3,
                "Zipcode" =>  $getAddressInfo->Zipcode_3,
                "Address_Phone" =>  $getAddressInfo->Address_Phone_3
            ];
            $arr4 = [
                "Address_Type" => $getAddressInfo->Address_Type_4,
                "Country" => $getAddressInfo->Country_4,
                "Address" =>  $getAddressInfo->Address_4,
                "City" =>  $getAddressInfo->City_4,
                "State" =>  $getAddressInfo->State_4,
                "Zipcode" =>  $getAddressInfo->Zipcode_4,
                "Address_Phone" =>  $getAddressInfo->Address_Phone_4
            ];

            $address[] = $getAddressInfo['Address_1'] || $getAddressInfo['State_1'] || $getAddressInfo['Zipcode_1'] ? $arr1 : null;
            $address[] = $getAddressInfo['Address_2'] || $getAddressInfo['State_2'] || $getAddressInfo['Zipcode_2'] ? $arr2 : null;
            $address[] = $getAddressInfo['Address_3'] || $getAddressInfo['State_3'] || $getAddressInfo['Zipcode_3'] ? $arr3 : null;
            $address[] = $getAddressInfo['Address_4'] || $getAddressInfo['State_4'] || $getAddressInfo['Zipcode_4'] ? $arr4 : null;
            foreach ($address as $value) {
                if (!is_null($value)) {
                    array_push($addressInfo, $value);
                }
            }
        }
        return $addressInfo;
    }

    //Step 3
    public function getParentInfo($application_id, $profile_id)
    {
        $parentInfo = [];
        $getParentInfo = ParentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        if ($getParentInfo) {
            $arr1 = [
                "Relationship" => $getParentInfo->P1_Relationship,
                "Salutation" => $getParentInfo->P1_Salutation,
                "First_Name" => $getParentInfo->P1_First_Name,
                "Middle_Name" => $getParentInfo->P1_Middle_Name,
                "Last_Name" => $getParentInfo->P1_Last_Name,
                "Suffix" => $getParentInfo->P1_Suffix,
                "Address_Type" => $getParentInfo->P1_Address_Type,
                "Mobile_Phone" => $getParentInfo->P1_Mobile_Phone,
                "Personal_Email" => $getParentInfo->P1_Personal_Email,
                "Employer" => $getParentInfo->P1_Employer,
                "Title" => $getParentInfo->P1_Title,
                "Work_Email" => $getParentInfo->P1_Work_Email,
                "Work_Phone" => $getParentInfo->P1_Work_Phone,
                "Work_Phone_Ext" => $getParentInfo->P1_Work_Phone_Ext,
                "Schools" => $getParentInfo->P1_Schools,
                "Living_Situation" => $getParentInfo->P1_Living_Situation,
                "Status" => $getParentInfo->P1_Status,
            ];

            $arr2 = [
                "Relationship" => $getParentInfo->P2_Relationship,
                "Salutation" => $getParentInfo->P2_Salutation,
                "First_Name" => $getParentInfo->P2_First_Name,
                "Middle_Name" => $getParentInfo->P2_Middle_Name,
                "Last_Name" => $getParentInfo->P2_Last_Name,
                "Suffix" => $getParentInfo->P2_Suffix,
                "Address_Type" => $getParentInfo->P2_Address_Type,
                "Mobile_Phone" => $getParentInfo->P2_Mobile_Phone,
                "Personal_Email" => $getParentInfo->P2_Personal_Email,
                "Employer" => $getParentInfo->P2_Employer,
                "Title" => $getParentInfo->P2_Title,
                "Work_Email" => $getParentInfo->P2_Work_Email,
                "Work_Phone" => $getParentInfo->P2_Work_Phone,
                "Work_Phone_Ext" => $getParentInfo->P2_Work_Phone_Ext,
                "Schools" => $getParentInfo->P2_Schools,
                "Living_Situation" => $getParentInfo->P2_Living_Situation,
                "Status" => $getParentInfo->P2_Status,
            ];

            $arr3 = [
                "Relationship" => $getParentInfo->P3_Relationship,
                "Salutation" => $getParentInfo->P3_Salutation,
                "First_Name" => $getParentInfo->P3_First_Name,
                "Middle_Name" => $getParentInfo->P3_Middle_Name,
                "Last_Name" => $getParentInfo->P3_Last_Name,
                "Suffix" => $getParentInfo->P3_Suffix,
                "Address_Type" => $getParentInfo->P3_Address_Type,
                "Mobile_Phone" => $getParentInfo->P3_Mobile_Phone,
                "Personal_Email" => $getParentInfo->P3_Personal_Email,
                "Employer" => $getParentInfo->P3_Employer,
                "Title" => $getParentInfo->P3_Title,
                "Work_Email" => $getParentInfo->P3_Work_Email,
                "Work_Phone" => $getParentInfo->P3_Work_Phone,
                "Work_Phone_Ext" => $getParentInfo->P3_Work_Phone_Ext,
                "Schools" => $getParentInfo->P3_Schools,
                "Living_Situation" => $getParentInfo->P3_Living_Situation,
                "Status" => $getParentInfo->P3_Status,
            ];

            $arr4 = [
                "Relationship" => $getParentInfo->P4_Relationship,
                "Salutation" => $getParentInfo->P4_Salutation,
                "First_Name" => $getParentInfo->P4_First_Name,
                "Middle_Name" => $getParentInfo->P4_Middle_Name,
                "Last_Name" => $getParentInfo->P4_Last_Name,
                "Suffix" => $getParentInfo->P4_Suffix,
                "Address_Type" => $getParentInfo->P4_Address_Type,
                "Mobile_Phone" => $getParentInfo->P4_Mobile_Phone,
                "Personal_Email" => $getParentInfo->P4_Personal_Email,
                "Employer" => $getParentInfo->P4_Employer,
                "Title" => $getParentInfo->P4_Title,
                "Work_Email" => $getParentInfo->P4_Work_Email,
                "Work_Phone" => $getParentInfo->P4_Work_Phone,
                "Work_Phone_Ext" => $getParentInfo->P4_Work_Phone_Ext,
                "Schools" => $getParentInfo->P4_Schools,
                "Living_Situation" => $getParentInfo->P4_Living_Situation,
                "Status" => $getParentInfo->P4_Status,
            ];

            $parentArr[] = $getParentInfo['P1_Relationship'] ? $arr1 : null;
            $parentArr[] = $getParentInfo['P2_Relationship'] ? $arr2 : null;
            $parentArr[] = $getParentInfo['P3_Relationship'] ? $arr3 : null;
            $parentArr[] = $getParentInfo['P4_Relationship'] ? $arr4 : null;
            //dd($address);
            foreach ($parentArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($parentInfo, $value);
                }
            }
        }
        return $parentInfo;
    }

    //Step 4
    public function getSiblingInfo($application_id, $profile_id)
    {
        $siblingInfo = [];
        $getSiblingInfo = SiblingInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        if ($getSiblingInfo) {
            $arr1 = [
                'First_Name' => $getSiblingInfo->SIB01_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB01_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB01_Last_Name,
                'Suffix' => $getSiblingInfo->SIB01_Suffix,
                'Relationship' => $getSiblingInfo->SIB01_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB01_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB01_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB01_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB01_HS_Graduation_Year
            ];

            $arr2 = [
                'First_Name' => $getSiblingInfo->SIB02_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB02_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB02_Last_Name,
                'Suffix' => $getSiblingInfo->SIB02_Suffix,
                'Relationship' => $getSiblingInfo->SIB02_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB02_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB02_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB02_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB02_HS_Graduation_Year
            ];

            $arr3 = [
                'First_Name' => $getSiblingInfo->SIB03_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB03_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB03_Last_Name,
                'Suffix' => $getSiblingInfo->SIB03_Suffix,
                'Relationship' => $getSiblingInfo->SIB03_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB03_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB03_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB03_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB03_HS_Graduation_Year
            ];

            $arr4 = [
                'First_Name' => $getSiblingInfo->SIB04_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB04_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB04_Last_Name,
                'Suffix' => $getSiblingInfo->SIB04_Suffix,
                'Relationship' => $getSiblingInfo->SIB04_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB04_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB04_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB04_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB04_HS_Graduation_Year
            ];

            $arr5 = [
                'First_Name' => $getSiblingInfo->SIB05_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB05_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB05_Last_Name,
                'Suffix' => $getSiblingInfo->SIB05_Suffix,
                'Relationship' => $getSiblingInfo->SIB05_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB05_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB05_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB05_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB05_HS_Graduation_Year
            ];

            $arr6 = [
                'First_Name' => $getSiblingInfo->SIB06_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB06_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB06_Last_Name,
                'Suffix' => $getSiblingInfo->SIB06_Suffix,
                'Relationship' => $getSiblingInfo->SIB06_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB06_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB06_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB06_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB06_HS_Graduation_Year
            ];

            $arr7 = [
                'First_Name' => $getSiblingInfo->SIB07_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB07_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB07_Last_Name,
                'Suffix' => $getSiblingInfo->SIB07_Suffix,
                'Relationship' => $getSiblingInfo->SIB07_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB07_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB07_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB07_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB07_HS_Graduation_Year
            ];

            $arr8 = [
                'First_Name' => $getSiblingInfo->SIB08_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB08_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB08_Last_Name,
                'Suffix' => $getSiblingInfo->SIB08_Suffix,
                'Relationship' => $getSiblingInfo->SIB08_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB08_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB08_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB08_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB08_HS_Graduation_Year
            ];

            $arr9 = [
                'First_Name' => $getSiblingInfo->SIB09_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB09_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB09_Last_Name,
                'Suffix' => $getSiblingInfo->SIB09_Suffix,
                'Relationship' => $getSiblingInfo->SIB09_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB09_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB09_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB09_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB09_HS_Graduation_Year
            ];

            $arr10 = [
                'First_Name' => $getSiblingInfo->SIB10_First_Name,
                'Middle_Name' => $getSiblingInfo->SIB10_Middle_Name,
                'Last_Name' => $getSiblingInfo->SIB10_Last_Name,
                'Suffix' => $getSiblingInfo->SIB10_Suffix,
                'Relationship' => $getSiblingInfo->SIB10_Relationship,
                'Current_Grade' => $getSiblingInfo->SIB10_Current_Grade,
                'Current_School' => $getSiblingInfo->SIB10_Current_School,
                'Current_School_Not_Listed' => $getSiblingInfo->SIB10_Current_School_Not_Listed,
                'HS_Graduation_Year' => $getSiblingInfo->SIB10_HS_Graduation_Year
            ];

            $siblingInfoArr[] =  $getSiblingInfo['SIB01_First_Name'] || $getSiblingInfo['SIB01_Last_Name'] || $getSiblingInfo['SIB01_Relationship'] ? $arr1 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB02_First_Name'] || $getSiblingInfo['SIB02_Last_Name'] || $getSiblingInfo['SIB02_Relationship'] ? $arr2 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB03_First_Name'] || $getSiblingInfo['SIB03_Last_Name'] || $getSiblingInfo['SIB03_Relationship'] ? $arr3 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB04_First_Name'] || $getSiblingInfo['SIB04_Last_Name'] || $getSiblingInfo['SIB04_Relationship'] ? $arr4 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB05_First_Name'] || $getSiblingInfo['SIB05_Last_Name'] || $getSiblingInfo['SIB05_Relationship'] ? $arr5 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB06_First_Name'] || $getSiblingInfo['SIB06_Last_Name'] || $getSiblingInfo['SIB06_Relationship'] ? $arr6 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB07_First_Name'] || $getSiblingInfo['SIB07_Last_Name'] || $getSiblingInfo['SIB07_Relationship'] ? $arr7 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB08_First_Name'] || $getSiblingInfo['SIB08_Last_Name'] || $getSiblingInfo['SIB08_Relationship'] ? $arr8 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB09_First_Name'] || $getSiblingInfo['SIB09_Last_Name'] || $getSiblingInfo['SIB09_Relationship'] ? $arr9 : null;
            $siblingInfoArr[] =  $getSiblingInfo['SIB10_First_Name'] || $getSiblingInfo['SIB10_Last_Name'] || $getSiblingInfo['SIB10_Relationship'] ? $arr10 : null;

            //dd($siblingInfoArr);
            foreach ($siblingInfoArr as $value) {
                if (!is_null($value)) {
                    array_push($siblingInfo, $value);
                }
            }
        }

        return $siblingInfo;
    }

    //Step 5
    public function getLegacyInfo($application_id, $profile_id)
    {
        $legacyInfo = [];
        $getLegacyInfo = LegacyInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        if ($getLegacyInfo) {
            $arr1 = [
                'First_Name' => $getLegacyInfo->L1_First_Name,
                'Last_Name' => $getLegacyInfo->L1_Last_Name,
                'Relationship' => $getLegacyInfo->L1_Relationship,
                'Graduation_Year' => $getLegacyInfo->L1_Graduation_Year
            ];

            $arr2 = [
                'First_Name' => $getLegacyInfo->L2_First_Name,
                'Last_Name' => $getLegacyInfo->L2_Last_Name,
                'Relationship' => $getLegacyInfo->L2_Relationship,
                'Graduation_Year' => $getLegacyInfo->L2_Graduation_Year
            ];

            $arr3 = [
                'First_Name' => $getLegacyInfo->L3_First_Name,
                'Last_Name' => $getLegacyInfo->L3_Last_Name,
                'Relationship' => $getLegacyInfo->L3_Relationship,
                'Graduation_Year' => $getLegacyInfo->L3_Graduation_Year
            ];

            $arr4 = [
                'First_Name' => $getLegacyInfo->L4_First_Name,
                'Last_Name' => $getLegacyInfo->L4_Last_Name,
                'Relationship' => $getLegacyInfo->L4_Relationship,
                'Graduation_Year' => $getLegacyInfo->L4_Graduation_Year
            ];

            $arr5 = [
                'First_Name' => $getLegacyInfo->L5_First_Name,
                'Last_Name' => $getLegacyInfo->L5_Last_Name,
                'Relationship' => $getLegacyInfo->L5_Relationship,
                'Graduation_Year' => $getLegacyInfo->L5_Graduation_Year
            ];

            $legacyInfoArr[] =  $getLegacyInfo['L1_First_Name'] || $getLegacyInfo['L1_Last_Name'] || $getLegacyInfo['L1_Relationship'] ? $arr1 : null;
            $legacyInfoArr[] =  $getLegacyInfo['L2_First_Name'] || $getLegacyInfo['L2_Last_Name'] || $getLegacyInfo['L2_Relationship'] ? $arr2 : null;
            $legacyInfoArr[] =  $getLegacyInfo['L3_First_Name'] || $getLegacyInfo['L3_Last_Name'] || $getLegacyInfo['L3_Relationship'] ? $arr3 : null;
            $legacyInfoArr[] =  $getLegacyInfo['L4_First_Name'] || $getLegacyInfo['L4_Last_Name'] || $getLegacyInfo['L4_Relationship'] ? $arr4 : null;
            $legacyInfoArr[] =  $getLegacyInfo['L5_First_Name'] || $getLegacyInfo['L5_Last_Name'] || $getLegacyInfo['L5_Relationship'] ? $arr5 : null;

            //dd($legacyInfoArr);
            foreach ($legacyInfoArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($legacyInfo, $value);
                }
            }
        }
        return $legacyInfo;
    }

    //Step 6
    public function getParentStatement($application_id, $profile_id)
    {
        $parentStatement = [];

        $getParentStatement = ParentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        if ($getParentStatement) {
            $student = [];
            $getStudent = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first()->toArray();

            $student1 = [
                "Endearing_Quality_and_Growth" => $getParentStatement->S1_Endearing_Quality_and_Growth,
                "About_Child_Not_on_App" => $getParentStatement->S1_About_Child_Not_on_App,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];

            $student2 = [
                "Endearing_Quality_and_Growth" => $getParentStatement->S2_Endearing_Quality_and_Growth,
                "About_Child_Not_on_App" => $getParentStatement->S2_About_Child_Not_on_App,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];

            $student3 = [
                "Endearing_Quality_and_Growth" => $getParentStatement->S3_Endearing_Quality_and_Growth,
                "About_Child_Not_on_App" => $getParentStatement->S3_About_Child_Not_on_App,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $getParentArr[] = $getParentStatement['S1_Endearing_Quality_and_Growth'] ? $student1 : null;
            $getParentArr[] = $getParentStatement['S2_Endearing_Quality_and_Growth'] ? $student2 : null;
            $getParentArr[] = $getParentStatement['S3_Endearing_Quality_and_Growth'] ? $student3 : null;


            foreach ($getParentArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($student, $value);
                }
            }

            $parentStatement['Students'] = $student;
            $parentStatement['Why_SI_for_Child'] = $getParentStatement->Why_SI_for_Child;
            $parentStatement['Parent_Statement_Submitted_By'] = $getParentStatement->Parent_Statement_Submitted_By;
            $parentStatement['Parent_Statement_Relationship'] = $getParentStatement->Parent_Statement_Relationship;
            //dd($this->parentStatement']);

        }
        return $parentStatement;
    }

    //Step 7
    public function getSpiritualCommunityInfo($application_id, $profile_id)
    {
        $students = [];
        $getSpiritualCommunityInfo = SpiritualAndCommunityInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        if ($getSpiritualCommunityInfo) {
            $getStudent = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first()->toArray();

            $arr1 = [
                "Baptism_Year" => $getSpiritualCommunityInfo->S1_Baptism_Year,
                "Confirmation_Year" => $getSpiritualCommunityInfo->S1_Confirmation_Year,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

            ];
            $arr2 = [
                "Baptism_Year" => $getSpiritualCommunityInfo->S2_Baptism_Year,
                "Confirmation_Year" => $getSpiritualCommunityInfo->S2_Confirmation_Year,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

            ];
            $arr3 = [
                "Baptism_Year" => $getSpiritualCommunityInfo->S3_Baptism_Year,
                "Confirmation_Year" => $getSpiritualCommunityInfo->S3_Confirmation_Year,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

            ];
            $newArr[] = $getSpiritualCommunityInfo['S1_Baptism_Year'] ? $arr1 : null;
            $newArr[] = $getSpiritualCommunityInfo['S2_Baptism_Year'] ? $arr2 : null;
            $newArr[] = $getSpiritualCommunityInfo['S3_Baptism_Year'] ? $arr3 : null;


            foreach ($newArr as $value) {
                if (!is_null($value)) {
                    array_push($students, $value);
                }
            }

            $getNewArr = [];
            if ($getSpiritualCommunityInfo->Describe_Family_Spirituality) {
                $getNewArr = ApplicationConstHelper::getFamilySpirituality($getSpiritualCommunityInfo->Describe_Family_Spirituality);
            }

            $spiritualCommunityInfo = [
                'Applicant_Religion' => $getSpiritualCommunityInfo->Applicant_Religion,
                'Applicant_Religion_Other' => $getSpiritualCommunityInfo->Applicant_Religion_Other,
                'Church_Faith_Community' => $getSpiritualCommunityInfo->Church_Faith_Community,
                'Church_Faith_Community_Location' => $getSpiritualCommunityInfo->Church_Faith_Community_Location,
                'Students' => $students,
                'Impact_to_Community' => $getSpiritualCommunityInfo->Impact_to_Community,
                'Describe_Family_Spirituality' =>  $getNewArr,
                'Describe_Practice_in_Detail' => $getSpiritualCommunityInfo->Describe_Practice_in_Detail,
                'Religious_Studies_Classes' => $getSpiritualCommunityInfo->Religious_Studies_Classes,
                'Religious_Studies_Classes_Explanation' => $getSpiritualCommunityInfo->Religious_Studies_Classes_Explanation,
                'School_Liturgies' => $getSpiritualCommunityInfo->School_Liturgies,
                'School_Liturgies_Explanation' => $getSpiritualCommunityInfo->School_Liturgies_Explanation,
                'Retreats' => $getSpiritualCommunityInfo->Retreats,
                'Retreats_Explanation' => $getSpiritualCommunityInfo->Retreats_Explanation,
                'Community_Service' => $getSpiritualCommunityInfo->Community_Service,
                'Community_Service_Explanation' => $getSpiritualCommunityInfo->Community_Service_Explanation,
                'Religious_Form_Submitted_By' => $getSpiritualCommunityInfo->Religious_Form_Submitted_By,
                'Religious_Form_Relationship' => $getSpiritualCommunityInfo->Religious_Form_Relationship,
                'Religious_Form_Date' => $getSpiritualCommunityInfo->Religious_Form_Date
            ];

            // dd($this->spiritualCommunityInfo);
            return $spiritualCommunityInfo;
        }
        return [];
    }

    //Step 8
    public function getStudentStatementInfo($application_id, $profile_id)
    {
        $getStudentStatementInfo = StudentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();

        if ($getStudentStatementInfo) {
            $getStudent = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first()->toArray();

            $get_Students_Statement = [];
            $statement1 = [
                "Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S1_Why_did_you_decide_to_apply_to_SI,
                "Greatest_Challenge" => $getStudentStatementInfo->S1_Greatest_Challenge,
                "Religious_Activities_for_Growth" => $getStudentStatementInfo->S1_Religious_Activities_for_Growth,
                'Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S1_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $statement2 = [
                "Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S2_Why_did_you_decide_to_apply_to_SI,
                "Greatest_Challenge" => $getStudentStatementInfo->S2_Greatest_Challenge,
                "Religious_Activities_for_Growth" => $getStudentStatementInfo->S2_Religious_Activities_for_Growth,
                'Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S2_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $statement3 = [
                "Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S3_Why_did_you_decide_to_apply_to_SI,
                "Greatest_Challenge" => $getStudentStatementInfo->S3_Greatest_Challenge,
                "Religious_Activities_for_Growth" => $getStudentStatementInfo->S3_Religious_Activities_for_Growth,
                'Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S3_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $getStudentArr[] = $getStudentStatementInfo['S1_Why_did_you_decide_to_apply_to_SI'] ? $statement1 : null;
            $getStudentArr[] = $getStudentStatementInfo['S2_Why_did_you_decide_to_apply_to_SI'] ? $statement2 : null;
            $getStudentArr[] = $getStudentStatementInfo['S3_Why_did_you_decide_to_apply_to_SI'] ? $statement3 : null;
            foreach ($getStudentArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($get_Students_Statement, $arr);
                }
            }

            //Extracurricular Activities
            $get_Extracurricular_Activities = [];

            //Studnt One Activities
            $extracurricularActivitie1 = [
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name'],
                "Activity" => []
            ];

            $s1a1 = [
                "Activity_Name" => $getStudentStatementInfo->S1_A1_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S1_A1_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S1_A1_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S1_A1_Info_about_activity,
            ];

            $s1a2 = [
                "Activity_Name" => $getStudentStatementInfo->S1_A2_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S1_A2_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S1_A2_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S1_A2_Info_about_activity,
            ];
            $s1a3 = [
                "Activity_Name" => $getStudentStatementInfo->S1_A3_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S1_A3_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S1_A3_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S1_A3_Info_about_activity,
            ];
            $s1a4 = [
                "Activity_Name" => $getStudentStatementInfo->S1_A4_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S1_A4_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S1_A4_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S1_A4_Info_about_activity,
            ];

            $s1[] = $getStudentStatementInfo['S1_A1_Activity_Name'] ? $s1a1 : null;
            $s1[] = $getStudentStatementInfo['S1_A2_Activity_Name'] ? $s1a2 : null;
            $s1[] = $getStudentStatementInfo['S1_A3_Activity_Name'] ? $s1a3 : null;
            $s1[] = $getStudentStatementInfo['S1_A4_Activity_Name'] ? $s1a4 : null;

            foreach ($s1 as $arr) {
                if (!is_null($arr)) {
                    array_push($extracurricularActivitie1['Activity'], $arr);
                }
            }

            //Studnt Two Activities
            $extracurricularActivitie2 = [
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name'],
                "Activity" => []
            ];

            $s2a1 = [
                "Activity_Name" => $getStudentStatementInfo->S2_A1_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S2_A1_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S2_A1_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S2_A1_Info_about_activity,
            ];

            $s2a2 = [
                "Activity_Name" => $getStudentStatementInfo->S2_A2_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S2_A2_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S2_A2_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S2_A2_Info_about_activity,
            ];
            $s2a3 = [
                "Activity_Name" => $getStudentStatementInfo->S2_A3_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S2_A3_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S2_A3_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S2_A3_Info_about_activity,
            ];
            $s2a4 = [
                "Activity_Name" => $getStudentStatementInfo->S2_A4_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S2_A4_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S2_A4_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S2_A4_Info_about_activity,
            ];

            $s2[] = $getStudentStatementInfo['S2_A1_Activity_Name'] ? $s2a1 : null;
            $s2[] = $getStudentStatementInfo['S2_A2_Activity_Name'] ? $s2a2 : null;
            $s2[] = $getStudentStatementInfo['S2_A3_Activity_Name'] ? $s2a3 : null;
            $s2[] = $getStudentStatementInfo['S2_A4_Activity_Name'] ? $s2a4 : null;

            foreach ($s2 as $arr) {
                if (!is_null($arr)) {
                    array_push($extracurricularActivitie2['Activity'], $arr);
                }
            }

            //Studnt Three Activities
            $extracurricularActivitie3 = [
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name'],
                "Activity" => []
            ];

            $s3a1 = [
                "Activity_Name" => $getStudentStatementInfo->S3_A1_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S3_A1_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S3_A1_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S3_A1_Info_about_activity,
            ];

            $s3a2 = [
                "Activity_Name" => $getStudentStatementInfo->S3_A2_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S3_A2_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S3_A2_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S3_A2_Info_about_activity,
            ];
            $s3a3 = [
                "Activity_Name" => $getStudentStatementInfo->S3_A3_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S3_A3_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S3_A3_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S3_A3_Info_about_activity,
            ];
            $s3a4 = [
                "Activity_Name" => $getStudentStatementInfo->S3_A4_Activity_Name,
                "Number_of_Years" => $getStudentStatementInfo->S3_A4_Number_of_Years,
                "Hours_Per_Week" => $getStudentStatementInfo->S3_A4_Hours_Per_Week,
                "Info_about_activity" => $getStudentStatementInfo->S3_A4_Info_about_activity,
            ];

            $s3[] = $getStudentStatementInfo['S3_A1_Activity_Name'] ? $s3a1 : null;
            $s3[] = $getStudentStatementInfo['S3_A2_Activity_Name'] ? $s3a2 : null;
            $s3[] = $getStudentStatementInfo['S3_A3_Activity_Name'] ? $s3a3 : null;
            $s3[] = $getStudentStatementInfo['S3_A4_Activity_Name'] ? $s3a4 : null;

            foreach ($s3 as $arr) {
                if (!is_null($arr)) {
                    array_push($extracurricularActivitie3['Activity'], $arr);
                }
            }

            $getExtracurricularActivitiesArr[] = $getStudent['S1_First_Name'] ? $extracurricularActivitie1 : null;
            $getExtracurricularActivitiesArr[] = $getStudent['S2_First_Name'] ? $extracurricularActivitie2 : null;
            $getExtracurricularActivitiesArr[] = $getStudent['S3_First_Name'] ? $extracurricularActivitie3 : null;
            foreach ($getExtracurricularActivitiesArr as $arr) {
                if (!is_null($arr)) {
                    array_push($get_Extracurricular_Activities, $arr);
                }
            }

            //
            $get_Future_Activities = [];
            $futureActivitie1 = [
                "Most_Passionate_Activity" => $getStudentStatementInfo->S1_Most_Passionate_Activity,
                "Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S1_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $futureActivitie2 = [
                "Most_Passionate_Activity" => $getStudentStatementInfo->S2_Most_Passionate_Activity,
                "Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S2_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $futureActivitie3 = [
                "Most_Passionate_Activity" => $getStudentStatementInfo->S3_Most_Passionate_Activity,
                "Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S3_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];
            $getFutureActivitiesArr[] = $getStudentStatementInfo['S1_Most_Passionate_Activity'] ? $futureActivitie1 : null;
            $getFutureActivitiesArr[] = $getStudentStatementInfo['S2_Most_Passionate_Activity'] ? $futureActivitie2 : null;
            $getFutureActivitiesArr[] = $getStudentStatementInfo['S3_Most_Passionate_Activity'] ? $futureActivitie3 : null;
            foreach ($getFutureActivitiesArr as $arr) {
                if (!is_null($arr)) {
                    array_push($get_Future_Activities, $arr);
                }
            }

            //
            $studentStatementInfo = [
                'Students_Statement' => !empty($get_Students_Statement) ? $get_Students_Statement : [],
                'Extracurricular_Activities' => !empty($get_Extracurricular_Activities) ? $get_Extracurricular_Activities : [],
                'Future_Activities' => !empty($get_Future_Activities) ? $get_Future_Activities : []
            ];

            //dd($this->studentStatementInfo);

            return $studentStatementInfo;
        }
        return [];
    }

    //Step 9
    public function getWritingSample($application_id, $profile_id)
    {
        $writingSample = [];
        $getWritingSample = WritingSample::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();

        if ($getWritingSample) {
            $getStudent = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first()->toArray();

            $arr1 = [
                "Writing_Sample" => $getWritingSample->S1_Writing_Sample,
                "Writing_Sample_Submitted_By" => $getWritingSample->S1_Writing_Sample_Submitted_By,
                "Writing_Sample_Acknowledgment" => $getWritingSample->S1_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

            ];
            $arr2 = [
                "Writing_Sample" => $getWritingSample->S2_Writing_Sample,
                "Writing_Sample_Submitted_By" => $getWritingSample->S2_Writing_Sample_Submitted_By,
                "Writing_Sample_Acknowledgment" => $getWritingSample->S2_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

            ];
            $arr3 = [
                "Writing_Sample" => $getWritingSample->S3_Writing_Sample,
                "Writing_Sample_Submitted_By" => $getWritingSample->S3_Writing_Sample_Submitted_By,
                "Writing_Sample_Acknowledgment" => $getWritingSample->S3_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

            ];
            $newArr[] = $getWritingSample['S1_Writing_Sample'] ? $arr1 : null;
            $newArr[] = $getWritingSample['S2_Writing_Sample'] ? $arr2 : null;
            $newArr[] = $getWritingSample['S3_Writing_Sample'] ? $arr3 : null;

            foreach ($newArr as $value) {
                if (!is_null($value)) {
                    array_push($writingSample, $value);
                }
            }
        }
        // dd($writingSample);
        return $writingSample;
    }

    //Step 10
    public function getReleaseAuthorization($application_id, $profile_id)
    {
        $getReleaseAuthorization = ReleaseAuthorization::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first();
        $getPaymentLog = Payment::where('user_id', $profile_id)->where('application_id', $application_id)->first();
        // dd($getPaymentLog);

        if ($getReleaseAuthorization) {

            $getStudent = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application_id)->first()->toArray();

            $entranceExamInfo = [];

            $arr1 = [
                "Entrance_Exam_Reservation" => $getReleaseAuthorization->S1_Entrance_Exam_Reservation,
                "Other_Catholic_School_Name" => $getReleaseAuthorization->S1_Other_Catholic_School_Name,
                "Other_Catholic_School_Location" => $getReleaseAuthorization->S1_Other_Catholic_School_Location,
                "Other_Catholic_School_Date" => $getReleaseAuthorization->S1_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

            ];
            $arr2 = [
                "Entrance_Exam_Reservation" => $getReleaseAuthorization->S2_Entrance_Exam_Reservation,
                "Other_Catholic_School_Name" => $getReleaseAuthorization->S2_Other_Catholic_School_Name,
                "Other_Catholic_School_Location" => $getReleaseAuthorization->S2_Other_Catholic_School_Location,
                "Other_Catholic_School_Date" => $getReleaseAuthorization->S2_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

            ];
            $arr3 = [
                "Entrance_Exam_Reservation" => $getReleaseAuthorization->S3_Entrance_Exam_Reservation,
                "Other_Catholic_School_Name" => $getReleaseAuthorization->S3_Other_Catholic_School_Name,
                "Other_Catholic_School_Location" => $getReleaseAuthorization->S3_Other_Catholic_School_Location,
                "Other_Catholic_School_Date" => $getReleaseAuthorization->S3_Other_Catholic_School_Date,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

            ];

            $newArr[] = $getStudent['S1_First_Name'] != '' ? $arr1 : null;
            $newArr[] = $getStudent['S2_First_Name'] != '' ? $arr2 : null;
            $newArr[] = $getStudent['S3_First_Name'] != '' ? $arr3 : null;

            foreach ($newArr as $value) {
                if (!is_null($value)) {
                    array_push($entranceExamInfo, $value);
                }
            }

            $releaseAuthorization = [
                'EntranceExamInfo' => $entranceExamInfo,
                'Extrance_Exam_Date' => $getReleaseAuthorization->Extrance_Exam_Date,
                'Agree_to_release_record' => $getReleaseAuthorization->Agree_to_release_record,
                'Agree_to_record_is_true' => $getReleaseAuthorization->Agree_to_record_is_true,
                'Release_Date' => $getReleaseAuthorization->Release_Date,

                'S1_Promo_Code_Applied' => $getReleaseAuthorization->S1_Promo_Code_Applied,
                'S2_Promo_Code_Applied' => $getReleaseAuthorization->S2_Promo_Code_Applied,
                'S3_Promo_Code_Applied' => $getReleaseAuthorization->S3_Promo_Code_Applied,
                'S1_Application_Fee' => $getReleaseAuthorization->S1_Application_Fee,
                'S2_Application_Fee' => $getReleaseAuthorization->S2_Application_Fee,
                'S3_Application_Fee' => $getReleaseAuthorization->S3_Application_Fee,

                'Submission_Date' => $getReleaseAuthorization->Submission_Date,
                'Transaction_ID' => $getReleaseAuthorization->Transaction_ID,
                'Applying_for_Grade' => $getReleaseAuthorization->Applying_for_Grade,
                'Academic_Year_Applying_For' => $getReleaseAuthorization->Academic_Year_Applying_For,
                'Graduation_Year' => $getReleaseAuthorization->Graduation_Year,
                'Amount' => $getPaymentLog->amount ?? 0.00

            ];
            // dd($releaseAuthorization);
            return $releaseAuthorization;
        }
        return [];
    }
}
