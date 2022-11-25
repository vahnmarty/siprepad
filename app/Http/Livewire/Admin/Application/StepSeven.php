<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\ParentStatement;
use App\Models\ParentStatementInformation;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Religious;
use App\Models\ReligiousInformation;
use App\Models\Spirituality;
use Livewire\WithFileUploads;

class StepSeven extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $religionList = [], $relationshipList = [], $spiritualityList = [];
    public $application, $getReligious = [], $religiousInformation = [];

    public function mount($application = null)
    {
        if ($application) {
            $this->application = $application;
            $religious = Religious::where('application_id', $this->application->id)->first();
            if (!is_null($religious)) {
                $this->getReligious = Religious::where('application_id', $this->application->id)->first()->toArray();
            }
            if ($this->getReligious) {
                $this->religiousInformation = ReligiousInformation::where('religious_id', $this->getReligious['id'])->get()->toArray();
            }
        } else {
            $this->religiousInformation = new ReligiousInformation();
        }
        $this->religionList = Religion::get()->toArray();
        $this->relationshipList = Relationship::get()->toArray();
        $this->spiritualityList = Spirituality::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [

            'getReligious.religion_id'           => ['required'],
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
        
        $this->validate($this->validationRuleForUpdate());
        //dd($this->getReligious, $this->religiousInformation);

        foreach ($this->religiousInformation as $value) {
            ReligiousInformation::where('id', $value['id'])->update($value);
        }
        Religious::where('id', $this->getReligious['id'])->update($this->getReligious);

        $msgAction = 'Family Spirituality and Community' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-seven');
    }
}
