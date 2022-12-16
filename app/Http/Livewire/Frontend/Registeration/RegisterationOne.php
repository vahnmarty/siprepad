<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;

use App\Models\StudentRegisteration;
use App\Models\Registeration;
use function PHPUnit\Framework\isNull;
use Illuminate\Support\Facades\Auth;

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

    
    public  function mount($student_info = Null){
        
        $this->student_information = $student_info;
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

