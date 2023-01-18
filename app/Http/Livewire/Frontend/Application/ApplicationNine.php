<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\StudentInformation;
use App\Models\WritingSample;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationNine extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public  $isEdit = false, $writing_sample_id, $application_id, $writingSample = [],$studentInfo;

    public function mount($getWritingSample = null)
    {
        //dd($getWritingSample);
        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $getApplication->Application_ID)->first()->toArray();

        if ($getWritingSample) {

            // dd('IF');
            $this->writing_sample_id = $getWritingSample->id;

            $arr1 = [
                "S1_Writing_Sample" => $getWritingSample->S1_Writing_Sample,
                "S1_Writing_Sample_Submitted_By" => $getWritingSample->S1_Writing_Sample_Submitted_By,
                "S1_Writing_Sample_Acknowledgment" => $getWritingSample->S1_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']

            ];
            $arr2 = [
                "S2_Writing_Sample" => $getWritingSample->S2_Writing_Sample,
                "S2_Writing_Sample_Submitted_By" => $getWritingSample->S2_Writing_Sample_Submitted_By,
                "S2_Writing_Sample_Acknowledgment" => $getWritingSample->S2_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']

            ];
            $arr3 = [
                "S3_Writing_Sample" => $getWritingSample->S3_Writing_Sample,
                "S3_Writing_Sample_Submitted_By" => $getWritingSample->S3_Writing_Sample_Submitted_By,
                "S3_Writing_Sample_Acknowledgment" => $getWritingSample->S3_Writing_Sample_Acknowledgment,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']

            ];
            $newArr[] = $getWritingSample['S1_Writing_Sample'] ? $arr1 : null;
            $newArr[] = $getWritingSample['S2_Writing_Sample'] ? $arr2 : null;
            $newArr[] = $getWritingSample['S3_Writing_Sample'] ? $arr3 : null;

            foreach ($newArr as $key => $value) {
                if (!is_null($value)) {
                    array_push($this->writingSample, $value);
                }
            }
            // dd($this->writingSample);

            $this->isEdit = true;
        } else {

            //dd('Else');

            $arr1 = [
                "S1_Writing_Sample" => '',
                "S1_Writing_Sample_Submitted_By" => '',
                "S1_Writing_Sample_Acknowledgment" => '',
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $arr2 = [
                "S2_Writing_Sample" => '',
                "S2_Writing_Sample_Submitted_By" => '',
                "S2_Writing_Sample_Acknowledgment" => '',
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $arr3 = [
                "S3_Writing_Sample" => '',
                "S3_Writing_Sample_Submitted_By" => '',
                "S3_Writing_Sample_Acknowledgment" => '',
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
            $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
            $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
            //dd($getStudent,$studentArr);
            foreach ($studentArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($this->writingSample, $arr);
                }
            }
            // dd($getStudent,$studentArr,$this->writingSample);
        }
    }

    public function saveOrUpdate()
    {
        // dd($this->writingSample);

        if (count($this->writingSample) == 1) {
            $this->validate($this->writingSampleOneValidation());
        } elseif (count($this->writingSample) == 2) {
            $this->validate($this->writingSampleTwoValidation());
        } elseif (count($this->writingSample) == 3) {
            $this->validate($this->writingSampleThreeValidation());
        }

        $new_writing_sample_arr = Arr::collapse($this->writingSample);
        unset($new_writing_sample_arr['Student_name']);
        //dd($new_writing_sample_arr);

        if ($this->isEdit) {
            WritingSample::find($this->writing_sample_id)->delete();
        }
        $new_writing_sample_arr['Profile_ID'] = Auth::guard('customer')->user()->id;
        $new_writing_sample_arr['Application_ID'] = $this->application_id;
        // dd($new_writing_sample_arr);
        WritingSample::create($new_writing_sample_arr);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'ten']);
        // $msgAction = 'Spiritual & Community Info ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        // $this->showToastr("success", $msgAction);
        return redirect()->route('admission-application', ['step' => 'ten']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-nine');
    }

    //Validition and Custom Message
    public function writingSampleOneValidation(): array
    {
        return [
            'writingSample.0.S1_Writing_Sample' => ['required','max:250'],
            'writingSample.0.S1_Writing_Sample_Submitted_By' => ['required','max:250'],
            'writingSample.0.S1_Writing_Sample_Acknowledgment' => ['accepted','max:250'],
        ];
    }

    public function writingSampleTwoValidation(): array
    {
        return [
            'writingSample.0.S1_Writing_Sample' => ['required'],
            'writingSample.0.S1_Writing_Sample_Submitted_By' => ['required'],
            'writingSample.0.S1_Writing_Sample_Acknowledgment' => ['accepted'],
            'writingSample.1.S2_Writing_Sample' => ['required'],
            'writingSample.1.S2_Writing_Sample_Submitted_By' => ['required'],
            'writingSample.1.S2_Writing_Sample_Acknowledgment' => ['accepted'],
        ];
    }

    public function writingSampleThreeValidation(): array
    {
        return [
            'writingSample.0.S1_Writing_Sample' => ['required'],
            'writingSample.0.S1_Writing_Sample_Submitted_By' => ['required'],
            'writingSample.0.S1_Writing_Sample_Acknowledgment' => ['accepted'],

            'writingSample.1.S2_Writing_Sample' => ['required'],
            'writingSample.1.S2_Writing_Sample_Submitted_By' => ['required'],
            'writingSample.1.S2_Writing_Sample_Acknowledgment' => ['accepted'],

            'writingSample.2.S3_Writing_Sample' => ['required'],
            'writingSample.2.S3_Writing_Sample_Submitted_By' => ['required'],
            'writingSample.2.S3_Writing_Sample_Acknowledgment' => ['accepted'],
        ];
    }
}
