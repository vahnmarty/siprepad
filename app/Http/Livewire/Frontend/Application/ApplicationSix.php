<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Helpers\ApplicationConstHelper;
use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\ParentStatement;
use App\Models\StudentInformation;
use App\Rules\MaxWordsRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ApplicationSix extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $relationshipList = [], $Why_SI_for_Child, $Parent_Statement_Submitted_By, $Parent_Statement_Relationship;
    public  $isEdit = false, $parentStatement_id, $application_id, $parentStatement = [], $studentInfo;

    public function mount($getParentStatement = null)
    {
        //dd($getParentStatement);
        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $getApplication->Application_ID)->first()->toArray();

        if ($getParentStatement) {

            $this->parentStatement_id = $getParentStatement->id;

            $student1 = [
                "S1_Endearing_Quality_and_Growth" => $getParentStatement->S1_Endearing_Quality_and_Growth,
                "S1_About_Child_Not_on_App" => $getParentStatement->S1_About_Child_Not_on_App,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];

            $student2 = [
                "S2_Endearing_Quality_and_Growth" => $getParentStatement->S2_Endearing_Quality_and_Growth,
                "S2_About_Child_Not_on_App" => $getParentStatement->S2_About_Child_Not_on_App,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];

            $student3 = [
                "S3_Endearing_Quality_and_Growth" => $getParentStatement->S3_Endearing_Quality_and_Growth,
                "S3_About_Child_Not_on_App" => $getParentStatement->S3_About_Child_Not_on_App,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            // $getParentArr[] = $getParentStatement['S1_Endearing_Quality_and_Growth'] ? $student1 : null;
            // $getParentArr[] = $getParentStatement['S2_Endearing_Quality_and_Growth'] ? $student2 : null;
            // $getParentArr[] = $getParentStatement['S3_Endearing_Quality_and_Growth'] ? $student3 : null;

            $getParentArr[] = $getStudent['S1_First_Name'] ? $student1 : null;
            $getParentArr[] = $getStudent['S2_First_Name'] ? $student2 : null;
            $getParentArr[] = $getStudent['S3_First_Name'] ? $student3 : null;

            foreach ($getParentArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($this->parentStatement, $value);
                }
            }
            $this->Why_SI_for_Child = $getParentStatement->Why_SI_for_Child;
            $this->Parent_Statement_Submitted_By = $getParentStatement->Parent_Statement_Submitted_By;
            $this->Parent_Statement_Relationship = $getParentStatement->Parent_Statement_Relationship;
            //dd($this->parentStatement);
            $this->isEdit = true;
        } else {

            $arr1 = [
                "S1_Endearing_Quality_and_Growth" => '',
                "S1_About_Child_Not_on_App" => '',
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $arr2 = [
                "S2_Endearing_Quality_and_Growth" => '',
                "S2_About_Child_Not_on_App" => '',
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $arr3 = [
                "S3_Endearing_Quality_and_Growth" => '',
                "S3_About_Child_Not_on_App" => '',
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
            $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
            $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
            foreach ($studentArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($this->parentStatement, $arr);
                }
            }
        }

        $this->relationshipList = ApplicationConstHelper::relationshipListFour();
    }

    public function saveOrUpdate()
    {
        //dd($this->parentStatement);

        if (count($this->parentStatement) == 1) {
            $this->validate($this->parentStatementOneValidation());
        } elseif (count($this->parentStatement) == 2) {
            $this->validate($this->parentStatementTwoValidation());
        } elseif (count($this->parentStatement) == 3) {
            $this->validate($this->parentStatementThreeValidation());
        }

        $addOrUpdateArr = Arr::collapse($this->parentStatement);
        $addOrUpdateArr['Why_SI_for_Child'] = $this->Why_SI_for_Child;
        $addOrUpdateArr['Parent_Statement_Submitted_By'] = $this->Parent_Statement_Submitted_By;
        $addOrUpdateArr['Parent_Statement_Relationship'] = $this->Parent_Statement_Relationship;
        unset($addOrUpdateArr['Student_name']);

        //dd($addOrUpdateArr);

        if ($this->isEdit) {
            ParentStatement::find($this->parentStatement_id)->delete();
        }
        $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
        $addOrUpdateArr['Application_ID'] = $this->application_id;
        //dd($addOrUpdateArr);
        ParentStatement::create($addOrUpdateArr);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'seven']);

        // $msgAction = 'Parent Statement ' . ($this->isEdit ? 'added' : 'added') . ' successfully';
        // $this->showToastr("success", $msgAction);
        return redirect()->route('admission-application', ['step' => 'seven']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-six');
    }

    public function parentStatementOneValidation(): array
    {
        return [
            'parentStatement.0.S1_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.0.S1_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'Why_SI_for_Child' => ['required', 'max:1000', new MaxWordsRule(75)],
            'Parent_Statement_Submitted_By' => ['required', 'max:40'],
            'Parent_Statement_Relationship' => ['required', 'max:40']
        ];
    }
    public function parentStatementTwoValidation(): array
    {
        return [
            'parentStatement.0.S1_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.0.S1_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'parentStatement.1.S2_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.1.S2_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'Why_SI_for_Child' => ['required', 'max:1000', new MaxWordsRule(75)],
            'Parent_Statement_Submitted_By' => ['required', 'max:40'],
            'Parent_Statement_Relationship' => ['required', 'max:40']
        ];
    }
    public function parentStatementThreeValidation(): array
    {
        return [
            'parentStatement.0.S1_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.0.S1_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'parentStatement.1.S2_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.1.S2_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'parentStatement.2.S3_Endearing_Quality_and_Growth' => ['required', 'max:1000', new MaxWordsRule(75)],
            'parentStatement.2.S3_About_Child_Not_on_App' => ['required', 'max:1000', new MaxWordsRule(75)],

            'Why_SI_for_Child' => ['required', 'max:1000', new MaxWordsRule(75)],
            'Parent_Statement_Submitted_By' => ['required', 'max:40'],
            'Parent_Statement_Relationship' => ['required', 'max:40']
        ];
    }
}
