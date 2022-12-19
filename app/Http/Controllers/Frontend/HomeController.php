<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\RecommendationMail;
use App\Models\Global_Notifiable;
use App\Models\AddressInformation;
use App\Models\Application;
use App\Models\LegacyInformation;
use App\Models\ParentInformation;
use App\Models\ParentStatement;
use App\Models\StudentInformation;
use App\Models\Recommendation;
use App\Models\ReleaseAuthorization;
use App\Models\SiblingInformation;
use App\Models\SpiritualAndCommunityInformation;
use App\Models\StudentStatement;
use App\Models\WritingSample;
use App\Rules\MaxWordsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Registeration;
use App\Models\StudentRegisteration;
class HomeController extends Controller
{
    public function home()
    {
        if (!is_null(Auth::guard('customer')->user())) {
            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->first();
            $recommendationStudent = Recommendation::where('Profile_ID', $profile_id)->select('Rec_Student')->get()->toArray();
            $getStudentCount = 0;
            if ($application) {

                $getAllStudent = [];
                $getStudent = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->first()->toArray();

                $arr1 = [
                    "Rec_Student" => $getStudent['S1_First_Name'] . " " . $getStudent['S1_Last_Name'],
                ];

                $arr2 = [
                    "Rec_Student" => $getStudent['S2_First_Name'] . " " . $getStudent['S2_Last_Name'],
                ];

                $arr3 = [
                    "Rec_Student" => $getStudent['S3_First_Name'] . " " . $getStudent['S3_Last_Name'],
                ];

                $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;

                foreach ($studentArr as $key => $student) {
                    if (!is_null($student)) {
                        array_push($getAllStudent, $student);
                    }
                }
                //check all the student recommendation send or not
                $getStudent = [];
                foreach ($studentArr as $key => $student) {
                    if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                        array_push($getStudent, $student);
                    }
                }
                $getStudentCount = count($getStudent);
            }

              $notifications= Global_Notifiable::get('notifiable');
               
             $application_status=Application::Where('Application_ID',$profile_id)->get('candidate_status');
           
            return view('frontend.home', compact('application', 'getStudentCount','notifications','application_status'));
        } else {
            return redirect('/login');
        }
    }

    public function bookWildcatExperience()
    {
        return response()->json("You clicked on book wildcat experience", 200);
    }

    public function admissionApplication($step = 'one')
    {

        if (Auth::guard('customer')->check()) {

            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->where('status', 0)->first();
            //dd($application);
            if ($application) {
                if ($step == 'one') {
                    $getStudentInfo = null;
                    if (!is_null($application)) {
                        $getStudentInfo = StudentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getStudentInfo);
                    }
                    return view('frontend.application.application-one', compact('getStudentInfo'));
                } elseif ($step == 'two') {
                    $getAddressInfo = null;
                    if (!is_null($application)) {

                        $getAddressInfo = AddressInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($getAddressInfo);
                    }
                    //dd($step, $getAddressInfo);
                    return view('frontend.application.application-two', compact('getAddressInfo'));
                } elseif ($step == 'three') {
                    $getParentInfo = null;
                    if (!is_null($application)) {
                        $getParentInfo = ParentInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    //dd($step, $getParentInfo);
                    return view('frontend.application.application-three', compact('getParentInfo'));
                } elseif ($step == 'four') {
                    $getSiblingInfo = null;
                    if (!is_null($application)) {
                        $getSiblingInfo = SiblingInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    //dd($step, $getSiblingInfo);
                    return view('frontend.application.application-four', compact('getSiblingInfo'));
                } elseif ($step == 'five') {
                    $getLegacyInfo = null;
                    if (!is_null($application)) {
                        $getLegacyInfo = LegacyInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                    }
                    //dd($step, $getLegacyInfo);
                    return view('frontend.application.application-five', compact('getLegacyInfo'));
                } elseif ($step == 'six') {
                    $getParentStatement = null;
                    if (!is_null($application)) {
                        $getParentStatement = ParentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getParentStatement);
                    }
                    return view('frontend.application.application-six', ['getParentStatement' => $getParentStatement]);
                } elseif ($step == 'seven') {
                    $getSpiritualCommunityInfo = null;
                    if (!is_null($application)) {
                        $getSpiritualCommunityInfo = SpiritualAndCommunityInformation::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getSpiritualCommunityInfo);
                    }
                    return view('frontend.application.application-seven', compact('getSpiritualCommunityInfo'));
                } elseif ($step == 'eight') {
                    $getStudentStatementInfo = null;
                    if (!is_null($application)) {
                        $getStudentStatementInfo = StudentStatement::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getStudentStatementInfo);
                    }
                    return view('frontend.application.application-eight', compact('getStudentStatementInfo'));
                } elseif ($step == 'nine') {
                    $getWritingSample = null;
                    if (!is_null($application)) {
                        $getWritingSample = WritingSample::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getWritingSample);
                    }
                    return view('frontend.application.application-nine', compact('getWritingSample'));
                } elseif ($step == 'ten') {
                    $getReleaseAuthorization = null;
                    if (!is_null($application)) {
                        $getReleaseAuthorization = ReleaseAuthorization::where('Profile_ID', $profile_id)->where('Application_ID', $application->Application_ID)->first();
                        //dd($step, $getReleaseAuthorization);
                    }
                    return view('frontend.application.application-ten', compact('getReleaseAuthorization'));
                }
            } else {
                //dd('ELSE');
                $getStudentInfo = null;
                return view('frontend.application.application-one', compact('getStudentInfo'));
            }
        } else {
            abort(400, 'You are not authorize');
        }
    }

    public function viewApplication($application_id = null)
    {
        //todo: Do setup on livewire
        //return response()->json("We are working on this", 200);
        return view('frontend.application.view-application', compact('application_id'));
    }

    public function supplementalRecommendation()
    {
        if (Auth::guard('customer')->check()) {
            $profile_id = Auth::guard('customer')->user()->id;
            $application = Application::where('Profile_ID', $profile_id)->where('status', 1)->first();
            //dd($application);
            $recommendationStudent = Recommendation::where('Profile_ID', $profile_id)->select('Rec_Student')->get()->toArray();
            //dd($recommendationStudent);

            if ($application) {

                $getAllStudent = [];
                $getStudent = StudentInformation::where('Application_ID', $application->Application_ID)->where('Profile_ID', $profile_id)->first()->toArray();
                //dd($getStudent);
                $arr1 = [
                    "Rec_Student" => $getStudent['S1_First_Name'] . " " . $getStudent['S1_Last_Name'],
                ];

                $arr2 = [
                    "Rec_Student" => $getStudent['S2_First_Name'] . " " . $getStudent['S2_Last_Name'],
                ];

                $arr3 = [
                    "Rec_Student" => $getStudent['S3_First_Name'] . " " . $getStudent['S3_Last_Name'],
                ];

                $studentArr[] = $getStudent['S1_First_Name'] ? $arr1 : null;
                $studentArr[] = $getStudent['S2_First_Name'] ? $arr2 : null;
                $studentArr[] = $getStudent['S3_First_Name'] ? $arr3 : null;
                //dd($studentArr);
                foreach ($studentArr as $key => $student) {
                    //dd($student);
                    // if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                    //     array_push($getAllStudent, $student);
                    // }
                    if (!is_null($student)) {
                        array_push($getAllStudent, $student);
                    }
                }
                //check all the student recommendation send or not
                $getStudent = [];
                foreach ($studentArr as $key => $student) {
                    if (!is_null($student) && !in_array($student, $recommendationStudent)) {
                        array_push($getStudent, $student);
                    }
                }
                if (count($getStudent) == 0) {
                    return redirect('/')->with('info', 'Recommendation requests have been sent.');
                }

                return view('frontend.recommend.recommend', compact('getAllStudent', 'recommendationStudent'));
            } else {
                return redirect('/')->with('error', 'You must submit an application before you can submit a supplemental recommendation. The supplemental recommendation is not due until December 15th.');
            }
        } else {
            abort(400, 'You are not authrize');
        }
    }
    public function submitSupplemental(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email:rfc,dns',
                'student' => 'required',
                'message' => ['required', 'max:1000', new MaxWordsRule(75)],
            ]
        );
        DB::beginTransaction();
        try {

            $getRecommendation = Recommendation::create([
                'Profile_ID' => Auth::id(),
                'Rec_Name' => $request->name,
                'Rec_Email' => $request->email,
                'Rec_Student' => $request->student,
                'Rec_Message' => $request->message,
                'Rec_Request_Send_Date' => date('Y-m-d'),
            ]);
            //dd($getRecommendation->id);
            //$recommendation = Recommendation::where('Rec_Student', $request->student)->first();
            $getUserName = Auth::guard('customer')->user()->full_name;
            $mailSubject = 'Recommendation Request from ' . $getUserName;

            $data = [
                "recommendation_id" => $getRecommendation->id,
                'name' => $request->name,
                'email' => $request->email,
                'student' => $request->student,
                'message' => $request->message,
                'mailSubject' => $mailSubject,
                'user_full_name' => $getUserName
            ];
            //dd($data);

            //send to mail code here
            Mail::to($data['email'])->send(new RecommendationMail($data));
            // check for failures
            if (Mail::failures()) {
                return back()->with('error', 'An unknown error has occurred.  Please try again later.');
            } else {
                DB::commit();
                return redirect('/')->with('success', 'Your request has been sent.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->with('error', 'An unknown error has occurred.  Please try again later.');
        }
    }

    public function writtenRecommendation($id)
    {
        $recommendation_id = decrypt($id);
        $getRecommendation = Recommendation::where('id', $recommendation_id)->first();
        if ($getRecommendation) {
            $getData = Recommendation::where('id', $recommendation_id)->where('Status', 1)->first();
            if ($getData) {
                return view('frontend.recommend.write-view', compact('getRecommendation'));
            } else {
                return view('frontend.recommend.write', compact('getRecommendation'));
            }
        } else {
            abort(400, 'You are not authorize');
        }
    }
    public function submitWritten(Request $request)
    {
        $request->validate(
            [
                'relationStudent' => 'required',
                'yearStudent' => 'required',
                'recommen' => ['required', 'max:1000', new MaxWordsRule(150)],
            ]
        );
        $profile = Recommendation::where('id', $request->id)->where('Status', 0)->first();
        if ($profile) {
            $profile->update([
                'Rec_Relationship_to_Student' => $request->relationStudent,
                'Rec_Years_Known_Student' => $request->yearStudent,
                'Rec_Recommendation' => $request->recommen,
                'Status' => 1,
                'Rec_Send_Date' => date('Y-m-d')
            ]);
            $msg = 'Thank you for submitting a recommendation for ' . $profile->Rec_Student;

            return redirect()->route('thank-you')->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'You have already submitted a recommendation.');
        }
    }

    public function thankYou()
    {
        return view('frontend.thankyou');
    }

    public function thankYou2()
    {
        return view('frontend.thankyou2');
    }
    public function registerationApplication($step){
     
//         $profile_id = Auth::user()->id;
//         $registeration = Registeration::where('profile_id', $profile_id)->where('status', 0)->first();
      
        if($step == 'one'){
      
            return view('frontend.registeration.registeration-one');
            
        
        }elseif($step == 'two'){
            

            $registeration=Registeration::where('last_step_complete','one')->latest('id')->first();
            if($registeration == null){
                return redirect()->back()->with('error', 'Please fill the all steps');
                
            }else{
                $reg_id = $registeration->id;

                return view('frontend.registeration.registeration-two',compact('reg_id'));
            }
        }elseif($step == 'three'){
            $registeration=Registeration::where('last_step_complete','two')->latest('id')->first();
            if($registeration == null){
                return redirect()->back()->with('error', 'Please fill the all steps');
                
            }else{
               
                $reg_id = $registeration->id;
                return view('frontend.registeration.registeration-three',compact('reg_id'));
            }
     
        }elseif($step == 'four'){
            
            $registeration=Registeration::where('last_step_complete','three')->latest('id')->first();
          
            if($registeration == null){
                return redirect()->back()->with('error', 'Please fill the all steps');
                
            }else{
                
            $reg_id = $registeration->id;
            return view('frontend.registeration.registeration-four',compact('reg_id'));
        }
        }elseif ($step == 'five') {
            
            $registeration=Registeration::where('last_step_complete','four')->latest('id')->first();
            
            if($registeration == null){
                return redirect()->back()->with('error', 'Please fill the all steps');
                
            }else{
                
                $reg_id = $registeration->id;
                return view('frontend.registeration.registeration-five',compact('reg_id'));
        }
        }elseif($step == 'six'){
        
        $registeration=Registeration::where('last_step_complete','five')->latest('id')->first();
        if($registeration == null){
            return redirect()->back()->with('error', 'Please fill the all steps');
            
        }else{
            
            $reg_id = $registeration->id;
        
        
        return view('frontend.registeration.registeration-six',compact('reg_id'));
        }
        }elseif ($step == 'seven'){
            
            return redirect('/')->with('success', 'You successfully fill the six steps of form');
        }
    }
    
}
