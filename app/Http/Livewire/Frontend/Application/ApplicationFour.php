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
use App\Models\Salutation;
use App\Models\School;
use App\Models\SiblingInformation;
use App\Models\StudentInformation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ApplicationFour extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $statusList = [], $identifyRacially = [],  $schoolList = [], $suffixList = [], $gradeList = [];
    public $countryList = [], $relationshipList = [], $salutationList = [], $addressList = [], $maritalStatusList = [], $livingSituationList = [];
    public  $isEdit = false,  $i = 1, $siblingInfo = [], $is_any_other_child = false, $application_id, $siblingInfo_id;

    public function mount($getSiblingInfo = null)
    {

        if ($getSiblingInfo) {

            //dd($getSiblingInfo);
            $this->siblingInfo_id = $getSiblingInfo->id;

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
            foreach ($siblingInfoArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($this->siblingInfo, $value);
                }
            }
            //dd($this->siblingInfo);
            if (count($this->siblingInfo) > 0) {
                $this->is_any_other_child = true;
                $this->i = count($this->siblingInfo);
            }
            $this->isEdit = true;
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
        $this->salutationList = Salutation::get()->toArray();
        $this->addressList = AddressInformation::get()->toArray();
        $this->maritalStatusList = MaritalStatus::get()->toArray();
        $this->livingSituationList = LivingSituation::get()->toArray();
        $this->suffixList = ApplicationConstHelper::suffixListTwo();
        $this->relationshipList = ApplicationConstHelper::relationshipListTwo();
        $this->gradeList = ApplicationConstHelper::gradeList();
    }

    public function showHideDiv($data)
    {
        if ($data == "yes") {
            $this->is_any_other_child = true;
            $this->legacyInfo = [];
            $arr = [
                'First_Name' => '',
                'Middle_Name' => '',
                'Last_Name' => '',
                'Suffix' => '',
                'Relationship' => '',
                'Current_Grade' => '',
                'Current_School' => '',
                'Current_School_Not_Listed' => '',
                'HS_Graduation_Year' => '',
            ];
            array_push($this->siblingInfo, $arr);
            $this->i = count($this->siblingInfo);
        } else {
            $this->is_any_other_child = false;
        }
    }

    public function add($i)
    {
        $this->i += 1;
        $arr = [
            'First_Name' => '',
            'Middle_Name' => '',
            'Last_Name' => '',
            'Suffix' => '',
            'Relationship' => '',
            'Current_Grade' => '',
            'Current_School' => '',
            'Current_School_Not_Listed' => '',
            'HS_Graduation_Year' => '',
        ];
        array_push($this->siblingInfo, $arr);
    }

    public function remove($i)
    {
        $this->i -= 1;
        unset($this->siblingInfo[$i]);
        $this->siblingInfo = array_values($this->siblingInfo);
    }

    public function saveOrUpdate()
    {

        $new_arr = [];
        foreach (array_values($this->siblingInfo) as $key => $value) {
            if ($key == 9) {
                $arr = [
                    'SIB' . ($key + 1) . '_First_Name' => $value['First_Name'],
                    'SIB' . ($key + 1) . '_Middle_Name' => $value['Middle_Name'],
                    'SIB' . ($key + 1) . '_Last_Name' => $value['Last_Name'],
                    'SIB' . ($key + 1) . '_Suffix' => $value['Suffix'],
                    'SIB' . ($key + 1) . '_Relationship' => $value['Relationship'],
                    'SIB' . ($key + 1) . '_Current_Grade' => $value['Current_Grade'],
                    'SIB' . ($key + 1) . '_Current_School' => $value['Current_School'],
                    'SIB' . ($key + 1) . '_Current_School_Not_Listed' => $value['Current_School_Not_Listed'],
                    'SIB' . ($key + 1) . '_HS_Graduation_Year' => $value['HS_Graduation_Year'],
                ];
            } else {
                $arr = [
                    'SIB0' . ($key + 1) . '_First_Name' => $value['First_Name'],
                    'SIB0' . ($key + 1) . '_Middle_Name' => $value['Middle_Name'],
                    'SIB0' . ($key + 1) . '_Last_Name' => $value['Last_Name'],
                    'SIB0' . ($key + 1) . '_Suffix' => $value['Suffix'],
                    'SIB0' . ($key + 1) . '_Relationship' => $value['Relationship'],
                    'SIB0' . ($key + 1) . '_Current_Grade' => $value['Current_Grade'],
                    'SIB0' . ($key + 1) . '_Current_School' => $value['Current_School'],
                    'SIB0' . ($key + 1) . '_Current_School_Not_Listed' => $value['Current_School_Not_Listed'],
                    'SIB0' . ($key + 1) . '_HS_Graduation_Year' => $value['HS_Graduation_Year'],
                ];
            }

            array_push($new_arr, $arr);
        }

        $addOrUpdateArr = Arr::collapse($new_arr);
        //dd($this->siblingInfo, $addOrUpdateArr, $this->isEdit, $this->is_any_other_child);

        if ($this->isEdit) {
            if ($this->is_any_other_child) {
                SiblingInformation::find($this->siblingInfo_id)->delete();

                $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
                $addOrUpdateArr['Application_ID'] = $this->application_id;
                //dd($addOrUpdateArr);

                SiblingInformation::create($addOrUpdateArr);

                return redirect()->route('admission-application', ['step' => 'five']);
            } else {
                SiblingInformation::find($this->siblingInfo_id)->delete();

                $data['Profile_ID'] = Auth::guard('customer')->user()->id;
                $data['Application_ID'] = $this->application_id;
                SiblingInformation::create($data);
                return redirect()->route('admission-application', ['step' => 'five']);
            }
        } else {
            $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
            $addOrUpdateArr['Application_ID'] = $this->application_id;
            //dd($addOrUpdateArr);
            SiblingInformation::create($addOrUpdateArr);
            //Update Next step
            Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'five']);
            return redirect()->route('admission-application', ['step' => 'five']);
        }
    }

    public function render()
    {
        return view('livewire.frontend.application.application-four');
    }
}
