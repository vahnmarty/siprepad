<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationHouseHoldInformation;
use Illuminate\Support\Facades\Auth;
class RegisterationTwo extends Component
{
    public  $i = 1, $parentInfo = [],$live_with,$registeration_id,$street,$city,$state,$zip_code,
    $home_phone,$primary_parent,$regesitration_id;
 
    
   
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
            
            'registeration_id' => 'required|min:6',
            'live_with' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'home_phone' => 'required',
            'primary_parent' => 'required',
        ]);
            
          $household = new RegisterationHouseHoldInformation(); 
          $household->profile_id = Auth::guard('customer')->user()->id;
          $household->registeration_id = $this->registeration_id;
          $household->live_with = $this->live_with;
          $household->street = $this->street;
          $household->city = $this->city;
          $household->state = $this->state;
          $household->zip_code = $this->zip_code;
          $household->primary_parent = $this->primary_parent;
          if($household->save()){
              
              return "saved successfully";
          }
    }
    
    
    
    
    
    
    public function add($i)
    {
        $this->i += 1;
        $arr = [
            "Relationship" => '',
            "Salutation" => '',
            "First_Name" => '',
            "Middle_Name" => '',
            "Last_Name" => '',
            "Suffix" => '',
            "Address_Type" => '',
            //"Mobile_Phone" => '',
            "mobile_phone_number_one" => '',
            "mobile_phone_number_two" =>  '',
            "mobile_phone_number_three" =>  '',
            "Personal_Email" => '',
            "Employer" => '',
            "Title" => '',
            "Work_Email" => '',
            //"Work_Phone" => '',
            "work_phone_number_one" => '',
            "work_phone_number_two" =>  '',
            "work_phone_number_three" =>  '',
            "Work_Phone_Ext" => '',
            "Schools" => '',
            "Living_Situation" => '',
            "Status" => ''
        ];
        array_push($this->parentInfo, $arr);
    }
    
    
    
    
}
