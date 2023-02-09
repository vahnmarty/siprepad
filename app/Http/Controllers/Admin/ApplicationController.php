<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Notification;

use App\Models\StudentInformation;
use App\Models\StudentApplicationStatus;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    public $GlobalNotifiable;
    public $GlobalRegisterable;
    public $GlobalStudentTransfer;
    public function __construct()
    {
        $this->GlobalNotifiable = Helper::getGlobalNotifiable();
        $this->GlobalRegisterable = Helper::getGlobalRegisterable();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.admin-login');
         }
        $user = Auth::guard('customer')->user('id');
        $app = Application::all();


        $notifications = $this->GlobalNotifiable;
        $registerable = $this->GlobalRegisterable;
        $students=  $stuinfo = StudentInformation::all();
//         dd($stuinfo);
      
        return view('admin.application.index', compact('app', 'notifications', 'registerable','stuinfo','students'));
    }

    
    public  function getStudentData(Request $request){
        $studentArr=[];
        $draw 				= 		$request->get('draw'); 
        $start 				= 		$request->get("start"); 
        $rowPerPage 		= 		$request->get("length"); 
        $orderArray 	   = 		$request->get('order');
        $columnNameArray 	= 		$request->get('columns'); 
        $searchArray 		= 		$request->get('search');
        $columnIndex 		= 		$orderArray[0]['column'];  
        $columnName 		= 		$columnNameArray[$columnIndex]['data']; 
        $columnSortOrder 	= 		$orderArray[0]['dir']; 
        $searchValue 		= 		$searchArray['value']; 
        $dbQuery = StudentInformation::query();
        $getData = $dbQuery->join('applications', 'applications.Application_ID', 'student_information.Application_ID')
        ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
        ->orderBy('Application_ID', 'desc')
        ->skip($start)->take($draw)->get();
       
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo)
            {
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
            }
        } else {
            
        }
        $totalFilter = count($studentArr);
        $response = array(
            "draw" => intval($draw),
            "recordsTotal" =>self::renderStudent(),
            "recordsFiltered" => $totalFilter,
            "data" => $studentArr,
        );
        return  response()->json($response);
    }

    public function showDashboardValues(Request $request, $dashboardView)
    {

        return view('admin.application.dashboardtable', compact('dashboardView'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application.create-edit', [
            'application' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function renderStudent()
    {
        //$this->first_name_sort_by = ($this->first_name_sort_by == 'asc') ? 'desc' : 'asc';
        $dbQuery = StudentInformation::query();
        
      
        
        
        $getData = $dbQuery->join('applications', 'applications.Application_ID', 'student_information.Application_ID')
        ->select('student_information.*', 'applications.status', 'applications.last_step_complete')
        ->orderBy('Application_ID', 'desc')
        ->get();
        
        
        
        //             {
        //                             $stuinfo = StudentInformation::find('id');
        
        //                             $res = response()->json($stuinfo);
        //                             dd($res);
        //                             return response()->json($stuinfo);
        
        //                         }
        
        
        
        //         $data['users'] = StudentInformation::orderBy('id','desc')->paginate(5);
        //         dd($data);
        
        //         $count = StudentInformation::count();
        //         $skip = 35;
        //         $limit = $count - $skip; // the limit
        //         $getData = StudentInformation::skip($skip)->take($limit)->get();
        
        if (count($getData) > 0) {
            foreach ($getData as $key => $getStudentInfo)
            {
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
                
            }
        } else {
            $studentInfo = [];
        }
        
   
        
       
        
        
        //  dd($myCollectionObj);
        // $data = $this->paginate($myCollectionObj, $this->perPage);
        
        return  count($studentArr);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::where('Application_ID', $id)->first();

        if (!is_null($application)) {
            return view('admin.application.show', [
                'application' => $application
            ]);
        } else {
            return redirect()->route('application.index')->with('error', 'Application Not Found! Please, Try Again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        if (!is_null($application)) {
            return view('admin.application.create-edit', [
                'application' => $application
            ]);
        } else {
            return redirect()->route('application.index')->with('error', 'Application Not Found! Please, Try Again.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Change the candidate status in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusSubmit(Request $request)
    {

        $appID = $request->post('app_id');
        $student_type = $request->student_type;

        $user = $request->profile_id;
        $applicationStatus = $request->post('app_type_id');

        $student_type = $request->student_type;
        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $email = $request->email;
        $dob = $request->dob;
        $firstName = strtolower($firstName);
        $lastName = strtolower($lastName);


        $studentInfo = StudentInformation::where([
            ['Profile_ID', '=', $user],
            ['Application_ID', '=', $appID]
        ])->first();


        switch ($applicationStatus) {
            case 1:
                $message = 'Congratulations '.ucfirst($firstName) .''.$lastName.'! Your application has been accepted.';
                $ntfType = Notification::NOTIFY_ACCEPTED;
                break;
            case 2:
                $message = ucfirst($firstName) .''.$lastName.' Your application is in Waiting List. We will in touch with you shortly.';
                $ntfType = Notification::NOTIFY_WAITLIST;
                break;
            case 3:
                $message = 'Sorry ' .ucfirst($firstName) .''.$lastName.'! Your application has been rejected. Better Luck next time.';
                $ntfType = Notification::NOTIFY_REJECTED;
                break;
            default:
                $message = 'Nothing';
                $ntfType = Notification::NOTIFY_NO_STATUS;
        }
        DB::beginTransaction();
        if ($studentInfo) {
            if ($student_type == Application::STUDENT_ONE) {
                $checkStatus = StudentApplicationStatus::where([
                    ['application_id', '=', $appID],
                    ['profile_id', '=', $user]
                ])->first();

                if ($applicationStatus == Application::No_RESPONSE) {

                    if (empty($checkStatus)) {
                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s1_application_status = $applicationStatus;
                        $setApplicationStatus->s1_candidate_status = 0;
                        $setApplicationStatus->s1_notification_id = null;

                        if ($setApplicationStatus->save()) {

                            Notification::where('student_profile', '=', 'student_one')->where('application_id', '=', $appID)->delete();

                            DB::commit();
                            return 'Application Status Submitted Successfully!!!!';
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                    } else {
                        $checkStatus->update([
                            's1_application_status' => $applicationStatus,
                            's1_notification_id' => null,
                            's1_candidate_status' => 0
                        ]);
                        Notification::where('student_profile', '=', 'student_one')->where('application_id', '=', $appID)->delete();

                        DB::commit();
                        return "Application Status has been registered";
                    }
                } else {
                    if (empty($checkStatus)) {
                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s1_application_status = $applicationStatus;
                        if ($setApplicationStatus->save()) {
                            $newNotification = new Notification();
                            $newNotification->profile_id = $user;
                            $newNotification->application_id = $appID;
                            $newNotification->student_profile = 'student_one';
                            $newNotification->message = $message;
                            $newNotification->notification_type = $ntfType;
                            Notification::where('student_profile', '=', 'student_one')->where('application_id', '=', $appID)->delete();
                            if ($newNotification->save()) {
                                $latestNotification = $newNotification->id;
                                $appstatus =  StudentApplicationStatus::latest('id')->select('id')->first();
                                StudentApplicationStatus::where('id', $appstatus->id)
                                    ->update([
                                        's1_notification_id' => $latestNotification,
                                    ]);
                                DB::commit();
                                return 'Application Status Submitted Successfully!!!!';
                            } else {
                                DB::rollBack();
                                return 'Something went wrong';
                            }
                        } else {

                            DB::rollBack();
                            return 'Something went wrong';
                        }
                    } else {
                        $checkStatus->update([
                            's1_application_status' => $applicationStatus,
                        ]);
                        $newNotification = new Notification();
                        $newNotification->profile_id = $user;
                        $newNotification->application_id = $appID;
                        $newNotification->student_profile = 'student_one';
                        $newNotification->message = $message;
                        $newNotification->notification_type = $ntfType;
                        Notification::where('student_profile', '=', 'student_one')->where('application_id', '=', $appID)->delete();

                        if ($newNotification->save()) {
                            $latestNotification = $newNotification->id;
                            $checkStatus->update([
                                's1_notification_id' => $latestNotification,
                            ]);
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                        DB::commit();
                        return "Application Status has been registered";
                    }
                }
            } else if ($student_type == Application::STUDENT_TWO) {
                $checkStatus = StudentApplicationStatus::where([
                    ['application_id', '=', $appID],
                    ['profile_id', '=', $user]
                ])->first();
                if ($applicationStatus == Application::No_RESPONSE) {
                    if (empty($checkStatus)) {
                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s2_application_status = $applicationStatus;
                        $setApplicationStatus->s2_notification_id = null;
                        $setApplicationStatus->s2_candidate_status = 0;



                        if ($setApplicationStatus->save()) {
                           Notification::where('student_profile', '=', 'student_two')->where('application_id', '=', $appID)->delete();
                        
                            DB::commit();

                            return 'Application Status Submitted Successfully!!!!';
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                    } else {
                        $checkStatus->update([
                            's2_application_status' => $applicationStatus,
                            's2_notification_id' => null,
                            's2_candidate_status' => 0

                        ]);
                        Notification::where('student_profile', '=', 'student_two')->where('application_id', '=', $appID)->delete();

                        DB::commit();
                        return "Application Status has been registered";
                    }
                } else {
                    if (empty($checkStatus)) {
                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s2_application_status = $applicationStatus;
                        if ($setApplicationStatus->save()) {
                            $newNotification = new Notification();
                            $newNotification->profile_id = $user;
                            $newNotification->application_id = $appID;
                            $newNotification->student_profile = 'student_two';
                            $newNotification->message = $message;
                            $newNotification->notification_type = $ntfType;
                            Notification::where('student_profile', '=', 'student_two')->where('application_id', '=', $appID)->delete();

                            if ($newNotification->save()) {

                                $latestNotification = $newNotification->id;
                                $appstatus =  StudentApplicationStatus::latest('id')->select('id')->first();
                                StudentApplicationStatus::where('id', $appstatus->id)
                                    ->update([
                                        's2_notification_id' => $latestNotification,

                                    ]);
                                DB::commit();

                                return 'Application Status Submitted Successfully!!!!';
                            } else {
                                DB::rollBack();
                                return 'Something went wrong';
                            }
                        } else {
                            DB::rollBack();
                            return "Something went wrong";
                        }
                    } else {
                        $checkStatus->update([
                            's2_application_status' => $applicationStatus,
                        ]);
                        $newNotification = new Notification();
                        $newNotification->profile_id = $user;
                        $newNotification->application_id = $appID;
                        $newNotification->student_profile = 'student_two';
                        $newNotification->message = $message;
                        $newNotification->notification_type = $ntfType;
                        Notification::where('student_profile', '=', 'student_two')->where('application_id', '=', $appID)->delete();

                        if ($newNotification->save()) {

                            $latestNotification = $newNotification->id;
                            $checkStatus->update([
                                's2_notification_id' => $latestNotification,
                            ]);
                        } else {
                            DB::rollBack();
                            return "Something went wrong";
                        }
                        DB::commit();
                        return "Application Status has been registered";
                    }
                }
            } else if ($student_type == Application::STUDENT_THREE) {

                $checkStatus = StudentApplicationStatus::where([
                    ['application_id', '=', $appID],
                    ['profile_id', '=', $user]
                ])->first();
                if ($applicationStatus == Application::No_RESPONSE) {
                    if (empty($checkStatus)) {

                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s3_application_status = $applicationStatus;
                        $setApplicationStatus->s3_notification_id = null;
                        $setApplicationStatus->s3_candidate_status = 0;


                        if ($setApplicationStatus->save()) {
                            Notification::where('student_profile', '=', 'student_three')->where('application_id', '=', $appID)->delete();

                            DB::commit();
                            return 'Application Status Submitted Successfully!!!!';
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                    } else {
                        $checkStatus->update([
                            's3_application_status' => $applicationStatus,
                            's3_notification_id' => null,
                            's3_candidate_status' => 0

                        ]);
                        Notification::where('student_profile', '=', 'student_three')->where('application_id', '=', $appID)->delete();

                        DB::commit();
                        return "Application Status has been registered";
                    }
                } else {
                    if (empty($checkStatus)) {
                        $setApplicationStatus = new StudentApplicationStatus();
                        $setApplicationStatus->application_id = $appID;
                        $setApplicationStatus->profile_id = $user;
                        $setApplicationStatus->s3_application_status = $applicationStatus;
                        if ($setApplicationStatus->save()) {
                            $newNotification = new Notification();
                            $newNotification->profile_id = $user;
                            $newNotification->application_id = $appID;
                            $newNotification->student_profile = 'student_three';
                            $newNotification->message = $message;
                            $newNotification->notification_type = $ntfType;
                            Notification::where('student_profile', '=', 'student_three')->where('application_id', '=', $appID)->delete();

                            if ($newNotification->save()) {

                                $latestNotification = $newNotification->id;
                                $appstatus =  StudentApplicationStatus::latest('id')->select('id')->first();
                                StudentApplicationStatus::where('id', $appstatus->id)
                                    ->update([
                                        's3_notification_id' => $latestNotification,
                                    ]);
                                DB::commit();
                                return 'Application Status Submitted Successfully!!!!';
                            } else {
                                DB::rollBack();
                                return 'Something went wrong';
                            }
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                    } else {
                        $checkStatus->update([
                            's3_application_status' => $applicationStatus,
                        ]);
                        $newNotification = new Notification();
                        $newNotification->profile_id = $user;
                        $newNotification->application_id = $appID;
                        $newNotification->student_profile = 'student_three';
                        $newNotification->message = $message;
                        $newNotification->notification_type = $ntfType;
                        Notification::where('student_profile', '=', 'student_three')->where('application_id', '=', $appID)->delete();

                        if ($newNotification->save()) {

                            $latestNotification = $newNotification->id;
                            $checkStatus->update([
                                's3_notification_id' => $latestNotification,
                            ]);
                        } else {
                            DB::rollBack();
                            return 'Something went wrong';
                        }
                        DB::commit();
                        return "Application Status has been registered";
                    }
                }
            }
        } else {
            DB::rollBack();
            return 'Application not found';
        }
    }


        
    
    
    
    
}
