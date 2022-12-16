<?php
namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Models\RegisterationHealthInformation;
use App\Models\Registeration;
class RegisterationThree extends Component
{

    public $medical_insurance_company, $medical_policy_number, $physician_name, $physician_phone, $prescribed_medication, $allergies, $child_condition, $regesitration_id;

    public function mount($reg_id = null)
    {
        $this->regesitration_id = $reg_id;
    }

    public function SaveHealthInfo()
    {
        $healthinformation = $this->validate([

            'medical_insurance_company' => 'required',
            'medical_policy_number' => 'required|numeric',
            'physician_name' => 'required',
            'physician_phone' => 'required',
            'prescribed_medication' => 'required',
            'allergies' => 'required',
            'child_condition' => 'required'
        ]);

        $registerhealth = new RegisterationHealthInformation();
        $registerhealth->id = $this->regesitration_id;
        $registerhealth->medical_insurance_company = $this->medical_insurance_company;
        $registerhealth->medical_policy_number = $this->medical_policy_number;
        $registerhealth->physician_name = $this->physician_name;
        $registerhealth->physician_phone = $this->physician_phone;
        $registerhealth->prescribed_medication = $this->prescribed_medication;
        $registerhealth->allergies = $this->allergies;
        $registerhealth->child_condition = $this->child_condition;
        if($registerhealth->save()){
            
            Registeration::where('id',$this->regesitration_id)->update(['last_step_complete'=>'three']);
            return redirect()->route('registeration-application', ['step' => 'four']);
            
        }
    }

    public function render()
    {
        return view('livewire.frontend.registeration.registeration-three');
    }
}
