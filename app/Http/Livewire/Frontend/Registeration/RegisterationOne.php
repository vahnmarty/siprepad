<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Payment;
use App\Models\StudentRegisteration;
use App\Models\Registeration;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class RegisterationOne extends Component

{ 
    
    public $profile_id;
    public $first_name;
    public $middle_name ;
    public $last_name;
    public $preffered_first_name ;
    public $date_of_birth ;
    public $gender ;
    public $student_phone_number ;
    public $tshirt_size;
    public $religion ;
    public $racial = [];
    public $ethnicity;
    public $current_school;
    public  $student_information;
    public $registeration_student_info;
    public $studentinfo;
    
    public  function mount($student_registeration = Null ,$studentinfo = null){
        
        $this->registeration_student_info = $student_registeration;
        $this->studentinfo = $studentinfo;
        
//         if ($studentinfo) {
//             $this->studentInfo = $studentinfo;
//             $this->studentInfo_id = $studentinfo->id;
//             $this->application_id = $studentinfo->Application_ID;
//         }
        
//         $arr1 = [
//             "first_name" => $studentinfo->S1_First_Name,
//             "middle_name" =>  $studentinfo->S1_Middle_Name,
//             "last_name" =>  $studentinfo->S1_Last_Name,
//             "preffered_first_name" =>  $studentinfo->S1_Preferred_First_Name,
//             "date_of_birth" =>  $studentinfo->S1_Birthdate,
//             "gender" =>  $studentinfo->S1_Gender,
//             "student_phone_number" => Str::substr($studentinfo->S1_Mobile_Phone, 0, 3),
//             "racial" => 'test',
//             "ethnicity" =>  $studentinfo->S1_Ethnicity,
//             "current_cchool" =>  $studentinfo->S1_Current_School,
          
//         ];
//         $studentArr[] = $studentinfo['S1_First_Name'] ? $arr1 : null;
//         foreach ($studentArr as $key => $student) {
//             if (!is_null($student)) {
               
//                 array_push($this->inputs, $student);
//             }
//         }
//         $this->i = count($this->inputs);
//         $this->isEdit = true;
//         $getPayment = Payment::where('user_id', Auth::guard('customer')->user()->id)
//         ->where('application_id', $studentInfo->Application_ID)->first();
        
//         if ($getPayment) {
//             $this->is_payment_compleat = true;
//         }
//      else {
        
//         $arr = [
//             "Photo" => '',
//             'New_Photo' => '',
//             "First_Name" => '',
//             "Middle_Name" =>  '',
//             "Last_Name" =>  '',
//             "Suffix" =>  '',
//             "Preferred_First_Name" =>  '',
//             "Birthdate" =>  '',
//             "Gender" =>  '',
//             "Personal_Email" =>  '',
//             //"Mobile_Phone" =>  '',
//             "phone_number_one" => '',
//             "phone_number_two" =>  '',
//             "phone_number_three" =>  '',
//             "Race" => '',
//             "Ethnicity" =>  '',
//             "Current_School" =>  '',
//             "Current_School_Not_Listed" =>  '',
//             "Other_High_School_1" =>  '',
//             "Other_High_School_2" =>  '',
//             "Other_High_School_3" =>  '',
//             "Other_High_School_4" =>  ''
//         ];
//         array_push($this->inputs, $arr);
//     }
    }
    

    public function submit()    {
              
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'student_phone_number' => 'required|numeric|digits:10',
            'tshirt_size' => 'required',
          
        ]);
        
        $stdRegone = new StudentRegisteration();
        $stdRegone->Profile_ID = Auth::guard('customer')->user()->id;
        $stdRegone->first_name = $this->first_name;
        $stdRegone->middle_name = $this->middle_name;
        $stdRegone->last_name = $this->last_name;
        $stdRegone->preffered_first_name = $this->preffered_first_name;
        $stdRegone->date_of_birth = $this->date_of_birth;
        $stdRegone->gender = $this->gender; 
        $stdRegone->student_phone_number = $this->student_phone_number;
        $stdRegone->student_phone_number = $this->student_phone_number;
        $stdRegone->tshirt_size = $this->tshirt_size;
        $stdRegone->ethnicity = $this->ethnicity;
        $stdRegone->current_school = $this->current_school;
        $stdRegone->racial = implode(" ",$this->racial);
        $stdRegone->religion = $this->religion;
        if($stdRegone->save()) {
            
            $registeration = new Registeration();
            $registeration->profile_id = $stdRegone->Profile_ID;
            $registeration->id =$stdRegone->id;
            $registeration->status =Registeration::Pending;
            $registeration->last_step_complete = 'one';
                   $registeration->save();
            
            return redirect()->route('registeration-application', ['step' => 'two']);
        }
        
        
    }

    public function render()
    {
        return view('livewire.frontend.registeration.registeration-one');
    }

}

