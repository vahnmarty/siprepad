<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Helpers\ApplicationConstHelper;
use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\LegacyInformation;
use App\Models\Relationship;
use App\Models\StudentInformation;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ApplicationFive extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $relationshipList = [], $legacyInfo = [];
    public  $isEdit = false,  $i = 1,  $is_any_attended_si = false, $application_id, $legacyInfo_id, $studentInfo;

    public function mount($getLegacyInfo = null)
    {
        //dd($getLegacyInfo);
        if ($getLegacyInfo) {

            $this->legacyInfo_id = $getLegacyInfo->id;

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
                    array_push($this->legacyInfo, $value);
                }
            }
            //dd($this->legacyInfo);
            if (count($this->legacyInfo) > 0) {
                $this->is_any_attended_si = true;
                $this->i = count($this->legacyInfo);
            }
            $this->isEdit = true;
        }
        //
        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();
        //
        $this->relationshipList = ApplicationConstHelper::relationshipListThree();
    }

    public function showHideDiv($data)
    {
        if ($data == "yes") {
            $this->is_any_attended_si = true;
            $this->legacyInfo = [];
            $arr = [
                'First_Name' => '',
                'Last_Name' => '',
                'Relationship' => '',
                'Graduation_Year' => ''
            ];
            array_push($this->legacyInfo, $arr);
            $this->i = count($this->legacyInfo);
        } else {
            //$this->legacyInfo = [];
            $this->is_any_attended_si = false;
        }
    }

    public function add($i)
    {
        $this->i += 1;
        $arr = [
            'First_Name' => '',
            'Last_Name' => '',
            'Relationship' => '',
            'Graduation_Year' => ''
        ];
        array_push($this->legacyInfo, $arr);
    }

    public function remove($i)
    {
        $this->i -= 1;
        unset($this->legacyInfo[$i]);
        $this->legacyInfo = array_values($this->legacyInfo);
    }

    public function saveOrUpdate()
    {

        $new_arr = [];
        foreach (array_values($this->legacyInfo) as $key => $value) {
            $arr = [
                'L' . ($key + 1) . '_First_Name' => $value['First_Name'],
                'L' . ($key + 1) . '_Last_Name' => $value['Last_Name'],
                'L' . ($key + 1) . '_Relationship' => $value['Relationship'],
                'L' . ($key + 1) . '_Graduation_Year' => $value['Graduation_Year']
            ];
            array_push($new_arr, $arr);
        }

        $addOrUpdateArr = Arr::collapse($new_arr);
        //dd($this->legacyInfo, $addOrUpdateArr,$this->isEdit);

        if ($this->isEdit) {

            if ($this->is_any_attended_si) {

                LegacyInformation::find($this->legacyInfo_id)->delete();
                $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
                $addOrUpdateArr['Application_ID'] = $this->application_id;
                //dd($addOrUpdateArr);
                LegacyInformation::create($addOrUpdateArr);
                return redirect()->route('admission-application', ['step' => 'six']);
            } else {
                LegacyInformation::find($this->legacyInfo_id)->delete();
                $data['Profile_ID'] = Auth::guard('customer')->user()->id;
                $data['Application_ID'] = $this->application_id;
                LegacyInformation::create($data);
                return redirect()->route('admission-application', ['step' => 'six']);
            }
        } else {
            $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
            $addOrUpdateArr['Application_ID'] = $this->application_id;
            //dd($addOrUpdateArr);
            LegacyInformation::create($addOrUpdateArr);
            //Update Next step
            Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'six']);
            return redirect()->route('admission-application', ['step' => 'six']);
        }
    }

    public function render()
    {
        return view('livewire.frontend.application.application-five');
    }
}
