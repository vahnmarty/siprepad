<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile_id = Auth::guard('customer')->user()->id;

        $studentinfo = StudentInformation::where('Profile_ID', $profile_id)->first();
       

        return view('frontend.registeration.registeration-one', compact('studentinfo'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        
        if($request->S1_first_name)
        {
            $validatorS1 = validator($request->all(),
                [
                    'S1_first_name' => 'required|string|max:30',
                    'S1_last_name' => 'before:today',
                    'S1_date_of_birth' => 'required',
                    'S1_gender' => 'required',
                    'S1_student_phone_number' => 'required',
                    'S1_tshirt_size' => 'required',
                ],
                );
            if ($validatorS1->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS1);
            }
        }
        
        if($request->S2_first_name)
        {
            $validatorS2 = validator($request->all(),
                [
                    'S1_first_name' => 'required|string|max:30',
                    'S1_last_name' => 'before:today',
                    'S1_date_of_birth' => 'required',
                    'S1_gender' => 'required',
                    'S1_student_phone_number' => 'required',
                    'S1_tshirt_size' => 'required',
                ],
                );
            
            if ($validatorS2->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS2);
            }
        }
        
        if($request->S3_first_name)
        {
            $validatorS3 = validator($request->all(),
                [
                    'S1_first_name' => 'required|string|max:30',
                    'S1_last_name' => 'before:today',
                    'S1_date_of_birth' => 'required',
                    'S1_gender' => 'required',
                    'S1_student_phone_number' => 'required',
                    'S1_tshirt_size' => 'required',
                ],
                );
            
            if ($validatorS3->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS3);
            }
        }
        
        
        $studentinfo = StudentInformation::find($id);
        $studentinfo->S1_First_Name = $request->S1_first_name;
        $studentinfo->S1_Middle_Name = $request->S1_middle_name;
        $studentinfo->S1_Last_Name = $request->S1_last_name;
        $studentinfo->S1_Preferred_First_Name = $request->S1_preffered_first_name;
        $studentinfo->S1_Birthdate = $request->S1_date_of_birth;
        $studentinfo->S1_Gender = $request->S1_gender;
        $studentinfo->S1_Mobile_Phone = $request->S1_student_phone_number;
        $studentinfo->s1_tshirt_size = $request->S1_tshirt_size;
        $studentinfo->s1_religion = $request->S1_religion;
        $studentinfo->S1_Race  = $request->S1_racial;
        $studentinfo->S1_Ethnicity = $request->S1_ethnicity;
        $studentinfo->S1_Current_School = $request->S1_current_school;
        
        $studentinfo->S2_First_Name = $request->S2_first_name;
        $studentinfo->S2_Middle_Name = $request->S2_middle_name;
        $studentinfo->S2_Last_Name = $request->S2_last_name;
        $studentinfo->S2_Preferred_First_Name = $request->S2_preffered_first_name;
        $studentinfo->S2_Birthdate = $request->S2_date_of_birth;
        $studentinfo->S2_Gender = $request->S2_gender;
        $studentinfo->S2_Mobile_Phone = $request->S2_student_phone_number;
        $studentinfo->s2_tshirt_size = $request->S2_tshirt_size;
        $studentinfo->s2_religion = $request->S2_religion;
        $studentinfo->S2_Race  = $request->S2_racial;
        $studentinfo->S2_Ethnicity = $request->S2_ethnicity;
        $studentinfo->S2_Current_School = $request->S2_current_school;
        
        $studentinfo->S3_First_Name = $request->S3_first_name;
        $studentinfo->S3_Middle_Name = $request->S3_middle_name;
        $studentinfo->S3_Last_Name = $request->S3_last_name;
        $studentinfo->S3_Preferred_First_Name = $request->S3_preffered_first_name;
        $studentinfo->S3_Birthdate = $request->S3_date_of_birth;
        $studentinfo->S3_Gender = $request->SS3_gender;
        $studentinfo->S3_Mobile_Phone = $request->S3_student_phone_number;
        $studentinfo->s3_tshirt_size = $request->S3_tshirt_size;
        $studentinfo->s3_religion = $request->S3_religion;
        $studentinfo->S3_Race  = $request->S3_racial;
        $studentinfo->S3_Ethnicity = $request->S3_ethnicity;
        $studentinfo->S3_Current_School = $request->S3_current_school;
        

        
        if ($studentinfo->update()) 
        {
            return redirect()->back()->with('success', "Student updated successfully");
        } 
        else 
        {
            return redirect()->back()->with('error', "Error Occurred,Student Couldn't be Updated.");
        }

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
}
