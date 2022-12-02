<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Helpers\ApplicationConstHelper;
use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\Spirituality;
use App\Models\StudentInformation;
use App\Rules\MaxWordsRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ApplicationSeven extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $religionList = [], $spiritualitiesList = [], $religionsStudiesList = [], $liturgiesList = [], $retreatsList = [], $communityService = [], $relationshipList = [], $students = [];
    public  $isEdit = false, $spiritualCommunityInfo_id, $application_id, $spiritualCommunityInfo = [], $studentInfo;

    public function mount($getSpiritualCommunityInfo = null)
    {

        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $getApplication->Application_ID)->first();

            if($getStudent){
                $getStudent = $getStudent->toArray();
            }
            
            if($getStudent){
                if ($getSpiritualCommunityInfo) {
                    
                    // dd('IF');
                    $this->spiritualCommunityInfo_id = $getSpiritualCommunityInfo->id;
                    
                    $arr1 = [
                        "S1_Baptism_Year" => $getSpiritualCommunityInfo->S1_Baptism_Year,
                        "S1_Confirmation_Year" => $getSpiritualCommunityInfo->S1_Confirmation_Year,
                        "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
                        
                    ];
                    $arr2 = [
                        "S2_Baptism_Year" => $getSpiritualCommunityInfo->S2_Baptism_Year,
                        "S2_Confirmation_Year" => $getSpiritualCommunityInfo->S2_Confirmation_Year,
                        "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
                        
                    ];
                    $arr3 = [
                        "S3_Baptism_Year" => $getSpiritualCommunityInfo->S3_Baptism_Year,
                        "S3_Confirmation_Year" => $getSpiritualCommunityInfo->S3_Confirmation_Year,
                        "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
                        
                    ];
                    //$newArr[] = $getSpiritualCommunityInfo['S1_Baptism_Year'] ? $arr1 : null;
                    //$newArr[] = $getSpiritualCommunityInfo['S2_Baptism_Year'] ? $arr2 : null;
                    //$newArr[] = $getSpiritualCommunityInfo['S3_Baptism_Year'] ? $arr3 : null;
                    $newArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                    $newArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                    $newArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
                    
                    foreach ($newArr as $key => $value) {
                        if (!is_null($value)) {
                            array_push($this->students, $value);
                        }
                    }
                    
                    $getNewArr = [];
                    if ($getSpiritualCommunityInfo->Describe_Family_Spirituality) {
                        $strArray = explode(',',  $getSpiritualCommunityInfo->Describe_Family_Spirituality);
                        $getNewArr = array_combine($strArray, $strArray);
                    }
                    
                    
                    $this->spiritualCommunityInfo = [
                        'Applicant_Religion' => $getSpiritualCommunityInfo->Applicant_Religion,
                        'Applicant_Religion_Other' => $getSpiritualCommunityInfo->Applicant_Religion_Other,
                        'Church_Faith_Community' => $getSpiritualCommunityInfo->Church_Faith_Community,
                        'Church_Faith_Community_Location' => $getSpiritualCommunityInfo->Church_Faith_Community_Location,
                        'Students' => $this->students,
                        'Impact_to_Community' => $getSpiritualCommunityInfo->Impact_to_Community,
                        'Describe_Family_Spirituality' => $getNewArr,
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
                    
                    $this->isEdit = true;
                } else {
                    
                    //dd('Else');
                    $arr1 = [
                        "S1_Baptism_Year" => '',
                        "S1_Confirmation_Year" => '',
                        "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
                    ];
                    $arr2 = [
                        "S2_Baptism_Year" => '',
                        "S2_Confirmation_Year" => '',
                        "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
                    ];
                    $arr3 = [
                        "S3_Baptism_Year" => '',
                        "S3_Confirmation_Year" => '',
                        "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
                    ];
                    
                    $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                    $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                    $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
                    //dd($getStudent,$studentArr);
                    foreach ($studentArr as $key => $arr) {
                        if (!is_null($arr)) {
                            array_push($this->students, $arr);
                        }
                    }
                    // dd($getStudent,$studentArr,$this->students);
                    $this->spiritualCommunityInfo = [
                        'Applicant_Religion' => '',
                        'Applicant_Religion_Other' => '',
                        'Church_Faith_Community' => '',
                        'Church_Faith_Community_Location' => '',
                        'Students' => $this->students,
                        'Impact_to_Community' => '',
                        'Describe_Family_Spirituality' => '',
                        'Describe_Practice_in_Detail' => '',
                        'Religious_Studies_Classes' => '',
                        'Religious_Studies_Classes_Explanation' => '',
                        'School_Liturgies' => '',
                        'School_Liturgies_Explanation' => '',
                        'Retreats' => '',
                        'Retreats_Explanation' => '',
                        'Community_Service' => '',
                        'Community_Service_Explanation' => '',
                        'Religious_Form_Submitted_By' => '',
                        'Religious_Form_Relationship' => '',
                        'Religious_Form_Date' => ''
                    ];
                }
            }else{
                $this->spiritualCommunityInfo = [
                    'Applicant_Religion' => '',
                    'Applicant_Religion_Other' => '',
                    'Church_Faith_Community' => '',
                    'Church_Faith_Community_Location' => '',
                    'Students' => $this->students,
                    'Impact_to_Community' => '',
                    'Describe_Family_Spirituality' => '',
                    'Describe_Practice_in_Detail' => '',
                    'Religious_Studies_Classes' => '',
                    'Religious_Studies_Classes_Explanation' => '',
                    'School_Liturgies' => '',
                    'School_Liturgies_Explanation' => '',
                    'Retreats' => '',
                    'Retreats_Explanation' => '',
                    'Community_Service' => '',
                    'Community_Service_Explanation' => '',
                    'Religious_Form_Submitted_By' => '',
                    'Religious_Form_Relationship' => '',
                    'Religious_Form_Date' => ''
                ];
            }
            
        

        $this->religionsStudiesList = [
            ['religions_name' => "Yes"],
            ['religions_name' => "No"],
            ['religions_name' => "Unsure"],
        ];
        $this->liturgiesList = [
            ['liturgies_name' => "Yes"],
            ['liturgies_name' => "No"],
            ['liturgies_name' => "Unsure"],
        ];
        $this->retreatsList = [
            ['retreats_name' => "Yes"],
            ['retreats_name' => "No"],
            ['retreats_name' => "Unsure"],
        ];
        $this->communityServiceList = [
            ['communityService_name' => "Yes"],
            ['communityService_name' => "No"],
            ['communityService_name' => "Unsure"],
        ];


        $this->spiritualitiesList = Spirituality::get()->toArray();

        $this->relationshipList = ApplicationConstHelper::relationshipListFour();

        $this->religionList = ApplicationConstHelper::religionList();
    }

    public function saveOrUpdate()
    {

       
        if ($this->spiritualCommunityInfo['Describe_Family_Spirituality']) {
            $data = array_filter($this->spiritualCommunityInfo['Describe_Family_Spirituality']);
            $this->spiritualCommunityInfo['Describe_Family_Spirituality'] = $data;
        }

        if (count($this->students) == 1) {
            $this->validate($this->studentsOneValidation());
        } elseif (count($this->students) == 2) {
            $this->validate($this->studentsTwoValidation());
        } elseif (count($this->students) == 3) {
            $this->validate($this->studentsThreeValidation());
        }

        if ($this->spiritualCommunityInfo['Describe_Family_Spirituality']) {
            $data = array_keys(array_filter($this->spiritualCommunityInfo['Describe_Family_Spirituality']));
            $strData = implode(",", $data);
            $this->spiritualCommunityInfo['Describe_Family_Spirituality'] = $strData;
        }

        $new_student_arr = Arr::collapse($this->spiritualCommunityInfo['Students']);

        $this->spiritualCommunityInfo['S1_Baptism_Year'] = isset($new_student_arr['S1_Baptism_Year']) ? $new_student_arr['S1_Baptism_Year'] : '';
        $this->spiritualCommunityInfo['S1_Confirmation_Year'] = isset($new_student_arr['S1_Confirmation_Year']) ? $new_student_arr['S1_Confirmation_Year'] : '';

        $this->spiritualCommunityInfo['S2_Baptism_Year'] = isset($new_student_arr['S2_Baptism_Year']) ? $new_student_arr['S2_Baptism_Year'] : '';
        $this->spiritualCommunityInfo['S2_Confirmation_Year'] = isset($new_student_arr['S2_Confirmation_Year']) ? $new_student_arr['S2_Confirmation_Year'] : '';

        $this->spiritualCommunityInfo['S3_Baptism_Year'] = isset($new_student_arr['S3_Baptism_Year']) ? $new_student_arr['S3_Baptism_Year'] : '';
        $this->spiritualCommunityInfo['S3_Confirmation_Year'] = isset($new_student_arr['S3_Confirmation_Year']) ? $new_student_arr['S3_Confirmation_Year'] : '';

        //Removed Student dummy Array form main array
        unset($this->spiritualCommunityInfo['Students']);

        if ($this->isEdit) {
            SpiritualAndCommunityInformation::find($this->spiritualCommunityInfo_id)->delete();
        }
        $this->spiritualCommunityInfo['Profile_ID'] = Auth::guard('customer')->user()->id;
        $this->spiritualCommunityInfo['Application_ID'] = $this->application_id;
        //dd($this->spiritualCommunityInfo);
        SpiritualAndCommunityInformation::create($this->spiritualCommunityInfo);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'eight']);


        // $msgAction = 'Spiritual & Community Info ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        // $this->showToastr("success", $msgAction);
        return redirect()->route('admission-application', ['step' => 'eight']);
    }

    public function render()
    {
      
        return view('livewire.frontend.application.application-seven');
    }

    public function studentsOneValidation(): array
    {
        return [

            'spiritualCommunityInfo.Applicant_Religion' => ['required'],
            'spiritualCommunityInfo.Impact_to_Community' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Describe_Family_Spirituality' => ['required'],
            'spiritualCommunityInfo.Describe_Practice_in_Detail' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Religious_Studies_Classes' => ['required'],
            'spiritualCommunityInfo.School_Liturgies' => ['required'],
            'spiritualCommunityInfo.Retreats' => ['required'],
            'spiritualCommunityInfo.Community_Service' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Submitted_By' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Relationship' => ['required'],

            // 'spiritualCommunityInfo.Students.0.S1_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.0.S1_Confirmation_Year' => ['required'],
        ];
    }
    public function studentsTwoValidation(): array
    {
        return [
            'spiritualCommunityInfo.Applicant_Religion' => ['required'],
            'spiritualCommunityInfo.Impact_to_Community' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Describe_Family_Spirituality' => ['required'],
            'spiritualCommunityInfo.Describe_Practice_in_Detail' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Religious_Studies_Classes' => ['required'],
            'spiritualCommunityInfo.School_Liturgies' => ['required'],
            'spiritualCommunityInfo.Retreats' => ['required'],
            'spiritualCommunityInfo.Community_Service' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Submitted_By' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Relationship' => ['required'],

            // 'spiritualCommunityInfo.Students.0.S1_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.0.S1_Confirmation_Year' => ['required'],

            // 'spiritualCommunityInfo.Students.1.S2_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.1.S2_Confirmation_Year' => ['required'],
        ];
    }
    public function studentsThreeValidation(): array
    {
        return [
            'spiritualCommunityInfo.Applicant_Religion' => ['required'],
            'spiritualCommunityInfo.Impact_to_Community' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Describe_Family_Spirituality' => ['required'],
            'spiritualCommunityInfo.Describe_Practice_in_Detail' => ['required', 'max:1000', new MaxWordsRule(75)],
            'spiritualCommunityInfo.Religious_Studies_Classes' => ['required'],
            'spiritualCommunityInfo.School_Liturgies' => ['required'],
            'spiritualCommunityInfo.Retreats' => ['required'],
            'spiritualCommunityInfo.Community_Service' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Submitted_By' => ['required'],
            'spiritualCommunityInfo.Religious_Form_Relationship' => ['required'],

            // 'spiritualCommunityInfo.Students.0.S1_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.0.S1_Confirmation_Year' => ['required'],

            // 'spiritualCommunityInfo.Students.1.S2_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.1.S2_Confirmation_Year' => ['required'],

            // 'spiritualCommunityInfo.Students.2.S3_Baptism_Year' => ['required'],
            // 'spiritualCommunityInfo.Students.2.S3_Confirmation_Year' => ['required'],
        ];
    }
}
