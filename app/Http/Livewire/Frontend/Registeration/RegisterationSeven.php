<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationCourseInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Registeration;

class RegisterationSeven extends Component
{
    
    public  $regesitration_id,$english_placement,$math_placement,$math_challenge_reservation,$language,$language_placement_test,$checks_apply_to_language,$open_to_choosing_another_language;
    
    
    
    public function mount($reg_id = null)
    {
        $this->regesitration_id = $reg_id;
    }
    
    
    
    public function render()
    {
        return view('livewire.frontend.registeration.registeration-seven');
    }
    
    public function submit(){
        
     
        $savecourseinfo = new RegisterationCourseInfo();
        $savecourseinfo->id = $this->regesitration_id;
        $savecourseinfo->profile_id=Auth::guard('customer')->user()->id;
        $savecourseinfo->english_placement= $this->english_placement;
        $savecourseinfo->math_placement=$this->math_placement;
        $savecourseinfo->language=$this->language;
        $savecourseinfo->language_placement_test=$this->language_placement_test;
        $savecourseinfo->checks_apply_to_language=$this->checks_apply_to_language;
        $savecourseinfo->open_to_choosing_another_language=$this->open_to_choosing_another_language;
        
        if($savecourseinfo->save()){
            Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'seven']);
            return redirect()->route('registeration-application', ['step' => 'final']);
            
            
        }
        
    }
    
    
    
    
}
