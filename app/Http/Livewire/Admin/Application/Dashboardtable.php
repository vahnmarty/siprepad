<?php

namespace App\Http\Livewire\Admin\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\StudentInformation;
use App\Models\Payment;
use App\Models\StudentApplicationStatus;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Notification;

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
    public $dashboardViewData;
    public function mount($dashboardView = null)
    {

        $this->dashboardViewData = $dashboardView;
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

        if ($this->dashboardViewData == "applicationIncompleteCount") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID')
                        ->where('applications.status', '=', 0);
                })
                ->get();
            $data = self::getStudentInfo($getData);
            return view('livewire.admin.application.dashboardtable', ['students' => $data]);
        } elseif ($this->dashboardViewData == "applicationCompleteCount") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID')
                        ->where('applications.status', '=', 1);
                })
                ->get();
            $data = self::getStudentInfo($getData);
            return view('livewire.admin.application.dashboardtable', ['students' => $data]);
        } elseif ($this->dashboardViewData == "applicationCount") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $data = self::getStudentInfo($getData);
            return view('livewire.admin.application.dashboardtable', ['students' => $data]);
        } elseif ($this->dashboardViewData == "applicationsAccepted") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();
            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 1);

                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "applicationsWaitListed") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();
            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 2);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "applicationsReject") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();



            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 3);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "totalNotifications") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
                // dd($getData);
            $StudentApplicationStatus = StudentApplicationStatus::get();


            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 3);
                return view('livewire.admin.application.dashboardtableNotification', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "candidateStatusNoDef") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();
            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationsAccepted($getData, $StudentApplicationStatus, 0);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "notRead") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();


            if (count($StudentApplicationStatus) > 0) {
                $data = self::getReadOrNotRead($getData, $StudentApplicationStatus, 0, '');
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "read") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();
            if (count($StudentApplicationStatus) > 0) {
                $data = self::getReadOrNotRead($getData, $StudentApplicationStatus, 0, '!');
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "acceptedOffer") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();



            if (count($StudentApplicationStatus) > 0) {
                $data = self::getApplicationAccepted($getData, $StudentApplicationStatus, 1);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "rejectedOffer") {
            $dbQuery = StudentInformation::query();
            $getData = $dbQuery
                ->join('applications', function ($join) {
                    $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                })
                ->get();
            $StudentApplicationStatus = StudentApplicationStatus::get();


            if (count($StudentApplicationStatus) > 0) {
                $data = self::getCandidateAccepted($getData, $StudentApplicationStatus, 3);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $data = [];
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } elseif ($this->dashboardViewData == "depositPaid") {
            $dbQuery = Payment::get();

            $data = self::getPayDepositCandidate($dbQuery);

            return view('livewire.admin.application.dashboardtableDepositPay', ['students' => $data]);
        } elseif ($this->dashboardViewData == "incompleteRegistration") {
            $dbQueryPayment = Payment::get();
            $getData = StudentInformation::join('applications', 'applications.Application_ID', 'student_information.Application_ID')
                ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
                ->where('applications.last_step_complete', 'ten')
                ->get();

            if (count($dbQueryPayment) > 0) {

                $data = self::getNotDepositPayment($getData, $dbQueryPayment);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            } else {
                $dbQuery = StudentInformation::query();
                $getData = $dbQuery
                    ->join('applications', function ($join) {
                        $join->on('applications.Application_ID', '=', 'student_information.Application_ID');
                    })
                    ->get();
                $data = self::getStudentInfo($getData);
                return view('livewire.admin.application.dashboardtable', ['students' => $data]);
            }
        } else {

            $data = [];
            return view('livewire.admin.application.dashboardtable', ['students' => $data]);
        }
    }
    private function getStudentInfo($getData)
    {
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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;

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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getApplicationsAccepted($getData, $StudentApplicationStatus, $applicationType)
    {
        $studentArr = [];
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_application_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_application_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_application_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                foreach ($StudentApplicationStatusResults as $result) {
                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($result['s1_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s2_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s3_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                            $studentArr[] = $student2 = null;
                            $studentArr[] = $student3 = null;
                        }
                    }
                }
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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getNotDepositPayment($getData, $StudentApplicationStatus)
    {

        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['student'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }

        if (count($getData) > 0) {
            $studentArr = [];

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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                foreach ($StudentApplicationStatusResults as $result) {
                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($result['s1_application_status'] == 's1') {
                            $studentArr[] = $student1 = null;
                        } else {

                            $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        }
                        if ($result['s1_application_status'] == 's2') {
                            $studentArr[] = $student2 = null;
                        } else {
                            $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        }
                        if ($result['s1_application_status'] == 's3') {
                            $studentArr[] = $student3 = null;
                        } else {

                            $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                        }
                    } else {
                        $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                    }
                }

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
        // dd($studentArr);
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getPayDepositCandidate($getData)
    {
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo) {
                $student1 = [
                    "Application_ID" => $getStudentInfo->Application_ID,
                    "Photo" =>  $getStudentInfo->S1_Photo,
                    "student_dob" => Str::lower($getStudentInfo->student_dob),
                    "student_name" =>  $getStudentInfo->student_name,
                    "email" =>  Str::lower($getStudentInfo->student_email)
                ];

                $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;

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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getApplicationAccepted($getData, $StudentApplicationStatus, $applicationType)
    {
        $studentArr=[];
        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_application_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_application_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_application_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }

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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                foreach ($StudentApplicationStatusResults as $result) {
                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($result['s1_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s2_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        } else {

                            $studentArr[] = $student2 = null;
                        }
                        if ($result['s3_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                        } else {


                            $studentArr[] = $student3 = null;
                        }
                    }
                }
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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getCandidateAccepted($getData, $StudentApplicationStatus, $applicationType)
    {
        $studentArr=[];

        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }
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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                foreach ($StudentApplicationStatusResults as $result) {
                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($result['s1_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                        } else {

                            $studentArr[] = $student1 = null;
                        }
                        if ($result['s2_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                        } else {

                            $studentArr[] = $student2 = null;
                        }
                        if ($result['s3_application_status'] == $applicationType) {
                            $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                        } else {


                            $studentArr[] = $student3 = null;
                        }
                    }
                }
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
        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
    }
    private function getReadOrNotRead($getData, $StudentApplicationStatus, $applicationType, $notNullOrNull)
    {
        $studentArr=[];

        foreach ($StudentApplicationStatus as $key => $StudentApplicationStatusResult) {
            $StudentApplicationStatusResults[$key]['s1_application_status'] = $StudentApplicationStatusResult['s1_candidate_status'];
            $StudentApplicationStatusResults[$key]['s2_application_status'] = $StudentApplicationStatusResult['s2_candidate_status'];
            $StudentApplicationStatusResults[$key]['s3_application_status'] = $StudentApplicationStatusResult['s3_candidate_status'];
            $StudentApplicationStatusResults[$key]['application_id'] = $StudentApplicationStatusResult['application_id'];
        }

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
                    "student_type" => Application::STUDENT_ONE
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
                    "student_type" => Application::STUDENT_TWO

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
                    "student_type" => Application::STUDENT_THREE

                ];
                $studentInfo = [];
                $studentArr = [];

                foreach ($StudentApplicationStatusResults as $result) {

                    if ($getStudentInfo->Application_ID == $result['application_id']) {
                        if ($notNullOrNull == "!") {
                            if (!$result['s1_application_status'] == $applicationType) {
                                $notificationOne = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_one')->get()->where('is_read', '=', 1)->toArray();
                                if (count($notificationOne) > 0) {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if (!$result['s2_application_status'] == $applicationType) {
                                $notificationTwo = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_two')->where('is_read', '=', 1)->get();
                                if (count($notificationTwo) > 0) {
                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if (!$result['s3_application_status'] == $applicationType) {
                                $notificationThree = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_three')->where('is_read', '=', 1)->get();
                                if (count($notificationThree) > 0) {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                } else {

                                    $studentArr[] = $student1 = null;
                                }
                            } else {



                                $studentArr[] = $student3 = null;
                            }
                        } else {


                            if ($result['s1_application_status'] == $applicationType) {

                                $notificationOne = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_one')->get();
                                if (count($notificationOne) > 0) {
                                    $studentArr[] = $getStudentInfo->S1_First_Name ? $student1 : null;
                                } else {
                                    $studentArr[] = $student1 = null;
                                }
                            } else {

                                $studentArr[] = $student1 = null;
                            }
                            if ($result['s2_application_status'] == $applicationType) {
                                $notificationTwo = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_two')->get();
                                if (count($notificationTwo) > 0) {

                                    $studentArr[] = $getStudentInfo->S2_First_Name ? $student2 : null;
                                } else {

                                    $studentArr[] = $student2 = null;
                                }
                            } else {

                                $studentArr[] = $student2 = null;
                            }
                            if ($result['s3_application_status'] == $applicationType) {
                                $notificationThree = Notification::where('application_id', '=', $result['application_id'])->where('student_profile', '=', 'student_three')->get();
                                if (count($notificationThree) > 0) {
                                    $studentArr[] = $getStudentInfo->S3_First_Name ? $student3 : null;
                                } else {
                                    $studentArr[] = $student3 = null;
                                }
                            } else {
                                $studentArr[] = $student3 = null;
                            }
                        }
                    }
                }


                foreach ($studentArr as $student) {
                    if (!is_null($student)) {
                        array_push($studentInfo, $student);
                    }
                }
            }
        } else {
            $studentInfo = [];
        }

        return $myCollectionObj = collect($studentInfo);
        // return $data = $this->paginate($myCollectionObj, $this->perPage);
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
