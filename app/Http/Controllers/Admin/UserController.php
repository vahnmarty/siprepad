<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Global_Notifiable;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications= Global_Notifiable::get();
        return view('admin.user.list',compact('notifications'));
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
    public function notificationChange(Request $request, $status , $uid)
    {
        
          $notification = Global_Notifiable::where('id', $uid)->first();
          
          $notification = $notification->update(['notifiable'=>$status]);

          if($notification) {
            return redirect()->back()->with('success', "Notifcation Updated Successfully!!");

          }
         
    }
    //     $user= Profile::where('id', $uid)->first();
    //     if($user){
    //         $user->is_notifiable = $status;
    //         $user->save();
    //         return redirect()->back()->with('success', "User Notifcation Updated Successfully!!");
    //     } else {
    //         return redirect()->back()->with('error', "User Not Found");
    //     }  
    // }
}
