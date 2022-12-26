<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use App\Models\AddressInformation;
use App\Models\ParentInformation;
use Faker\Provider\Address;


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

       
        $profile_id = Auth::guard('customer')->user()->id;
        
        $studentinfo = StudentInformation::where('Profile_ID', $profile_id)->first();
        if($studentinfo->S1_First_Namee)
        {
            $validatorS1 = validator($request->all(),
                [
                    'S1_first_name' => 'required|string|max:30',
                    'S1_middle_name' => 'string|max:30',
                    'S1_last_name' => 'required|string|max:30',
                    'S1_preffered_first_name' => 'string|max:30',
                    'S1_date_of_birth' => 'required|before:today',
                    'S1_gender' => 'required',
                    'S1_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                    'S1_tshirt_size' => 'required',
                    'S1_religion' => 'string',
                    'S1_racial' => 'string',
                    'S1_ethnicity' => 'string',
                    'S1_current_school' => 'string',
                ],
                );
            if ($validatorS1->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS1);
            }
        }
        
        if($studentinfo->S2_First_Namee)
        {
            $validatorS2 = validator($request->all(),
                [
                    'S2_first_name' => 'required|string|max:30',
                    'S2_middle_name' => 'string|max:30',
                    'S2_last_name' => 'required|string|max:30',
                    'S2_preffered_first_name' => 'string|max:30',
                    'S2_date_of_birth' => 'required|before:today',
                    'S2_gender' => 'required',
                    'S2_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                    'S2_tshirt_size' => 'required',
                    'S2_religion' => 'string',
                    'S2_racial' => 'string',
                    'S2_ethnicity' => 'string',
                    'S2_current_school' => 'string',
                ],
                );
            
            if ($validatorS2->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS2);
            }
        }
        
        if($studentinfo->S3_First_Namee)
        {
            $validatorS3 = validator($request->all(),
                [
                    'S3_first_name' => 'required|string|max:30',
                    'S3_middle_name' => 'string|max:30',
                    'S3_last_name' => 'required|string|max:30',
                    'S3_preffered_first_name' => 'string|max:30',
                    'S3_date_of_birth' => 'required|before:today',
                    'S3_gender' => 'required',
                    'S3_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                    'S3_tshirt_size' => 'required',
                    'S3_religion' => 'string',
                    'S3_racial' => 'string',
                    'S3_ethnicity' => 'string',
                    'S3_current_school' => 'string',
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
        $studentinfo->S3_Gender = $request->S3_gender;
        $studentinfo->S3_Mobile_Phone = $request->S3_student_phone_number;
        $studentinfo->s3_tshirt_size = $request->S3_tshirt_size;
        $studentinfo->s3_religion = $request->S3_religion;
        $studentinfo->S3_Race  = $request->S3_racial;
        $studentinfo->S3_Ethnicity = $request->S3_ethnicity;
        $studentinfo->S3_Current_School = $request->S3_current_school;
        

        
        if ($studentinfo->update()) 
        {
            return redirect('registration/householdIndex/'.$profile_id)->with('success', "Student updated successfully");
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
        
    }
    
    public function householdIndex($id)
    {
        $profile_id = Auth::guard('customer')->user()->id;

        $addressinfo = AddressInformation::where('Profile_ID', $profile_id)->first(); 
        $parentinfo = ParentInformation::where('Profile_ID', $profile_id)->first();
        return view('frontend.registeration.registeration-two', compact('addressinfo','parentinfo'));
        
    }
    
    public function householdUpdate(Request $request, $id)
    {
        $profile_id = Auth::guard('customer')->user()->id;   
        $addressinfo = AddressInformation::where('Profile_ID', $profile_id)->first();
        $parentifo = ParentInformation::where('Profile_ID', $profile_id)->first();
        
        $addressinfo->Address_1 = $request->A1_street;
        $addressinfo->City_1 = $request->A1_city;
        $addressinfo->State_1 = $request->A1_state;
        $addressinfo->Zipcode_1 = $request->A1_zip_code;
        $addressinfo->Address_Phone_1 = $request->A1_home_phone;
        
        $parentifo->P1_Relationship = $request->P1_relation_to_applicant;
        $parentifo->P1_Salutation = $request->P1_prefix;
        $parentifo->P1_First_Name = $request->P1_parent_first_name;
        $parentifo->P1_Middle_Name = $request->P1_parent_middle_name;
        $parentifo->P1_Last_Name  = $request->P1_parent_last_name;
        $parentifo->P1_Mobile_Phone = $request->P1_parent_cell_phone;
        $parentifo->P1_Personal_Email = $request->P1_parent_email;
        $parentifo->P1_Employer = $request->P1_parent_employer;
        $parentifo->P1_Title  = $request->P1_parent_position;
        $parentifo->P1_Work_Phone = $request->p1_parent_work_phone;
        $parentifo->P1_Schools  = $request->P1_parent_school;
        
        
        
        $addressinfo->Address_2 = $request->A2_street;
        $addressinfo->City_2 = $request->A2_city;
        $addressinfo->State_2 = $request->A2_state;
        $addressinfo->Zipcode_2 = $request->A2_zip_code;
        $addressinfo->Address_Phone_2 = $request->A2_home_phone;
        
        $parentifo->P2_Relationship = $request->P2_relation_to_applicant;
        $parentifo->P2_Salutation = $request->P2_prefix;
        $parentifo->P2_First_Name = $request->P2_parent_first_name;
        $parentifo->P2_Middle_Name = $request->P2_parent_middle_name;
        $parentifo->P2_Last_Name  = $request->P2_parent_last_name;
        $parentifo->P2_Mobile_Phone = $request->P2_parent_cell_phone;
        $parentifo->P2_Personal_Email = $request->P2_parent_email;
        $parentifo->P2_Employer = $request->P2_parent_employer;
        $parentifo->P2_Title  = $request->P2_parent_position;
        $parentifo->P2_Work_Phone = $request->p2_parent_work_phone;
        $parentifo->P2_Schools  = $request->P2_parent_school;

        
        
        $addressinfo->Address_3 = $request->A3_street;
        $addressinfo->City_3 = $request->A3_city;
        $addressinfo->State_3 = $request->A3_state;
        $addressinfo->Zipcode_3 = $request->A3_zip_code;
        $addressinfo->Address_Phone_3 = $request->A3_home_phone;
        
        $parentifo->P3_Relationship = $request->P3_relation_to_applicant;
        $parentifo->P3_Salutation = $request->P3_prefix;
        $parentifo->P3_First_Name = $request->P3_parent_first_name;
        $parentifo->P3_Middle_Name = $request->P3_parent_middle_name;
        $parentifo->P3_Last_Name  = $request->P3_parent_last_name;
        $parentifo->P3_Mobile_Phone = $request->P3_parent_cell_phone;
        $parentifo->P3_Personal_Email = $request->P3_parent_email;
        $parentifo->P3_Employer = $request->P3_parent_employer;
        $parentifo->P3_Title  = $request->P3_parent_position;
        $parentifo->P3_Work_Phone = $request->p3_parent_work_phone;
        $parentifo->P3_Schools  = $request->P3_parent_school;
        
        if ($parentifo->update() && $addressinfo->update())
        {
            return redirect('registration/householdIndex/'.$profile_id)->with('success', "Updated successfully");
        }
        else
        {
            return redirect()->back()->with('error', "Error Occurred,Student Couldn't be Updated.");
        }
        
    }
}
