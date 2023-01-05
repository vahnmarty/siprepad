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
use App\Models\RegisterationHealthInformation;
use App\Models\RegisterationEmergencycontact;
use App\Models\RegisterationSchoolAccomodation;
use Illuminate\Support\Facades\DB;
use App\Models\RegisterationCoursePlacement;
use App\Models\CoursePlacementInformation;
use App\Models\ApplyLanguageChoice;
use App\Models\ApplytoLanguageChoice;
use App\Models\LanguageChoice;

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $profile_id = Auth::guard('customer')->user()->id;

        $studentinfo = StudentInformation::where('Profile_ID', $profile_id)->first();
        if ($studentinfo->S1_First_Name) {
            $validatorS1 = validator($request->all(), [
                'S1_first_name' => 'required|string|max:30',
                'S1_middle_name' => 'nullable|string|max:30',
                'S1_last_name' => 'required|string|max:30',
                'S1_preffered_first_name' => 'nullable|string|max:30',
                'S1_date_of_birth' => 'required|before:today',
                'S1_gender' => 'required',
                'S1_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'S1_tshirt_size' => 'required',
                'S1_religion' => 'nullable|string',
                'S1_racial' => 'nullable|string',
                'S1_ethnicity' => 'nullable|string',
                'S1_current_school' => 'nullable|string'
            ]);
            if ($validatorS1->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS1);
            }
        }

        if ($studentinfo->S2_First_Name) {
            $validatorS2 = validator($request->all(), [
                'S2_first_name' => 'required|string|max:30',
                'S2_middle_name' => 'nullable|string|max:30',
                'S2_last_name' => 'required|string|max:30',
                'S2_preffered_first_name' => 'nullable|string|max:30',
                'S2_date_of_birth' => 'required|before:today',
                'S2_gender' => 'required',
                'S2_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'S2_tshirt_size' => 'required',
                'S2_religion' => 'nullable|string',
                'S2_racial' => 'nullable|string',
                'S2_ethnicity' => 'nullable|string',
                'S2_current_school' => 'nullable|string'
            ]);

            if ($validatorS2->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorS2);
            }
        }

        if ($studentinfo->S3_First_Name) {
            $validatorS3 = validator($request->all(), [
                'S3_first_name' => 'required|string|max:30',
                'S3_middle_name' => 'nullable|string|max:30',
                'S3_last_name' => 'required|string|max:30',
                'S3_preffered_first_name' => 'nullable|string|max:30',
                'S3_date_of_birth' => 'required|before:today',
                'S3_gender' => 'required',
                'S3_student_phone_number' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'S3_tshirt_size' => 'required',
                'S3_religion' => 'nullable|string',
                'S3_racial' => 'nullable|string',
                'S3_ethnicity' => 'nullable|string',
                'S3_current_school' => 'nullable|string'
            ]);

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
        $studentinfo->S1_Race = $request->S1_racial;
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
        $studentinfo->S2_Race = $request->S2_racial;
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
        $studentinfo->S3_Race = $request->S3_racial;
        $studentinfo->S3_Ethnicity = $request->S3_ethnicity;
        $studentinfo->S3_Current_School = $request->S3_current_school;

        if ($studentinfo->update()) {
            return redirect('registration/householdIndex/' . $profile_id)->with('success', "Updated successfully");
        } else {
            return redirect()->back()->with('error', "Error Occurred, Couldn't be Updated.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {}

    public function householdIndex($id)
    {
        $addressinfo = AddressInformation::with('profile')->with('parentInfo')->where('Profile_ID', $id)->first();
        $parentinfo = $addressinfo->profile->parentInfo;
        return view('frontend.registeration.registeration-two', compact('addressinfo', 'parentinfo'));
    }

  

    
    public function householdUpdate(Request $request, $id)
    {
        DB::beginTransaction();
        
        $addressinfo = AddressInformation::with('profile')->with('parentInfo')->where('Profile_ID', $id)->first();
        $parentInfo = $addressinfo->profile->parentInfo;
        
        if ($addressinfo->profile->parentInfo->P1_First_Name ) {
            $validatorP1 = validator($request->all(), [
                'A1_street' => 'required|string|max:30',
                'A1_city' => 'required|string|max:30',
                'A1_state' => 'required|string|max:30',
                'A1_zip_code' => 'required|string|max:30',
                'A1_home_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10',

                'P1_relation_to_applicant' => 'required|string|max:30',
                'P1_prefix' => 'string|max:10',
                'P1_parent_first_name' => 'string|max:255',
                'P1_parent_middle_name' => 'nullable|string|max:255',
                'P1_parent_last_name' => 'nullable|string|max:255',
                'P1_parent_cell_phone' => 'regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P1_parent_email' => 'email',
                'P1_parent_employer' => 'nullable|string|max:200',
                'P1_parent_position' => 'nullable|string',
                'p1_parent_work_phone' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P1_parent_school' => 'nullable|string|max:200'
            ]);
            if ($validatorP1->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorP1);
            }
        }

        if ($addressinfo->P2_First_Name) {
            $validatorP2 = validator($request->all(), [
                'P2_relation_to_applicant' => 'nullable|string|max:30',
                'P2_prefix' => 'nullable|string|max:10',
                'P2_parent_first_name' => 'nullable|string|max:30',
                'P2_parent_middle_name' => 'nullable|string|max:30',
                'P2_parent_last_name' => 'nullable|string|max:30',
                'P2_parent_cell_phone' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P2_parent_email' => 'nullable|email',
                'P2_parent_employer' => 'nullable|string|max:50',
                'P2_parent_position' => 'nullable|string',
                'p2_parent_work_phone' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P2_parent_school' => 'nullable|string|max:100'
            ]);
            if ($validatorP2->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorP2);
            }
        }

        if ($addressinfo->profile->parentInfo->P3_First_Name) {
            $validatorP3 = validator($request->all(), [
                'P3_relation_to_applicant' => 'nullable|string|max:30',
                'P3_prefix' => 'nullable|string|max:10',
                'P3_parent_first_name' => 'nullable|string|max:30',
                'P3_parent_middle_name' => 'nullable|string|max:30',
                'P3_parent_last_name' => 'nullable|string|max:30',
                'P3_parent_cell_phone' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P3_parent_email' => 'nullable|email',
                'P3_parent_employer' => 'nullable|string|max:50',
                'P3_parent_position' => 'nullable|string',
                'p3_parent_work_phone' => 'nullable|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:12',
                'P3_parent_school' => 'nullable|string|max:100'
            ]);
            if ($validatorP3->fails()) {
                return Redirect::back()->withInput()->withErrors($validatorP3);
            }
        }

        $addressinfo->Address_1 = $request->A1_street;
        $addressinfo->City_1 = $request->A1_city;
        $addressinfo->State_1 = $request->A1_state;
        $addressinfo->Zipcode_1 = $request->A1_zip_code;
        $addressinfo->Address_Phone_1 = $request->A1_home_phone;

        $parentInfo->P1_Relationship = $request->P1_relation_to_applicant;
        $parentInfo->P1_Salutation = $request->P1_prefix;
        $parentInfo->P1_First_Name = $request->P1_parent_first_name;
        $parentInfo->P1_Middle_Name = $request->P1_parent_middle_name;
        $parentInfo->P1_Last_Name = $request->P1_parent_last_name;
        $parentInfo->P1_Mobile_Phone = $request->P1_parent_cell_phone;
        $parentInfo->P1_Personal_Email = $request->P1_parent_email;
        $parentInfo->P1_Employer = $request->P1_parent_employer;
        $parentInfo->P1_Title = $request->P1_parent_position;
        $parentInfo->P1_Work_Phone = $request->p1_parent_work_phone;
        $parentInfo->P1_Schools = $request->P1_parent_school;

        $addressinfo->Address_2 = $request->A2_street;
        $addressinfo->City_2 = $request->A2_city;
        $addressinfo->State_2 = $request->A2_state;
        $addressinfo->Zipcode_2 = $request->A2_zip_code;
        $addressinfo->Address_Phone_2 = $request->A2_home_phone;

        $parentInfo->P2_Relationship = $request->P2_relation_to_applicant;
        $parentInfo->P2_Salutation = $request->P2_prefix;
        $parentInfo->P2_First_Name = $request->P2_parent_first_name;
        $parentInfo->P2_Middle_Name = $request->P2_parent_middle_name;
        $parentInfo->P2_Last_Name = $request->P2_parent_last_name;
        $parentInfo->P2_Mobile_Phone = $request->P2_parent_cell_phone;
        $parentInfo->P2_Personal_Email = $request->P2_parent_email;
        $parentInfo->P2_Employer = $request->P2_parent_employer;
        $parentInfo->P2_Title = $request->P2_parent_position;
        $parentInfo->P2_Work_Phone = $request->p2_parent_work_phone;
        $parentInfo->P2_Schools = $request->P2_parent_school;

        $addressinfo->Address_3 = $request->A3_street;
        $addressinfo->City_3 = $request->A3_city;
        $addressinfo->State_3 = $request->A3_state;
        $addressinfo->Zipcode_3 = $request->A3_zip_code;
        $addressinfo->Address_Phone_3 = $request->A3_home_phone;

        $parentInfo->P3_Relationship = $request->P3_relation_to_applicant;
        $parentInfo->P3_Salutation = $request->P3_prefix;
        $parentInfo->P3_First_Name = $request->P3_parent_first_name;
        $parentInfo->P3_Middle_Name = $request->P3_parent_middle_name;
        $parentInfo->P3_Last_Name = $request->P3_parent_last_name;
        $parentInfo->P3_Mobile_Phone = $request->P3_parent_cell_phone;
        $parentInfo->P3_Personal_Email = $request->P3_parent_email;
        $parentInfo->P3_Employer = $request->P3_parent_employer;
        $parentInfo->P3_Title = $request->P3_parent_position;
        $parentInfo->P3_Work_Phone = $request->p3_parent_work_phone;
        $parentInfo->P3_Schools = $request->P3_parent_school;

        if ($addressinfo->update() && $parentInfo->update()) {
            DB::commit();
            return redirect('registration/healthInfoIndex/' . $addressinfo->Profile_ID)->with('success', "Updated successfully");
        } else {
            DB::rollback();
            return redirect()->back()->with('error', "Error Occurred, Couldn't be Updated.");
        }
    }

    public function healthInfoIndex($id)
    {

        $healthinfo = RegisterationHealthInformation::where('profile_id', $id)->first();
          $profile = Auth::guard('customer')->user('id');
         
          if(!empty($healthinfo)){
        return view('frontend.registeration.registeration-three-update', compact('healthinfo','profile'));
          }else {
              return view('frontend.registeration.registeration-three',compact('profile'));
          }
    }
    
    public function healthInfoCreate(Request $request){
        


       $profile = Auth::guard('customer')->user('id');
        $validator = validator($request->all(), [
            'medical_insurance_company' => 'required|string|max:50',
            'medical_policy_number' => 'required|string|max:30',
            'physician_name' => 'required|string|max:50',
            'physician_phone1' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:3|max:3',
            'physician_phone2' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:3|max:3',
            'physician_phone3' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:4|max:4',
            'prescribed_medication' => 'required|string',
            'allergies' => 'required|string',
            'child_condition' => 'required|string'
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('emergencyContactIndex');
        }
        
        $healthinfo = new RegisterationHealthInformation();
        $healthinfo->medical_insurance_company = $request->medical_insurance_company;
        $healthinfo->medical_policy_number = $request->medical_policy_number;
        $healthinfo->physician_name = $request->physician_name;
        $healthinfo->physician_phone = $request->physician_phone1.$request->physician_phone2.$request->physician_phone3;
        $healthinfo->prescribed_medication = $request->prescribed_medication;
        $healthinfo->allergies = $request->allergies;
        $healthinfo->child_condition = $request->child_condition;
        $healthinfo->profile_id = $profile->id;
        
        if($healthinfo->save()){
            return redirect('registeration/emergencyContactIndex/'.$healthinfo->profile_id)->with('success', "Saved successfully");
        }
   
    }
    
    
    public function healthInfoUpdate(Request $request, $id)
    {
        
        $validator = validator($request->all(), [
            'medical_insurance_company' => 'required|string|max:50',
            'medical_policy_number' => 'required|string|max:30',
            'physician_name' => 'required|string|max:50',
            'physician_phone1' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:3|max:3',
            'physician_phone2' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:3|max:3',
            'physician_phone3' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:4|max:4',
            'prescribed_medication' => 'required|string',
            'allergies' => 'required|string',
            'child_condition' => 'required|string'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $healthinfo = RegisterationHealthInformation::where('profile_id', $id)->first();
        $healthinfo->medical_insurance_company = $request->medical_insurance_company;
        $healthinfo->medical_policy_number = $request->medical_policy_number;
        $healthinfo->physician_name = $request->physician_name;
        $healthinfo->physician_phone = $request->physician_phone1.$request->physician_phone2.$request->physician_phone3;
        $healthinfo->prescribed_medication = $request->prescribed_medication;
        $healthinfo->allergies = $request->allergies;
        $healthinfo->child_condition = $request->child_condition;
        if($healthinfo->update())
        {
            return redirect('registeration/emergencyContactIndex/'.$healthinfo->profile_id)->with('success', "Updated successfully");
        }
    }
    
    public function emergencyContactIndex()
    {
       
        $emergencyContact = RegisterationEmergencycontact::where('profile_id',$id)->first();
        if($emergencyContact)
        {
            return view('frontend.registeration.registeration-four-update',compact('emergencyContact'));
        }
        else
        {
            return view('frontend.registeration.registeration-four',compact('emergencyContact','id'));
        }
    }
    
    public function emergencyContactSave(Request $request)
    {
        
        $profile = Auth::guard('customer')->user('id');

        $validator = validator($request->all(), [
            'emergency_contact_name' => 'required|string|max:50',
            'relation_to_student' => 'required|string|max:30',
            'home_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10|gt:0',
            'mobile_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10',
            'work_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $emergencyInfo = new RegisterationEmergencycontact();
        $emergencyInfo->emergency_contact_name = $request->emergency_contact_name;
        $emergencyInfo->relation_to_student = $request->relation_to_student;
        $emergencyInfo->home_phone = $request->home_phone;
        $emergencyInfo->mobile_phone = $request->mobile_phone;
        $emergencyInfo->work_phone = $request->work_phone;
        $emergencyInfo->profile_id = $profile->id;
        if($emergencyInfo->save())
        {
            return redirect('registration/accomodations/'.$emergencyInfo->profile_id)->with('success', "Updated successfully");
        }
        
    }
    
    public function emergencyContactUpdate(Request $request, $id)
    {

        $validator = validator($request->all(), [
            'emergency_contact_name' => 'required|string|max:50',
            'relation_to_student' => 'required|string|max:30',
            'home_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10|gt:0',
            'mobile_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10',
            'work_phone' => 'required|regex:/[0-9]/|not_regex:/[a-z]/|min:10|max:10',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $emergencyInfo = RegisterationEmergencycontact::where('profile_id', $id)->first();
        $emergencyInfo->emergency_contact_name = $request->emergency_contact_name;
        $emergencyInfo->relation_to_student = $request->relation_to_student;
        $emergencyInfo->home_phone = $request->home_phone;
        $emergencyInfo->mobile_phone = $request->mobile_phone;
        $emergencyInfo->work_phone = $request->work_phone;

        if($emergencyInfo->update())
        {
            return redirect('registration/accomodations/'.$emergencyInfo->profile_id)->with('success', "Updated successfully");
        }
    }
    public function accomodationsIndex($id)
    {
        $accomodations = RegisterationSchoolAccomodation::where('profile_id',$id)->first();
        if($accomodations)
        {
            return view('frontend.registeration.registeration-five-update',compact('accomodations','id')); 
        }
        else 
        {
            return view('frontend.registeration.registeration-five',compact('accomodations','id')); 
        } 
    }
    
    public function accomodationsSave(Request $request)
    {
        
        $profile = Auth::guard('customer')->user('id');
        
        $accomodations = new RegisterationSchoolAccomodation();
        $accomodations->formal_accomodations_provided = $request->formal_accomodations_provided;
        $accomodations->informal_accomodations_provided = $request->informal_accomodations_provided;
        $accomodations->profile_id = $profile->id;
        
        if($accomodations->save())
        {
            
            return redirect('registration/magisProgram/'.$accomodations->profile_id)->with('success', "Updated successfully");
        }
        
    }
    
    public function accomodationsUpdate(Request $request, $id)
    {
        $accomodations = RegisterationSchoolAccomodation::where('profile_id',$id)->first();
        $accomodations->formal_accomodations_provided = $request->formal_accomodations_provided;
        $accomodations->informal_accomodations_provided = $request->informal_accomodations_provided;
        
        if($accomodations->update())
        {

            return redirect('registration/magisProgram/'.$accomodations->profile_id)->with('success', "Updated successfully");
        }
    }
    
    public function magisProgramIndex($id)
    {
        $magisProgram = StudentInformation::where('profile_id',$id)->first();
        if($magisProgram)
        {
            return view('frontend.registeration.registeration-six-update', compact('magisProgram'));
        }
        else 
        {
            return view('frontend.registeration.registeration-six', compact('magisProgram'));
        }
    }
    
    public function magisProgramSave(Request $request)
    {
        
        $profile = Auth::guard('customer')->user('id');
        
        $validator = validator($request->all(), [
            'first_generation_college_bound_student' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $magisProgram = new StudentInformation();
        $magisProgram->s1_first_generation = $request->first_generation_college_bound_student;
        $magisProgram->s2_first_generation = $request->second_generation_college_bound_student;
        $magisProgram->s3_first_generation = $request->third_generation_college_bound_student;
        
        if($magisProgram->update())
        {
            return redirect('registration/coursePlacementIndex/'.$magisProgram->Profile_ID)->with('success', "Updated successfully");
        }
        
    }
    
    public function magisProgramUpdate(Request $request, $id)
    { 
        $validator = validator($request->all(), [
            'first_generation_college_bound_student' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        
        $magisProgram = StudentInformation::where('Profile_ID',$id)->first();
        $magisProgram->s1_first_generation = $request->first_generation_college_bound_student;
        $magisProgram->s2_first_generation = $request->second_generation_college_bound_student;
        $magisProgram->s3_first_generation = $request->third_generation_college_bound_student;

        if($magisProgram->update())
        {
            return redirect('registration/coursePlacementIndex/'.$magisProgram->Profile_ID)->with('success', "Updated successfully");
        }
    }
    
    public function coursePlacementIndex($id)
    {   
        $idCheck = CoursePlacementInformation::where('profile_id',$id)->first();
        $languageCheck = LanguageChoice::where('profile_id',$id)->get();
        $language = LanguageChoice::getLanguageAttributes();
        
        $totalValues = count($languageCheck);
        $languageValues = [];
        for($i=0; $i<$totalValues; $i++) {
            $languageValues[] = $languageCheck[$i]->language_id;
        }
         

        if($idCheck)
        { 
            return view('frontend.registeration.registeration-seven',compact('idCheck','languageValues', 'language' ,'id' ));

        }
        else 
        {
            return view('frontend.registeration.registeration-seven', compact('language','id'));
        }
    }
    
    public function coursePlacementUpdate(Request $request, $id)
    {
        DB::beginTransaction();
        
        $idCheck = CoursePlacementInformation::where('profile_id',$id)->first();
        $languageCheck = LanguageChoice::where('profile_id',$id)->get();
        

        $langCount =  count($languageCheck);
    
        if(empty($idCheck) && $langCount == LanguageChoice::LANG_COUNT)
        {   
            $validator = validator($request->all(), [
                'math_challenge_test' => 'required',
                'language_placement_test' => 'required',
                'open_to_choosing_another_language' => 'required'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);

            }     

            $coursePlacement = new CoursePlacementInformation();
            $coursePlacement->profile_id = $request->id;
            $coursePlacement->english_placement = $request->english_placement;
            $coursePlacement->math_placement = $request->math_placement;
            $coursePlacement->math_challenge_test = $request->math_challenge_test;
            $coursePlacement->language_selection = $request->language_selection;
            $coursePlacement->language_placement_test = $request->language_placement_test;
            $coursePlacement->choose_other_language = $request->open_to_choosing_another_language;
            
            $apply_to_language = $request->checks_apply_to_language;
            if(!empty($apply_to_language))
            {
                foreach($apply_to_language as $languages)
                {
                    $applyLanguageChoice = new LanguageChoice();
                    $applyLanguageChoice->profile_id = $request->id;
                    $applyLanguageChoice->language_id = $languages;
                    $applyLanguageChoice->save();
                }
            }
            
            if($coursePlacement->save())
            {

                DB::commit();               
                return view('frontend.registeration.thankYou')->with('success', "Updated successfully");
            }
        }
        
        elseif (!empty($idCheck) && $langCount > LanguageChoice::LANG_COUNT)
        {

            $validator = validator($request->all(), [
                'math_challenge_test' => 'required',
                'language_placement_test' => 'required',
                'open_to_choosing_another_language' => 'required'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $coursePlacement = new CoursePlacementInformation();

            $idCheck->profile_id = $request->id;
            $idCheck->english_placement = $request->english_placement;
            $idCheck->math_placement = $request->math_placement;
            $idCheck->math_challenge_test = $request->math_challenge_test;
            $idCheck->language_selection = $request->language_selection;
            $idCheck->language_placement_test = $request->language_placement_test;
            $idCheck->choose_other_language = $request->open_to_choosing_another_language;
            
            $delete = LanguageChoice::where('profile_id',$id)->delete();
   
            $apply_to_language = $request->checks_apply_to_language;
            if(!empty($apply_to_language))
            {
                foreach($apply_to_language as $languages)
                {
                    $applyLanguageChoice = new LanguageChoice();
                    $applyLanguageChoice->profile_id = $id;
                    $applyLanguageChoice->language_id = $languages;
                    $applyLanguageChoice->save();
                }
            }
            
            if($idCheck->update())
            {
                DB::commit();

                return view('frontend.registeration.thankYou')->with('success', "Updated successfully");
            }
        }
        elseif (!empty($idCheck) && $langCount == LanguageChoice::LANG_COUNT)
        {

            $validator = validator($request->all(), [
                'math_challenge_test' => 'required',
                'language_placement_test' => 'required',
                'open_to_choosing_another_language' => 'required'
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $idCheck->profile_id = $request->id;
            $idCheck->english_placement = $request->english_placement;
            $idCheck->math_placement = $request->math_placement;
            $idCheck->math_challenge_test = $request->math_challenge_test;
            $idCheck->language_selection = $request->language_selection;
            $idCheck->language_placement_test = $request->language_placement_test;
            $idCheck->choose_other_language = $request->open_to_choosing_another_language;
            
            $apply_to_language = $request->checks_apply_to_language;
            if(!empty($apply_to_language))
            {
                foreach($apply_to_language as $languages)
                {
                    $applyLanguageChoice = new LanguageChoice();
                    $applyLanguageChoice->profile_id = $request->id;
                    $applyLanguageChoice->language_id = $languages;
                    $applyLanguageChoice->save();
                }
            }
            
            if($idCheck->update())
            {
                DB::commit();

                return view('frontend.registeration.thankYou')->with('success', "Updated successfully");

            }
        }
        
    }
    
    public function thankYou()
    {
        return view('frontend.registeration.thankYou');
    }
    
}





