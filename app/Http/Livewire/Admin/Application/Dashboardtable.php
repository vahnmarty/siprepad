<?php

namespace App\Http\Livewire\Admin\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\StudentInformation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;

class Dashboardtable extends Component
{
    use WithPagination;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];
    protected $paginationTheme = 'bootstrap';
    public $searchFirstName, $searchLastName, $searchEmail, $searchPhone, $perPage = 10;
    public $first_name_sort = false, $first_name_sort_by;
    public $last_name_sort = false, $last_name_sort_by;
    public $app;
    public $notification;
    public $registeration;
    public $appStatus;
    public $studentTransfer;
    public function mount($app = Null,$notificationButton = null,$register = null ,$applicationstatus = null,$studentTransfer= null)
    {
        $this->appStatus = $applicationstatus;
        $this->registeration = $register;
        $this->studentTransfer = $studentTransfer;
        $this->applications =$app;
        $this->notification = $notificationButton;
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
        $this->status = request('status');
        $this->first_name_sort_by = 'asc';
        $this->last_name_sort_by = 'asc';
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchFirstName = "";
        $this->searchLastName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
    }

    public function render()
    {
        dd($this->applications);
        //$this->first_name_sort_by = ($this->first_name_sort_by == 'asc') ? 'desc' : 'asc';

        $dbQuery = StudentInformation::query();

        if ($this->searchFirstName) {
            $dbQuery->where(function ($query) {
                $query->where('S1_First_Name', 'like', '%' . trim($this->searchFirstName) . '%')
                    ->orWhere('S2_First_Name', 'like', '%' . trim($this->searchFirstName) . '%')
                    ->orWhere('S3_First_Name', 'like', '%' . trim($this->searchFirstName) . '%');
            });
        }

        if ($this->searchLastName) {
            $dbQuery->where(function ($query) {
                $query->where('S1_Last_Name', 'like', '%' . trim($this->searchLastName) . '%')
                    ->orWhere('S2_Last_Name', 'like', '%' . trim($this->searchLastName) . '%')
                    ->orWhere('S3_Last_Name', 'like', '%' . trim($this->searchLastName) . '%');
            });
        }

        if ($this->searchEmail) {
            $dbQuery->where(function ($query) {
                $query->where('S1_Personal_Email', 'like', '%' . trim($this->searchEmail) . '%')
                    ->orWhere('S2_Personal_Email', 'like', '%' . trim($this->searchEmail) . '%')
                    ->orWhere('S3_Personal_Email', 'like', '%' . trim($this->searchEmail) . '%');
            });
        }

        if ($this->searchPhone) {
            $dbQuery->where(function ($query) {
                $query->where('S1_Mobile_Phone', 'like', '%' . trim($this->searchPhone) . '%')
                    ->orWhere('S2_Mobile_Phone', 'like', '%' . trim($this->searchPhone) . '%')
                    ->orWhere('S3_Mobile_Phone', 'like', '%' . trim($this->searchPhone) . '%');
            });
        }

        $getData = $dbQuery->join('applications', 'applications.Application_ID', 'student_information.Application_ID')
            ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
            ->orderBy('Application_ID', 'desc')
            ->get();
        //dd($getData);

        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {

                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S1_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S1_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S1_Last_Name),
                    "Suffix" =>  $getStudentInfo->S1_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S1_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S1_Birthdate,
                    "Gender" =>  $getStudentInfo->S1_Gender,
                    "Personal_Email" =>  $getStudentInfo->S1_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S1_Mobile_Phone,
                    "Race" => $getStudentInfo->S1_Race,
                    "Ethnicity" =>  $getStudentInfo->S1_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S1_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S1_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S1_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S1_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S1_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S1_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type"=>Application::STUDENT_ONE
                ];

                $student2 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S2_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S2_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S2_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S2_Last_Name),
                    "Suffix" =>  $getStudentInfo->S2_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S2_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S2_Birthdate,
                    "Gender" =>  $getStudentInfo->S2_Gender,
                    "Personal_Email" =>  $getStudentInfo->S2_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S2_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S2_Race,
                    "Ethnicity" =>  $getStudentInfo->S2_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S2_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S2_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S2_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S2_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S2_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S2_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type"=>Application::STUDENT_TWO

                ];

                $student3 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S3_Photo,
                    "First_Name" => Str::lower($getStudentInfo->S3_First_Name),
                    "Middle_Name" =>  $getStudentInfo->S3_Middle_Name,
                    "Last_Name" =>  Str::lower($getStudentInfo->S3_Last_Name),
                    "Suffix" =>  $getStudentInfo->S3_Suffix,
                    "Preferred_First_Name" =>  $getStudentInfo->S3_Preferred_First_Name,
                    "Birthday" =>  $getStudentInfo->S3_Birthdate,
                    "Gender" =>  $getStudentInfo->S3_Gender,
                    "Personal_Email" =>  $getStudentInfo->S3_Personal_Email,
                    "Mobile_Phone" =>  $getStudentInfo->S3_Mobile_Phone,
                    "Race" =>  $getStudentInfo->S3_Race,
                    "Ethnicity" =>  $getStudentInfo->S3_Ethnicity,
                    "Current_School" =>  $getStudentInfo->S3_Current_School,
                    "Current_School_Not_Listed" =>  $getStudentInfo->S3_Current_School_Not_Listed,
                    "Other_High_School_1" =>  $getStudentInfo->S3_Other_High_School_1,
                    "Other_High_School_2" =>  $getStudentInfo->S3_Other_High_School_2,
                    "Other_High_School_3" =>  $getStudentInfo->S3_Other_High_School_3,
                    "Other_High_School_4" =>  $getStudentInfo->S3_Other_High_School_4,
                    "last_step_complete" => $getStudentInfo->last_step_complete,
                    "status" => $getStudentInfo->status,
                    "student_type"=>Application::STUDENT_THREE

                ];

                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;

                //dd($studentArr);
                $studentInfo = [];
                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }

        if ($this->searchFirstName) {
            $studentInfo = $this->searchArray($studentInfo, 'First_Name', Str::lower(trim($this->searchFirstName)));
            //dd($studentInfo);
        }
        if ($this->searchLastName) {
            $studentInfo = $this->searchArray($studentInfo, 'Last_Name', Str::lower(trim($this->searchLastName)));
            //dd($studentInfo);
        }
        if ($this->searchEmail) {
            $studentInfo = $this->searchArray($studentInfo, 'Personal_Email', Str::lower(trim($this->searchEmail)));
            //dd($studentInfo);
        }
        if ($this->searchPhone) {
            $studentInfo = $this->searchArray($studentInfo, 'Mobile_Phone', Str::lower(trim($this->searchPhone)));
            //dd($studentInfo);
        }

        //dd($this->first_name_sort_by);
        if ($this->first_name_sort) {
            $First_Name = array_column($studentInfo, 'First_Name');
            if ($this->first_name_sort_by == "asc") {
                array_multisort($First_Name, SORT_ASC, $studentInfo);
            } else {
                array_multisort($First_Name, SORT_DESC, $studentInfo);
            }
        }

        if ($this->last_name_sort) {
            $Last_Name = array_column($studentInfo, 'Last_Name');
            if ($this->last_name_sort_by == "asc") {
                array_multisort($Last_Name, SORT_ASC, $studentInfo);
            } else {
                array_multisort($Last_Name, SORT_DESC, $studentInfo);
            }
        }

        $myCollectionObj = collect($studentInfo);
//          dd($myCollectionObj);
        $data = $this->paginate($myCollectionObj, $this->perPage);
        
        return view('livewire.admin.application.dashboardtable', ['students' => $data]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function searchArray($array, $key, $value)
    {
        $results = array();

        if (is_array($array)) {
            if (isset($array[$key])) {
                if (strpos($array[$key], $value) !== false) {
                    $results[] = $array;
                }
            }

            foreach ($array as $subarray) {
                $results = array_merge($results, $this->searchArray($subarray, $key, $value));
            }
        }

        return $results;
    }

    public function sortByName($data)
    {
        if ($data == "first_name") {
            $this->first_name_sort_by = ($this->first_name_sort_by == 'asc') ? 'desc' : 'asc';
            $this->last_name_sort = false;
            $this->first_name_sort = true;
        } else {
            $this->last_name_sort_by = ($this->last_name_sort_by == 'asc') ? 'desc' : 'asc';
            $this->first_name_sort = false;
            $this->last_name_sort = true;
        }
    }
}
