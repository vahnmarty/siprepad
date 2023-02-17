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
        $this->GlobalStudentTransfer = Helper::getGlobalStudentTransfer();
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
        $studentTransfer = $this->GlobalRegisterable;
        return view('admin.application.index', compact('app', 'notifications', 'registerable','studentTransfer'));
    }


    public function getStudentInformation(Request $request)
    {

        $draw                 =         $request->get('draw'); // Internal use
        $start                 =         $request->get("start"); // where to start next records for pagination
        $rowPerPage         =         $request->get("length"); // How many recods needed per page for pagination

        $orderArray        =         $request->get('order');
        $columnNameArray     =         $request->get('columns'); // It will give us columns array

        $searchArray         =         $request->get('search');
        $columnIndex         =         $orderArray[0]['column'];  // This will let us know,
        // which column index should be sorted 
        // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName         =         $columnNameArray[$columnIndex]['data']; // Here we will get column name, 
        // Base on the index we get

        $columnSortOrder     =         $orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue         =         $searchArray['value']; // This is search value 
        $count = Application::TYPE_PENDING;



        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => 100,
            "recordsFiltered" => $count,
            "data" => 'Arsh',
        );

        return response()->json($response);
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
                $message = 'Congratulations ' . ucfirst($firstName) . '' . $lastName . ' ! Your application has been accepted.';
                $ntfType = Notification::NOTIFY_ACCEPTED;
                break;
            case 2:
                $message = ucfirst($firstName) . '' . $lastName . ' Your application is in Waiting List. We will in touch with you shortly.';
                $ntfType = Notification::NOTIFY_WAITLIST;
                break;
            case 3:
                $message = 'Sorry ' . ucfirst($firstName) . '' . $lastName . ' ! Your application has been rejected. Better Luck next time.';
                $ntfType = Notification::NOTIFY_REJECTED;
                break;
            case 5:
                $message = 'Congratulations ' . ucfirst($firstName) . '' . $lastName . ' ! Your application has been Acceptance With Financial Aid.';
                $ntfType = Notification::NOTIFY_ACCEPTANCE_FINANCIAL_AID;
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
                            's1_candidate_status' => Application::TYPE_PENDING
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
                            's1_notification_id' => null,
                            's1_candidate_status' => Application::TYPE_PENDING

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
                        $setApplicationStatus->s2_candidate_status = Application::TYPE_PENDING;



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
                            's2_candidate_status' => Application::TYPE_PENDING

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
                            's2_notification_id' => null,
                            's2_candidate_status' => Application::TYPE_PENDING
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
                        $setApplicationStatus->s3_candidate_status = Application::TYPE_PENDING;


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
                            's3_candidate_status' => Application::TYPE_PENDING

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
                            's3_notification_id' => null,
                            's3_candidate_status' => Application::TYPE_PENDING
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
