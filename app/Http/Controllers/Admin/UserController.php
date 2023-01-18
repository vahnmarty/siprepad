<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Global_Notifiable;

use Illuminate\Http\Request;
use App\Models\ApplicationType;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\GlobalRegisterable;
use App\Models\GlobalStudentTransfer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        $notifications = Global_Notifiable::get();
            
        return view('admin.user.list', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create-edit', ['profile' => null]);
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
    public function show(Profile $user)
    {
        // dd($user);
        if (!is_null($user)) {
            return view('admin.user.view', compact('user'));
        } else {
            return redirect()->route('users.index')->with('error', "User can't found,Please try again!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('admin.user.create-edit', compact('profile'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $status
     * @param int $uid
     */
    public function notificationChange(Request $request, $status, $uid)
    {

        $notification = Global_Notifiable::first();

        $notification = $notification->update(['notifiable' => $status]);

        if ($notification) {
            return redirect()->back()->with('success', "Notifcation Updated Successfully!!");
        }
    }

    public function registrationChange($status)
    {


        $registeration = GlobalRegisterable::first();
        $registeration = $registeration->update(['registerable' => $status]);
        if ($registeration) {
            return redirect()->back()->with('success', "Registeration Updated Successfully!!");
        }
    }
    public function studentTransfer($status)
    {


        $registeration = GlobalStudentTransfer::first();

       

        $registeration = $registeration->update(['student_transfer' => $status]);
        if ($registeration) {
            return redirect()->back()->with('success', "Student Transfer Updated Successfully!!");
        }
        else{
            return redirect()->back()->with('error', "Student Transfer Update Not Update Please Try Again!!");

        }
    }

    public function PerPage(Request $request)
    {
      
       $perPage = Profile::paginate($request->PerPage);
       $data = [];
       $count = 0;
       foreach($perPage as $item)
       {

        $getApplication = Application::where('Profile_ID', $item->id)->pluck('status')->first();
        $data[$count]['application_status'] = $getApplication;
        $data[$count]['first_name'] = $item->Pro_First_Name;
        $data[$count]['last_name'] = $item->Pro_Last_Name;
        $data[$count]['email'] = $item->email;
        $data[$count]['phone'] = $item->Pro_Mobile;
        $data[$count]['id'] = $item->id;
        $count++;    

       
       


       }}
}