<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationHouseholdInformation;
use Illuminate\Support\Facades\Auth;
use App\Models\RegisterationParentInformation;
use App\Models\Registeration;
class RegisterationTwo extends Component
{
    public   $live_with,$registeration_id,$street,$city,$state,$zip_code,
    $home_phone,$primary_parent,$regesitration_id,$relation_to_applicant,$parent_first_name,$parent_middle_name,$parent_last_name,
    $parent_cell_phone, $parent_work_phone,$parent_email,$parent_employer,$parent_position,$parent_school;
 
    
   
    public function mount($reg_id = null){
        
        $this->regesitration_id = $reg_id;
        
    }

    public function render()
    {
        return view('livewire.frontend.registeration.registeration-two');
    }
    
    public function Savehousehold()
    {
        $householdinformation = $this->validate([
            
            'live_with' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required||numeric',
            'home_phone' => 'required|numeric|digits:10',
            'primary_parent' => 'required',
        ]);
            
          $household = new RegisterationHouseholdInformation(); 
          $household->profile_id = Auth::guard('customer')->user()->id;
          $household->id = $this->regesitration_id ;
          $household->live_with = $this->live_with;
          $household->street = $this->street;
          $household->city = $this->city;
          $household->state = $this->state;
          $household->zip_code = $this->zip_code;
          $household->primary_parent = $this->primary_parent;
          $household->home_phone = $this->home_phone;
         
          
          $parentinfo = new RegisterationParentInformation();
          $parentinfo-> profile_id = Auth::guard('customer')->user()->id;
          $parentinfo-> id = $this->regesitration_id;
          $parentinfo->relation_to_applicant = $this->relation_to_applicant;
          $parentinfo->parent_first_name = $this->parent_first_name;
          $parentinfo->parent_middle_name = $this->parent_middle_name;
          $parentinfo->parent_last_name = $this->parent_last_name;
          $parentinfo->parent_cell_phone = $this->parent_cell_phone;
          $parentinfo->parent_email = $this->parent_email;
          $parentinfo->parent_employer = $this->parent_employer;
          $parentinfo->parent_position = $this->parent_position;
          $parentinfo->parent_work_phone = $this->parent_work_phone;
          $parentinfo->parent_school = $this->parent_school;
         
          
          if($household->save() & $parentinfo->save()){
          
              Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'two']);
             return redirect()->route('registeration-application', ['step' => 'three']);
          }
              
       

 
    }
    
  
    
    
    
}
