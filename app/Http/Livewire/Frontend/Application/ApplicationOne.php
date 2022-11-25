<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\IdentifyRacially;
use App\Models\StudentInformation;
use App\Models\Suffix;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Helpers\ApplicationConstHelper;
use App\Models\Payment;

use function PHPUnit\Framework\isNull;

class ApplicationOne extends Component
{

    use WithFileUploads;
    use AlertMessage;

    public $isEdit = false, $statusList = [], $schoolList = [], $otherSchoolList = [], $identifyRacially = [], $suffixList = [];
    public $studentInfo, $studentInfo_id, $application_id;
    public $inputs = [], $i = 1, $old_arr_count = 0, $is_payment_compleat = false;

    public function mount($studentInfo = null)
    {
        //dd('livewire', $studentInfo);
        if ($studentInfo) {
            $this->studentInfo = $studentInfo;
            $this->studentInfo_id = $studentInfo->id;
            $this->application_id = $studentInfo->Application_ID;

            $getS1RaceArr = [];
            if ($studentInfo->S1_Race) {
                $str1Array = explode(',',  $studentInfo->S1_Race);
                $getS1RaceArr = array_combine($str1Array, $str1Array);
            }

            $getS2RaceArr = [];
            if ($studentInfo->S2_Race) {
                $str2Array = explode(',',  $studentInfo->S2_Race);
                $getS2RaceArr = array_combine($str2Array, $str2Array);
            }
            $getS3RaceArr = [];
            if ($studentInfo->S3_Race) {
                $str3Array = explode(',',  $studentInfo->S3_Race);
                $getS3RaceArr = array_combine($str3Array, $str3Array);
            }

            $arr1 = [
                "Photo" => $studentInfo->S1_Photo,
                "First_Name" => $studentInfo->S1_First_Name,
                "Middle_Name" =>  $studentInfo->S1_Middle_Name,
                "Last_Name" =>  $studentInfo->S1_Last_Name,
                "Suffix" =>  $studentInfo->S1_Suffix,
                "Preferred_First_Name" =>  $studentInfo->S1_Preferred_First_Name,
                "Birthdate" =>  $studentInfo->S1_Birthdate,
                "Gender" =>  $studentInfo->S1_Gender,
                "Personal_Email" =>  $studentInfo->S1_Personal_Email,
                //"Mobile_Phone" =>  $studentInfo->S1_Mobile_Phone,
                "phone_number_one" => Str::substr($studentInfo->S1_Mobile_Phone, 0, 3),
                "phone_number_two" =>  Str::substr($studentInfo->S1_Mobile_Phone, 3, 3),
                "phone_number_three" =>  Str::substr($studentInfo->S1_Mobile_Phone, 6, 4),
                "Race" => $getS1RaceArr,
                "Ethnicity" =>  $studentInfo->S1_Ethnicity,
                "Current_School" =>  $studentInfo->S1_Current_School,
                "Current_School_Not_Listed" =>  $studentInfo->S1_Current_School_Not_Listed,
                "Other_High_School_1" =>  $studentInfo->S1_Other_High_School_1,
                "Other_High_School_2" =>  $studentInfo->S1_Other_High_School_2,
                "Other_High_School_3" =>  $studentInfo->S1_Other_High_School_3,
                "Other_High_School_4" =>  $studentInfo->S1_Other_High_School_4
            ];

            $arr2 = [
                "Photo" =>  $studentInfo->S2_Photo,
                "First_Name" => $studentInfo->S2_First_Name,
                "Middle_Name" =>  $studentInfo->S2_Middle_Name,
                "Last_Name" =>  $studentInfo->S2_Last_Name,
                "Suffix" =>  $studentInfo->S2_Suffix,
                "Preferred_First_Name" =>  $studentInfo->S2_Preferred_First_Name,
                "Birthdate" =>  $studentInfo->S2_Birthdate,
                "Gender" =>  $studentInfo->S2_Gender,
                "Personal_Email" =>  $studentInfo->S2_Personal_Email,
                //"Mobile_Phone" =>  $studentInfo->S2_Mobile_Phone,
                "phone_number_one" => Str::substr($studentInfo->S2_Mobile_Phone, 0, 3),
                "phone_number_two" =>  Str::substr($studentInfo->S2_Mobile_Phone, 3, 3),
                "phone_number_three" =>  Str::substr($studentInfo->S2_Mobile_Phone, 6, 4),
                "Race" =>  $getS2RaceArr,
                "Ethnicity" =>  $studentInfo->S2_Ethnicity,
                "Current_School" =>  $studentInfo->S2_Current_School,
                "Current_School_Not_Listed" =>  $studentInfo->S2_Current_School_Not_Listed,
                "Other_High_School_1" =>  $studentInfo->S2_Other_High_School_1,
                "Other_High_School_2" =>  $studentInfo->S2_Other_High_School_2,
                "Other_High_School_3" =>  $studentInfo->S2_Other_High_School_3,
                "Other_High_School_4" =>  $studentInfo->S2_Other_High_School_4
            ];

            $arr3 = [
                "Photo" =>  $studentInfo->S3_Photo,
                "First_Name" => $studentInfo->S3_First_Name,
                "Middle_Name" =>  $studentInfo->S3_Middle_Name,
                "Last_Name" =>  $studentInfo->S3_Last_Name,
                "Suffix" =>  $studentInfo->S3_Suffix,
                "Preferred_First_Name" =>  $studentInfo->S3_Preferred_First_Name,
                "Birthdate" =>  $studentInfo->S3_Birthdate,
                "Gender" =>  $studentInfo->S3_Gender,
                "Personal_Email" =>  $studentInfo->S3_Personal_Email,
                //"Mobile_Phone" =>  $studentInfo->S3_Mobile_Phone,
                "phone_number_one" => Str::substr($studentInfo->S3_Mobile_Phone, 0, 3),
                "phone_number_two" =>  Str::substr($studentInfo->S3_Mobile_Phone, 3, 3),
                "phone_number_three" =>  Str::substr($studentInfo->S3_Mobile_Phone, 6, 4),
                "Race" =>  $getS3RaceArr,
                "Ethnicity" =>  $studentInfo->S3_Ethnicity,
                "Current_School" =>  $studentInfo->S3_Current_School,
                "Current_School_Not_Listed" =>  $studentInfo->S3_Current_School_Not_Listed,
                "Other_High_School_1" =>  $studentInfo->S3_Other_High_School_1,
                "Other_High_School_2" =>  $studentInfo->S3_Other_High_School_2,
                "Other_High_School_3" =>  $studentInfo->S3_Other_High_School_3,
                "Other_High_School_4" =>  $studentInfo->S3_Other_High_School_4
            ];

            $studentArr[] = $studentInfo['S1_First_Name'] ? $arr1 : null;
            $studentArr[] = $studentInfo['S2_First_Name'] ? $arr2 : null;
            $studentArr[] = $studentInfo['S3_First_Name'] ? $arr3 : null;
            //dd($studentArr);
            foreach ($studentArr as $key => $student) {
                if (!is_null($student)) {
                    $this->old_arr_count += 1;
                    array_push($this->inputs, $student);
                }
            }
            //dd($this->inputs);
            $this->i = count($this->inputs);
            $this->isEdit = true;

            $getPayment = Payment::where('user_id', Auth::guard('customer')->user()->id)
                ->where('application_id', $studentInfo->Application_ID)->first();
            //dd($getPayment);
            if ($getPayment) {
                $this->is_payment_compleat = true;
            }
        } else {

            $arr = [
                "Photo" => '',
                'New_Photo' => '',
                "First_Name" => '',
                "Middle_Name" =>  '',
                "Last_Name" =>  '',
                "Suffix" =>  '',
                "Preferred_First_Name" =>  '',
                "Birthdate" =>  '',
                "Gender" =>  '',
                "Personal_Email" =>  '',
                //"Mobile_Phone" =>  '',
                "phone_number_one" => '',
                "phone_number_two" =>  '',
                "phone_number_three" =>  '',
                "Race" => '',
                "Ethnicity" =>  '',
                "Current_School" =>  '',
                "Current_School_Not_Listed" =>  '',
                "Other_High_School_1" =>  '',
                "Other_High_School_2" =>  '',
                "Other_High_School_3" =>  '',
                "Other_High_School_4" =>  ''
            ];
            array_push($this->inputs, $arr);
        }

        $this->statusList = [
            ['value' => -1, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->schoolList = ApplicationConstHelper::middleSchoolList();
        $this->otherSchoolList = ApplicationConstHelper::highSchoolList();
        $this->identifyRacially = IdentifyRacially::get()->toArray();
        $this->suffixList = Suffix::get()->toArray();
    }

    public function add($i)
    {
        $this->i += 1;
        $arr = [
            "Photo" => '',
            'New_Photo' => '',
            "First_Name" => '',
            "Middle_Name" =>  '',
            "Last_Name" =>  '',
            "Suffix" =>  '',
            "Preferred_First_Name" =>  '',
            "Birthdate" =>  '',
            "Gender" =>  '',
            "Personal_Email" =>  '',
            //"Mobile_Phone" =>  '',
            "phone_number_one" => '',
            "phone_number_two" =>  '',
            "phone_number_three" =>  '',
            "Race" => '',
            "Ethnicity" =>  '',
            "Current_School" =>  '',
            "Current_School_Not_Listed" =>  '',
            "Other_High_School_1" =>  '',
            "Other_High_School_2" =>  '',
            "Other_High_School_3" =>  '',
            "Other_High_School_4" =>  ''
        ];
        array_push($this->inputs, $arr);
    }

    public function remove($i)
    {
        $this->i -= 1;
        unset($this->inputs[$i]);
        $this->inputs = array_values($this->inputs);
    }


    public function saveOrUpdate()
    {
        //dd($this->inputs);

        foreach (array_values($this->inputs) as $key => $item) {
            $this->inputs[$key]['Mobile_Phone'] = $item['phone_number_one'] . $item['phone_number_two'] . $item['phone_number_three'];
        }

        if ($this->isEdit) {
            $this->validate($this->updateStudentInfoValidation());
        } else {
            $this->validate($this->addStudentInfoValidation());
        }

        foreach (array_values($this->inputs) as $rkey => $value) {
            if (is_array($value['Race'])) {
                $data = array_keys(array_filter($value['Race']));
                $strData = implode(",", $data);
                $this->inputs[$rkey]['Race'] = $strData;
            }
        }
        
        $new_arr = [];
        foreach (array_values($this->inputs) as $key => $value) {

            if (isset($value['New_Photo']) && $value['New_Photo']) {
                if ($value['Photo']) {
                    unlink($value['Photo']);
                }
                $imagePath = $value['New_Photo'];

                if (!is_null($value['Middle_Name'])) {
                    $filename = Str::lower($value['First_Name']) . '-' . Str::lower($value['First_Name']) . '-' .  Str::lower($value['Last_Name']) . '-' . rand(1000, 9999) . '.' . $imagePath->getClientOriginalExtension();
                } else {
                    $filename = Str::lower($value['First_Name']) . '-' .  Str::lower($value['Last_Name']) . '-' . rand(1000, 9999) . '.' . $imagePath->getClientOriginalExtension();
                }
                Storage::putFileAs('public/application_profile', $imagePath, $filename);
                $path = 'storage/application_profile/' . $filename;
            } else {
                $path = $value['Photo'];
            }

            $arr = [
                'S' . ($key + 1) . '_Photo' =>  $path,
                'S' . ($key + 1) . '_First_Name' => $value['First_Name'],
                'S' . ($key + 1) . '_Middle_Name' =>  $value['Middle_Name'],
                'S' . ($key + 1) . '_Last_Name' =>  $value['Last_Name'],
                'S' . ($key + 1) . '_Suffix' =>  $value['Suffix'],
                'S' . ($key + 1) . '_Preferred_First_Name' =>  $value['Preferred_First_Name'],
                'S' . ($key + 1) . '_Birthdate' =>  $value['Birthdate'],
                'S' . ($key + 1) . '_Gender' =>  $value['Gender'],
                'S' . ($key + 1) . '_Personal_Email' =>  $value['Personal_Email'],
                'S' . ($key + 1) . '_Mobile_Phone' =>  $value['Mobile_Phone'],
                'S' . ($key + 1) . '_Race' => $value['Race'],
                'S' . ($key + 1) . '_Ethnicity' =>  $value['Ethnicity'],
                'S' . ($key + 1) . '_Current_School' =>  $value['Current_School'],
                'S' . ($key + 1) . '_Current_School_Not_Listed' =>  $value['Current_School_Not_Listed'],
                'S' . ($key + 1) . '_Other_High_School_1' =>  $value['Other_High_School_1'],
                'S' . ($key + 1) . '_Other_High_School_2' =>  $value['Other_High_School_2'],
                'S' . ($key + 1) . '_Other_High_School_3' =>  $value['Other_High_School_3'],
                'S' . ($key + 1) . '_Other_High_School_4' =>  $value['Other_High_School_4']
            ];

            array_push($new_arr, $arr);
        }

        //dd($new_arr);

        //Merage all array to one array
        $addOrUpdateArr = Arr::collapse($new_arr);

        if ($this->isEdit) {
            StudentInformation::find($this->studentInfo_id)->delete();

            $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
            $addOrUpdateArr['Application_ID'] = $this->application_id;
            StudentInformation::create($addOrUpdateArr);
        } else {
            $application = new Application();
            $application->Profile_ID = Auth::guard('customer')->user()->id;
            $application->status = 0;
            $application->last_step_complete = 'two';
            $application->save();

            $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
            $addOrUpdateArr['Application_ID'] = $application->id;
            StudentInformation::create($addOrUpdateArr);
        }
        return redirect()->route('admission-application', ['step' => 'two']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-one');
    }

    //Validation and Custom Message
    public function addStudentInfoValidation(): array
    {
        return [

            'inputs.*.New_Photo' => ['required'],
            'inputs.*.First_Name' => ['required', 'max:40'],
            'inputs.*.Last_Name' => ['required'],
            'inputs.*.Birthdate' => ['required', 'max:255', 'min:6'],
            'inputs.*.Gender' => ['required'],
            'inputs.*.Personal_Email' => ['required', 'email:rfc,dns'],
            // 'inputs.*.Race' => ['required', 'max:255'],
            // 'inputs.*.Ethnicity' => ['required'],
            'inputs.*.Current_School' => ['required'],
            "inputs.*.Current_School_Not_Listed" => "required_if:inputs.*.Current_School,==,Not Listed",
            'inputs.*.Mobile_Phone' => ['nullable', 'min:10'],
        ];
    }

    public function updateStudentInfoValidation(): array
    {
        return [
            //'inputs.*.New_Photo' => ['required'],
            'inputs.*.First_Name' => ['required', 'max:40'],
            'inputs.*.Last_Name' => ['required'],
            'inputs.*.Birthdate' => ['required', 'max:255', 'min:6'],
            'inputs.*.Gender' => ['required'],
            'inputs.*.Personal_Email' => ['required', 'email:rfc,dns'],
            // 'inputs.*.Race' => ['required', 'max:255'],
            // 'inputs.*.Ethnicity' => ['required'],
            'inputs.*.Current_School' => ['required'],
            "inputs.*.Current_School_Not_Listed" => "required_if:inputs.*.Current_School,==,Not Listed",
            'inputs.*.Mobile_Phone' => ['nullable', 'min:10'],
        ];
    }
}
