<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationEmergencycontact;
use Illuminate\Support\Facades\Auth;
use App\Models\Registeration;
class RegisterationFour extends Component
{
    
    public $regesitration_id,$emergency_contact_name,$relation_to_student,$home_phone,$mobile_phone,$work_phone;
    
    
    public function mount($reg_id = null)
    {
        $this->regesitration_id = $reg_id;
    }
    
    
    
    
    
    
    
    public function render()
    {
        return view('livewire.frontend.registeration.registeration-four');
    }
    
    public  function SaveEmergencyContact() {
        
        
        $emergencycontact = $this->validate([
            
            'emergency_contact_name' => 'required',
            'relation_to_student' => 'required',
            'home_phone' => 'required|numeric',
            'mobile_phone' => 'required|numeric',
            'work_phone' => 'required|numeric',
       
        ]);
        
        $emergencycontactinfo = new RegisterationEmergencycontact();
        $emergencycontactinfo-> profile_id = Auth::guard('customer')->user()->id;
        $emergencycontactinfo-> id = $this->regesitration_id;
        $emergencycontactinfo->emergency_contact_name = $this->emergency_contact_name;
        $emergencycontactinfo->relation_to_student = $this->relation_to_student;
        $emergencycontactinfo->home_phone = $this->home_phone;
        $emergencycontactinfo->mobile_phone = $this->mobile_phone;
        $emergencycontactinfo->work_phone = $this->work_phone;
        
        if($emergencycontactinfo->save()){
            
            Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'four']);
            return redirect()->route('registeration-application', ['step' => 'five']);
            
        }
        
        
        
    }
    
    
    
}
