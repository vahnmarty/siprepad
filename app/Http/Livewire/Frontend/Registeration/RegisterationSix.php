<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationCollegeBoundCheck;
use Illuminate\Support\Facades\Auth;
use App\Models\Registeration;
class RegisterationSix extends Component
{
    
    
    public  $regesitration_id,$first_generation_college_bound_student;
    
    public function mount($reg_id = null)
    {
        $this->regesitration_id = $reg_id;
    }
    

    
    public function SaveMagisProgram(){
        
        
        $validater = $this->validate([
            
            'first_generation_college_bound_student' =>'required',
            
            
        ]);
        

        $savemagisprogrampage = new RegisterationCollegeBoundCheck();
        $savemagisprogrampage->id = $this->regesitration_id;
        $savemagisprogrampage->profile_id = Auth::guard('customer')->user()->id;
        $savemagisprogrampage->first_generation_college_bound_student=$this->first_generation_college_bound_student;
        
        if($savemagisprogrampage->save()){
            Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'six']);
            return redirect()->route('registeration-application', ['step' => 'seven']);
            
            
        }
        
        
    }

    
    
    
    
    
    
    
    public function render()
    {
        return view('livewire.frontend.registeration.registeration-six');
    }
}
