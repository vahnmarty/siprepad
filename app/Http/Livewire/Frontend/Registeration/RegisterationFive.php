<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationSchoolAccomodation;
use Illuminate\Support\Facades\Auth;
use App\Models\Registeration;
class RegisterationFive extends Component
{
    public $regesitration_id, $formal_accomodations_provided,$informal_accomodations_provided;
    
    
    public function mount($reg_id = null)
    {
        $this->regesitration_id = $reg_id;
    }
    
    
    
    public function SaveSchoolAcomodation(){
        
        $schoolacomodations = new RegisterationSchoolAccomodation();
        $schoolacomodations->id = $this->regesitration_id;
        $schoolacomodations->profile_id = Auth::guard('customer')->user()->id;
        $schoolacomodations->formal_accomodations_provided = $this->formal_accomodations_provided;
        $schoolacomodations->informal_accomodations_provided = $this->informal_accomodations_provided;
        
        if($schoolacomodations->save()){
            Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'five']);
            return redirect()->route('registeration-application', ['step' => 'six']);
        }
    }
    

    public function render()
    {
        return view('livewire.frontend.registeration.registeration-five');
    }
}
