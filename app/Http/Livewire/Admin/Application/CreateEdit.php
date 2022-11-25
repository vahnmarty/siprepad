<?php

namespace App\Http\Livewire\Admin\Application;

use App\Models\Application;
use App\Models\StudentInformation;
use Livewire\Component;

class CreateEdit extends Component
{
    public $statusList;
    public $total_steps = 10, $current_step;
    public $application, $appplication_id;
    public $first_name, $middle_name, $last_name, $name_suffix, $preferred_first_name, $dob;
    public $gender, $email, $mobile_number, $photo, $identify_racially, $ethnicity, $current_school, $not_listed_school;
    public $other_high_school_one, $other_high_school_two, $other_high_school_three, $other_high_school_four;

    public function mount($application = null)
    {
        if ($application) {
            $this->application = $application;
        } else {
            $this->application = new Application();
        }
        $this->current_step = 1;

        $this->statusList = [
            ['value' => 0, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
    }

    public function currentStep($step)
    {
        //$this->resetErrorBag();
        //$this->validateData();
        $this->current_step = $step;
    }


    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'gender' => 'required',
                'age' => 'required|digits:2'
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'email' => 'required|email|unique:students',
                'phone' => 'required',
                'country' => 'required',
                'city' => 'required'
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'frameworks' => 'required|array|min:2|max:3'
            ]);
        }
    }

    public function render()
    {
        //dd($this->current_step);
        if ($this->current_step = 1) {
            $getStudentInfo = StudentInformation::where('application_id', $this->application->id)->first();
            $this->fill($getStudentInfo);
        } else if ($this->current_step = 2) {
            # code...
            dd($this->current_step);
        } else if ($this->current_step = 3) {
            # code...
        } else if ($this->current_step = 4) {
            # code...
        } else if ($this->current_step = 5) {
            # code...
        } else if ($this->current_step = 6) {
            # code...
        } else if ($this->current_step = 7) {
            # code...
        } else if ($this->current_step = 8) {
            # code...
        } else if ($this->current_step = 9) {
            # code...
        } else if ($this->current_step = 10) {
            # code...
        }

        return view('livewire.admin.application.create-edit');
    }

    public function application()
    {
        dd('hh');
    }
}
