<?php

namespace App\Http\Livewire\Frontend\Application;

use App\Helpers\ApplicationConstHelper;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\StudentInformation;
use App\Models\StudentStatement;
use App\Rules\MaxWordsRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplicationEight extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $numberOfYears = [], $hoursPerWeek = [];
    public  $isEdit = false, $studentStatementInfo_id, $application_id, $studentStatementInfo = [], $i = 1, $j = 1, $k = 1, $studentInfo;

    public function mount($getStudentStatementInfo = null)
    {
        //dd($getStudentStatementInfo);
        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $getStudent = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)
            ->where('Application_ID', $getApplication->Application_ID)->first()->toArray();

        $Students_Statement = [];
        $arr1 = [
            "S1_Why_did_you_decide_to_apply_to_SI" => '',
            "S1_Greatest_Challenge" => '',
            "S1_Religious_Activities_for_Growth" => '',
            'S1_Favorite_and_most_difficult_subjects' => '',
            "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
        ];
        $arr2 = [
            "S2_Why_did_you_decide_to_apply_to_SI" => '',
            "S2_Greatest_Challenge" => '',
            "S2_Religious_Activities_for_Growth" => '',
            'S2_Favorite_and_most_difficult_subjects' => '',
            "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
        ];
        $arr3 = [
            "S3_Why_did_you_decide_to_apply_to_SI" => '',
            "S3_Greatest_Challenge" => '',
            "S3_Religious_Activities_for_Growth" => '',
            'S3_Favorite_and_most_difficult_subjects' => '',
            "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
        ];
        $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
        $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
        $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
        foreach ($studentArr as $key => $arr) {
            if (!is_null($arr)) {
                array_push($Students_Statement, $arr);
            }
        }

        //
        $Extracurricular_Activities = [];
        $arr1 = [
            "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name'],
            "Activity" => [
                [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ]
            ]
        ];
        $arr2 = [
            "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name'],
            "Activity" => [
                [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ]
            ]
        ];
        $arr3 = [
            "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name'],
            "Activity" => [
                [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ]
            ]
        ];
        $extracurricularActivitiesArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
        $extracurricularActivitiesArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
        $extracurricularActivitiesArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
        foreach ($extracurricularActivitiesArr as $key => $arr) {
            if (!is_null($arr)) {
                array_push($Extracurricular_Activities, $arr);
            }
        }

        //
        $Future_Activities = [];
        $arr1 = [
            "S1_Most_Passionate_Activity" => '',
            "S1_Extracurricular_Activity_at_SI" => '',
            "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
        ];
        $arr2 = [
            "S2_Most_Passionate_Activity" => '',
            "S2_Extracurricular_Activity_at_SI" => '',
            "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
        ];
        $arr3 = [
            "S3_Most_Passionate_Activity" => '',
            "S3_Extracurricular_Activity_at_SI" => '',
            "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
        ];

        $futureActivitiesArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
        $futureActivitiesArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
        $futureActivitiesArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
        foreach ($futureActivitiesArr as $key => $arr) {
            if (!is_null($arr)) {
                array_push($Future_Activities, $arr);
            }
        }


        if ($getStudentStatementInfo) {

            $this->studentStatementInfo_id = $getStudentStatementInfo->id;

            $get_Students_Statement = [];
            $statement1 = [
                "S1_Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S1_Why_did_you_decide_to_apply_to_SI,
                "S1_Greatest_Challenge" => $getStudentStatementInfo->S1_Greatest_Challenge,
                "S1_Religious_Activities_for_Growth" => $getStudentStatementInfo->S1_Religious_Activities_for_Growth,
                'S1_Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S1_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $statement2 = [
                "S2_Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S2_Why_did_you_decide_to_apply_to_SI,
                "S2_Greatest_Challenge" => $getStudentStatementInfo->S2_Greatest_Challenge,
                "S2_Religious_Activities_for_Growth" => $getStudentStatementInfo->S2_Religious_Activities_for_Growth,
                'S2_Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S2_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $statement3 = [
                "S3_Why_did_you_decide_to_apply_to_SI" => $getStudentStatementInfo->S3_Why_did_you_decide_to_apply_to_SI,
                "S3_Greatest_Challenge" => $getStudentStatementInfo->S3_Greatest_Challenge,
                "S3_Religious_Activities_for_Growth" => $getStudentStatementInfo->S3_Religious_Activities_for_Growth,
                'S3_Favorite_and_most_difficult_subjects' => $getStudentStatementInfo->S3_Favorite_and_most_difficult_subjects,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];

            $getStudentArr[] = $getStudent['S1_First_Name'] ? $statement1 : null;
            $getStudentArr[] = $getStudent['S2_First_Name'] ? $statement2 : null;
            $getStudentArr[] = $getStudent['S3_First_Name'] ? $statement3 : null;
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
                    //$this->i +=1;
                }
            }
            if (count($extracurricularActivitie1['Activity']) == 0) {
                $ar = [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ];
                array_push($extracurricularActivitie1['Activity'], $ar);
            }

            $this->i = count($extracurricularActivitie1['Activity']);
            //dd($extracurricularActivitie1);

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
                    //$this->j +=1;
                }
            }

            if (count($extracurricularActivitie2['Activity']) == 0) {
                $ar = [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ];
                array_push($extracurricularActivitie2['Activity'], $ar);
            }

            $this->j = count($extracurricularActivitie2['Activity']);
            //dd($extracurricularActivitie2);

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
                    //$this->k +=1;
                }
            }

            if (count($extracurricularActivitie3['Activity']) == 0) {
                $ar = [
                    "Activity_Name" => '',
                    "Number_of_Years" => '',
                    "Hours_Per_Week" => '',
                    "Info_about_activity" => '',
                ];
                array_push($extracurricularActivitie3['Activity'], $ar);
            }

            $this->k = count($extracurricularActivitie3['Activity']);
            //dd($extracurricularActivitie3);

            $getExtracurricularActivitiesArr[] = $getStudent['S1_First_Name'] ? $extracurricularActivitie1 : null;
            $getExtracurricularActivitiesArr[] = $getStudent['S2_First_Name'] ? $extracurricularActivitie2 : null;
            $getExtracurricularActivitiesArr[] = $getStudent['S3_First_Name'] ? $extracurricularActivitie3 : null;
            foreach ($getExtracurricularActivitiesArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($get_Extracurricular_Activities, $arr);
                }
            }

            //dd($get_Extracurricular_Activities);

            //
            $get_Future_Activities = [];
            $futureActivitie1 = [
                "S1_Most_Passionate_Activity" => $getStudentStatementInfo->S1_Most_Passionate_Activity,
                "S1_Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S1_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S1_First_Name'] . ' ' . $getStudent['S1_Last_Name']
            ];
            $futureActivitie2 = [
                "S2_Most_Passionate_Activity" => $getStudentStatementInfo->S2_Most_Passionate_Activity,
                "S2_Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S2_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S2_First_Name'] . ' ' . $getStudent['S2_Last_Name']
            ];
            $futureActivitie3 = [
                "S3_Most_Passionate_Activity" => $getStudentStatementInfo->S3_Most_Passionate_Activity,
                "S3_Extracurricular_Activity_at_SI" => $getStudentStatementInfo->S3_Extracurricular_Activity_at_SI,
                "Student_name" => $getStudent['S3_First_Name'] . ' ' . $getStudent['S3_Last_Name']
            ];
            $getFutureActivitiesArr[] = $getStudent['S1_First_Name'] ? $futureActivitie1 : null;
            $getFutureActivitiesArr[] = $getStudent['S2_First_Name'] ? $futureActivitie2 : null;
            $getFutureActivitiesArr[] = $getStudent['S3_First_Name'] ? $futureActivitie3 : null;
            foreach ($getFutureActivitiesArr as $key => $arr) {
                if (!is_null($arr)) {
                    array_push($get_Future_Activities, $arr);
                }
            }

            //
            $this->studentStatementInfo = [
                'Students_Statement' => !empty($get_Students_Statement) ? $get_Students_Statement : $Students_Statement,
                'Extracurricular_Activities' => !empty($get_Extracurricular_Activities) ? $get_Extracurricular_Activities : $Extracurricular_Activities,
                'Future_Activities' => !empty($get_Future_Activities) ? $get_Future_Activities : $Future_Activities
            ];

            //dd($this->studentStatementInfo);

            $this->isEdit = true;
        } else {
            //
            $this->studentStatementInfo = [
                'Students_Statement' => $Students_Statement,
                'Extracurricular_Activities' => $Extracurricular_Activities,
                'Future_Activities' => $Future_Activities
            ];

            //dd($this->studentStatementInfo);
        }

        $this->numberOfYears = ApplicationConstHelper::numberOfYears();

        $this->hoursPerWeek = ApplicationConstHelper::hoursPerWeek();
    }

    public function add($student_key, $activitie_key)
    {
        if ($student_key == 0) {
            $this->i += 1;
        } elseif ($student_key == 1) {
            $this->j += 1;
        } elseif ($student_key == 2) {
            $this->k += 1;
        }

        $arr = [
            'Activity_Name' => '',
            'Number_of_Years' => '',
            'Hours_Per_Week' => '',
            'Info_about_activity' => '',
        ];
        array_push($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity'], $arr);
    }

    public function remove($student_key, $activitie_key)
    {
        //dd($student_key, $activitie_key);

        unset($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity'][$activitie_key]);
        $this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity'] = array_values($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity']);
        if ($student_key == 0) {
            $this->i = count($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity']);
        } elseif ($student_key == 1) {
            $this->j = count($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity']);
        } elseif ($student_key == 2) {
            $this->k = count($this->studentStatementInfo['Extracurricular_Activities'][$student_key]['Activity']);
        }
    }

    public function saveOrUpdate()
    {
        //dd($this->studentStatementInfo);

        if (count($this->studentStatementInfo['Extracurricular_Activities']) == 1) {
            $this->validate($this->customOneValidation());
        } elseif (count($this->studentStatementInfo['Extracurricular_Activities']) == 2) {
            $this->validate($this->customTwoValidation());
        } elseif (count($this->studentStatementInfo['Extracurricular_Activities']) == 3) {
            $this->validate($this->customThreeValidation());
        }

        //
        $students_statement_arr = Arr::collapse($this->studentStatementInfo['Students_Statement']);
        $this->studentStatementInfo['Students_Statement'] = $students_statement_arr;

        //
        $activities_arr = [];
        foreach (array_values($this->studentStatementInfo['Extracurricular_Activities']) as $skey => $value) {
            foreach (array_values($value['Activity']) as $akey => $item) {
                $arr = [
                    'S' . ($skey + 1) . '_A' . ($akey + 1) . '_Activity_Name' => $item['Activity_Name'],
                    'S' . ($skey + 1) . '_A' . ($akey + 1) . '_Number_of_Years' => $item['Number_of_Years'],
                    'S' . ($skey + 1) . '_A' . ($akey + 1) . '_Hours_Per_Week' => $item['Hours_Per_Week'],
                    'S' . ($skey + 1) . '_A' . ($akey + 1) . '_Info_about_activity' => $item['Info_about_activity'],
                ];
                array_push($activities_arr, $arr);
            }
        }
        //dd($activities_arr);

        $extracurricular_activities_arr = Arr::collapse($activities_arr);
        $this->studentStatementInfo['Extracurricular_Activities'] =  $extracurricular_activities_arr;

        //
        $future_activities_arr = Arr::collapse($this->studentStatementInfo['Future_Activities']);
        $this->studentStatementInfo['Future_Activities'] = $future_activities_arr;

        //
        $final_array = Arr::collapse($this->studentStatementInfo);
        unset($final_array['Student_name']);
        //dd($final_array);

        //
        if ($this->isEdit) {
            StudentStatement::find($this->studentStatementInfo_id)->delete();
        }
        $final_array['Profile_ID'] = Auth::guard('customer')->user()->id;
        $final_array['Application_ID'] = $this->application_id;
        //dd($final_array);
        StudentStatement::create($final_array);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'nine']);


        // $msgAction = 'Student Statement ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        // $this->showToastr("success", $msgAction);
        return redirect()->route('admission-application', ['step' => 'nine']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-eight');
    }

    public function customOneValidation(): array
    {
        return [
            'studentStatementInfo.Students_Statement.0.S1_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],

            'studentStatementInfo.Extracurricular_Activities.*.Activity.*.*' => ['required'],

            'studentStatementInfo.Future_Activities.0.S1_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.0.S1_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
        ];
    }
    public function customTwoValidation(): array
    {
        return [
            'studentStatementInfo.Students_Statement.0.S1_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],
            //
            'studentStatementInfo.Extracurricular_Activities.*.Activity.*.*' => ['required'],
            //
            'studentStatementInfo.Future_Activities.0.S1_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.0.S1_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.1.S2_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.1.S2_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],

        ];
    }
    public function customThreeValidation(): array
    {
        return [
            //
            'studentStatementInfo.Students_Statement.0.S1_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.0.S1_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.1.S2_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.2.S3_Why_did_you_decide_to_apply_to_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.2.S3_Greatest_Challenge' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.2.S3_Religious_Activities_for_Growth' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Students_Statement.2.S3_Favorite_and_most_difficult_subjects' => ['required', 'max:1000',new MaxWordsRule(75)],

            //
            'studentStatementInfo.Extracurricular_Activities.*.Activity.*.*' => ['required'],
            //
            'studentStatementInfo.Future_Activities.0.S1_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.0.S1_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.1.S2_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.1.S2_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.2.S3_Most_Passionate_Activity' => ['required', 'max:1000',new MaxWordsRule(75)],
            'studentStatementInfo.Future_Activities.2.S3_Extracurricular_Activity_at_SI' => ['required', 'max:1000',new MaxWordsRule(75)],

        ];
    }
}
