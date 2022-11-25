<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\ExtraCurricularActivity;
use App\Models\FutureActivity;
use App\Models\Religious;
use App\Models\ReligiousInformation;
use App\Models\StudentStatement;
use Livewire\WithFileUploads;

class StepEight extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true;
    public $application, $getStudentStatement = [], $getExtraCurricularActivity = [], $getFutureActivity = [];

    public function mount($application = null)
    {
        if ($application) {
            $this->application = $application;
            $this->getStudentStatement = StudentStatement::where('application_id', $this->application->id)->get()->toArray();
            $this->getExtraCurricularActivity = ExtraCurricularActivity::where('application_id', $this->application->id)->get()->toArray();
            $this->getFutureActivity = FutureActivity::where('application_id', $this->application->id)->get()->toArray();
        } else {
            $this->getStudentStatement = new StudentStatement();
            $this->getExtraCurricularActivity = new ExtraCurricularActivity();
            $this->getFutureActivity = new FutureActivity();
        }
    }

    public function validationRuleForUpdate(): array
    {
        return [

            'getReligious.religion_id' => ['required'],
            'getReligious.other_religion'  => 'required_if:getReligious.religion_id,==,9',
            'getReligious.church_faith_community' => ['required'],
            'getReligious.church_faith_location' => ['required'],
            'getReligious.religious_form_submitted_by' => ['required'],
            'getReligious.relationship_id' => ['required'],
            //'religiousInformation.*.child_endearing_quality_growth' => ['required', 'max:500'],
            //'religiousInformation.*.tell_something_about_your_child' => ['required', 'max:500']
        ];
    }

    protected $messages = [
        'getReligious.other_religion.required_if' => 'Other religion is required',
        //'religiousInformation.*.child_endearing_quality_growth.required' => 'Please enter your first name',
        //'religiousInformation.*.child_endearing_quality_growth.max' => 'First name not be greater than 500 characters ',
    ];

    public function saveOrUpdate()
    {

        //$this->validate($this->validationRuleForUpdate());
        //dd($this->getStudentStatement, $this->getExtraCurricularActivity, $this->getFutureActivity);

        foreach ($this->getStudentStatement as $student) {
            StudentStatement::where('id', $student['id'])->update($student);
        }
        foreach ($this->getExtraCurricularActivity as $curricularActivity) {
            ExtraCurricularActivity::where('id', $curricularActivity['id'])->update($curricularActivity);
        }
        foreach ($this->getFutureActivity as $futureActivity) {
            FutureActivity::where('id', $futureActivity['id'])->update($futureActivity);
        }

        $msgAction = 'Family Spirituality and Community' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-eight');
    }
}
