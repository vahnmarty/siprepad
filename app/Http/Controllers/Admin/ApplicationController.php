<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Notification;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application.create-edit', ['application' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::where('Application_ID',$id)->first();
        //dd($application);
        if (!is_null($application)) {
            return view('admin.application.show', ['application' => $application]);
        } else {
            return redirect()->route('application.index')->with('error', 'Application Not Found! Please, Try Again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        if (!is_null($application)) {
            return view('admin.application.create-edit', ['application' => $application]);
        } else {
            return redirect()->route('application.index')->with('error', 'Application Not Found! Please, Try Again.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $user_id = Application::where('Application_ID',$appID)->get('Profile_ID')->first();
        $userID = $user_id->Profile_ID;
        $candidateStatus = $request->post('app_type_id');
        
        $user = Profile::where('id',$userID)->first();
        if(!empty($user)) {
            $fullName = $user->Pro_First_Name." ".$user->Pro_Last_Name;
            
            switch($candidateStatus) {
                case 1:
                    $message = 'Congratulations! Your application has been accepted.';
                    $ntfType = Notification::NOTIFY_ACCEPTED;
                    break;
                case 2:
                    $message = 'Your application is in Waiting List. We will in touch with you shortly.';
                    $ntfType = Notification::NOTIFY_WAITLIST;
                    break;
                case 3:
                    $message = 'Sorry! Your application has been rejected. Better Luck next time.';
                    $ntfType = Notification::NOTIFY_REJECTED;
                    break;
                default:
                    $message = 'Nothing';
                    $ntfType = Notification::NOTIFY_NO_STATUS;
            }

       

            $application = Application::where('profile_id', $userID)->first();
            
            if(!empty($candidateStatus) && !empty($userID) && !empty($application)) {
                $application->application_type_id = $candidateStatus;
                if($application->save()){
                    $newNotification = new Notification();
                    $newNotification->profile_id = $userID;
                    $newNotification->message = $message;
                    $newNotification->notification_type = $ntfType;
                    if($newNotification->save()){
                        return 'Candidate Status Submitted Successfully!!!!';                            
                    }
                }
            }
        } else {
            return 'User not registered with us!!!';
        }
    }
   
}
