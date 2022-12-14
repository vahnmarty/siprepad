<?php

namespace App\Http\Livewire\Frontend\Registeration;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;

use App\Models\Registeration;

use function PHPUnit\Framework\isNull;

class RegisterationOne extends Component


{ 
    public $first_name;
    public $middle_name ;
    public $last_name;
    public $preffered_first_name ;
    public $date_of_birth ;
    public $gender ;
    public $student_phone_number ;
    public $tshirt_size;
    public $religion ;
    public $racial ;
    public $ethinicity;
    public  $current_school;
    
    public function submit()    {
       
        $validatedData = $this->validate([
            'first_name' => 'required|min:6',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'student_phone_number' => 'required',
            't-shirt_size' => 'required',
            'religion' => 'required',
            'racial' => 'required',
        ]);
        
        Registeration::create($validatedData);
        
        return redirect()->to('/');
        
    }
    
   
    

    public function render()
    {
        return view('livewire.frontend.registeration.registeration-one');
    }

}

