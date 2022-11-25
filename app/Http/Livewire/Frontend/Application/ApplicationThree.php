<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Helpers\ApplicationConstHelper;
use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\AddressInformation;
use App\Models\Application;
use App\Models\Country;
use App\Models\IdentifyRacially;
use App\Models\LivingSituation;
use App\Models\MaritalStatus;
use App\Models\ParentInformation;
use App\Models\School;
use App\Models\StudentInformation;
use App\Rules\MaxWordsRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ApplicationThree extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $statusList = [], $identifyRacially = [],  $schoolList = [], $suffixList = [];
    public $countryList = [], $relationshipList = [], $salutationList = [], $addressList = [], $maritalStatusList = [], $livingSituationList = [];
    public  $isEdit = false,  $i = 1, $parentInfo_id, $application_id, $parentInfo = [], $studentInfo;

    public function mount($getParentInfo = null)
    {
        //dd($getParentInfo);
        if ($getParentInfo) {
            $this->parentInfo_id = $getParentInfo->id;
            $arr1 = [
                "Relationship" => $getParentInfo->P1_Relationship,
                "Salutation" => $getParentInfo->P1_Salutation,
                "First_Name" => $getParentInfo->P1_First_Name,
                "Middle_Name" => $getParentInfo->P1_Middle_Name,
                "Last_Name" => $getParentInfo->P1_Last_Name,
                "Suffix" => $getParentInfo->P1_Suffix,
                "Address_Type" => $getParentInfo->P1_Address_Type,
                //"Mobile_Phone" => $getParentInfo->P1_Mobile_Phone,
                "mobile_phone_number_one" => Str::substr($getParentInfo->P1_Mobile_Phone, 0, 3),
                "mobile_phone_number_two" =>  Str::substr($getParentInfo->P1_Mobile_Phone, 3, 3),
                "mobile_phone_number_three" =>  Str::substr($getParentInfo->P1_Mobile_Phone, 6, 4),
                "Personal_Email" => $getParentInfo->P1_Personal_Email,
                "Employer" => $getParentInfo->P1_Employer,
                "Title" => $getParentInfo->P1_Title,
                "Work_Email" => $getParentInfo->P1_Work_Email,
                //"Work_Phone" => $getParentInfo->P1_Work_Phone,
                "work_phone_number_one" => Str::substr($getParentInfo->P1_Work_Phone, 0, 3),
                "work_phone_number_two" =>  Str::substr($getParentInfo->P1_Work_Phone, 3, 3),
                "work_phone_number_three" =>  Str::substr($getParentInfo->P1_Work_Phone, 6, 4),
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
                //"Mobile_Phone" => $getParentInfo->P2_Mobile_Phone,
                "mobile_phone_number_one" => Str::substr($getParentInfo->P2_Mobile_Phone, 0, 3),
                "mobile_phone_number_two" =>  Str::substr($getParentInfo->P2_Mobile_Phone, 3, 3),
                "mobile_phone_number_three" =>  Str::substr($getParentInfo->P2_Mobile_Phone, 6, 4),
                "Personal_Email" => $getParentInfo->P2_Personal_Email,
                "Employer" => $getParentInfo->P2_Employer,
                "Title" => $getParentInfo->P2_Title,
                "Work_Email" => $getParentInfo->P2_Work_Email,
                //"Work_Phone" => $getParentInfo->P2_Work_Phone,
                "work_phone_number_one" => Str::substr($getParentInfo->P2_Work_Phone, 0, 3),
                "work_phone_number_two" =>  Str::substr($getParentInfo->P2_Work_Phone, 3, 3),
                "work_phone_number_three" =>  Str::substr($getParentInfo->P2_Work_Phone, 6, 4),
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
                //"Mobile_Phone" => $getParentInfo->P3_Mobile_Phone,
                "mobile_phone_number_one" => Str::substr($getParentInfo->P3_Mobile_Phone, 0, 3),
                "mobile_phone_number_two" =>  Str::substr($getParentInfo->P3_Mobile_Phone, 3, 3),
                "mobile_phone_number_three" =>  Str::substr($getParentInfo->P3_Mobile_Phone, 6, 4),
                "Personal_Email" => $getParentInfo->P3_Personal_Email,
                "Employer" => $getParentInfo->P3_Employer,
                "Title" => $getParentInfo->P3_Title,
                "Work_Email" => $getParentInfo->P3_Work_Email,
                //"Work_Phone" => $getParentInfo->P3_Work_Phone,
                "work_phone_number_one" => Str::substr($getParentInfo->P3_Work_Phone, 0, 3),
                "work_phone_number_two" =>  Str::substr($getParentInfo->P3_Work_Phone, 3, 3),
                "work_phone_number_three" =>  Str::substr($getParentInfo->P3_Work_Phone, 6, 4),
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
                //"Mobile_Phone" => $getParentInfo->P4_Mobile_Phone,
                "mobile_phone_number_one" => Str::substr($getParentInfo->P4_Mobile_Phone, 0, 3),
                "mobile_phone_number_two" =>  Str::substr($getParentInfo->P4_Mobile_Phone, 3, 3),
                "mobile_phone_number_three" =>  Str::substr($getParentInfo->P4_Mobile_Phone, 6, 4),
                "Personal_Email" => $getParentInfo->P4_Personal_Email,
                "Employer" => $getParentInfo->P4_Employer,
                "Title" => $getParentInfo->P4_Title,
                "Work_Email" => $getParentInfo->P4_Work_Email,
                //"Work_Phone" => $getParentInfo->P4_Work_Phone,
                "work_phone_number_one" => Str::substr($getParentInfo->P4_Work_Phone, 0, 3),
                "work_phone_number_two" =>  Str::substr($getParentInfo->P4_Work_Phone, 3, 3),
                "work_phone_number_three" =>  Str::substr($getParentInfo->P4_Work_Phone, 6, 4),
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
                    array_push($this->parentInfo, $value);
                }
            }
            //dd($this->parentInfo);
            $this->i = count($this->parentInfo);
            $this->isEdit = true;
        } else {

            $arr1 = [
                "Relationship" => '',
                "Salutation" => '',
                "First_Name" => '',
                "Middle_Name" => '',
                "Last_Name" => '',
                "Suffix" => '',
                "Address_Type" => '',
                //"Mobile_Phone" => '',
                "mobile_phone_number_one" => '',
                "mobile_phone_number_two" =>  '',
                "mobile_phone_number_three" =>  '',
                "Personal_Email" => '',
                "Employer" => '',
                "Title" => '',
                "Work_Email" => '',
                //"Work_Phone" => '',
                "work_phone_number_one" => '',
                "work_phone_number_two" =>  '',
                "work_phone_number_three" =>  '',
                "Work_Phone_Ext" => '',
                "Schools" => '',
                "Living_Situation" => '',
                "Status" => ''
            ];
            array_push($this->parentInfo, $arr1);
        }

        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $this->statusList = [
            ['value' => -1, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->identifyRacially = IdentifyRacially::get()->toArray();
        $this->schoolList = School::get()->toArray();
        $this->countryList = Country::get()->toArray();
        $addressArr = [];

        $getAddress = AddressInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $this->application_id)
            ->first();

        if ($getAddress) {
            $add1 = [
                "name" => $getAddress->Address_Type_1,
            ];
            $add2 = [
                "name" => $getAddress->Address_Type_2,
            ];
            $add3 = [
                "name" => $getAddress->Address_Type_3,
            ];
            $add4 = [
                "name" => $getAddress->Address_Type_4,
            ];
            $addressArr[] = $getAddress->Country_1 ? $add1 : null;
            $addressArr[] = $getAddress->Country_2 ? $add2 : null;
            $addressArr[] = $getAddress->Country_3 ? $add3 : null;
            $addressArr[] = $getAddress->Country_4 ? $add4 : null;

            foreach ($addressArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($this->addressList, $arr);
                }
            }
        } else {
            $add = [
                "name" => 'Primary Address',
            ];
            array_push($this->addressList, $add);
        }

        $this->maritalStatusList = MaritalStatus::get()->toArray();
        $this->livingSituationList = LivingSituation::get()->toArray();
        $this->suffixList = ApplicationConstHelper::suffixList();
        $this->relationshipList = ApplicationConstHelper::relationshipList();
        $this->salutationList = ApplicationConstHelper::salutationList();
    }

    public function add($i)
    {
        $this->i += 1;
        $arr = [
            "Relationship" => '',
            "Salutation" => '',
            "First_Name" => '',
            "Middle_Name" => '',
            "Last_Name" => '',
            "Suffix" => '',
            "Address_Type" => '',
            //"Mobile_Phone" => '',
            "mobile_phone_number_one" => '',
            "mobile_phone_number_two" =>  '',
            "mobile_phone_number_three" =>  '',
            "Personal_Email" => '',
            "Employer" => '',
            "Title" => '',
            "Work_Email" => '',
            //"Work_Phone" => '',
            "work_phone_number_one" => '',
            "work_phone_number_two" =>  '',
            "work_phone_number_three" =>  '',
            "Work_Phone_Ext" => '',
            "Schools" => '',
            "Living_Situation" => '',
            "Status" => ''
        ];
        array_push($this->parentInfo, $arr);
    }

    public function remove($i)
    {
        $this->i -= 1;
        unset($this->parentInfo[$i]);
        $this->parentInfo = array_values($this->parentInfo);
    }

    public function saveOrUpdate()
    {
        foreach (array_values($this->parentInfo) as $key => $item) {
            $this->parentInfo[$key]['Mobile_Phone'] = $item['mobile_phone_number_one'] . $item['mobile_phone_number_two'] . $item['mobile_phone_number_three'];
            $this->parentInfo[$key]['Work_Phone'] = $item['work_phone_number_one'] . $item['work_phone_number_two'] . $item['work_phone_number_three'];
        }
        $this->validate($this->parentInfoValidation());
        //dd($this->parentInfo);
        $new_arr = [];
        foreach (array_values($this->parentInfo) as $key => $value) {
            $arr = [
                'P' . ($key + 1) . '_Relationship' => $value['Relationship'],
                'P' . ($key + 1) . '_Salutation' => $value['Salutation'],
                'P' . ($key + 1) . '_First_Name' => $value['First_Name'],
                'P' . ($key + 1) . '_Middle_Name' => $value['Middle_Name'],
                'P' . ($key + 1) . '_Last_Name' => $value['Last_Name'],
                'P' . ($key + 1) . '_Suffix' => $value['Suffix'],
                'P' . ($key + 1) . '_Address_Type' => $value['Address_Type'],
                'P' . ($key + 1) . '_Mobile_Phone' => $value['Mobile_Phone'],
                'P' . ($key + 1) . '_Personal_Email' => $value['Personal_Email'],
                'P' . ($key + 1) . '_Employer' => $value['Employer'],
                'P' . ($key + 1) . '_Title' => $value['Title'],
                'P' . ($key + 1) . '_Work_Email' => $value['Work_Email'],
                'P' . ($key + 1) . '_Work_Phone' => $value['Work_Phone'],
                'P' . ($key + 1) . '_Work_Phone_Ext' => $value['Work_Phone_Ext'],
                'P' . ($key + 1) . '_Schools' => $value['Schools'],
                'P' . ($key + 1) . '_Living_Situation' => $value['Living_Situation'],
                'P' . ($key + 1) . '_Status' => $value['Status']
            ];
            array_push($new_arr, $arr);
        }

        $addOrUpdateArr = Arr::collapse($new_arr);
        //dd($addOrUpdateArr);

        if ($this->isEdit) {
            ParentInformation::find($this->parentInfo_id)->delete();
        }
        $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
        $addOrUpdateArr['Application_ID'] = $this->application_id;
        //dd($addOrUpdateArr);
        ParentInformation::create($addOrUpdateArr);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'four']);


        // $msgAction = 'Parent Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        // $this->showToastr("success", $msgAction);
        return redirect()->route('admission-application', ['step' => 'four']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-three');
    }

    //Validition and Custom Message
    public function parentInfoValidation(): array
    {
        return [
            'parentInfo.*.Relationship' => ['required', 'max:40'],
            'parentInfo.*.First_Name' => ['required', 'max:40'],
            'parentInfo.*.Last_Name' => ['required'],
            'parentInfo.*.Address_Type' => ['required'],
            'parentInfo.*.Mobile_Phone' => ['required','min:10'],
            'parentInfo.*.Personal_Email' => ['required', 'email:rfc,dns'],
            'parentInfo.*.Schools' => ['required', 'max:1500', new MaxWordsRule(500)],
            'parentInfo.*.Living_Situation' => ['required', 'max:255'],
            'parentInfo.*.Work_Phone' => ['nullable','min:10'],
        ];
    }
}
