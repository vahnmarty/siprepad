<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Legacy;
use App\Models\LegacyInformation;
use App\Models\Relationship;
use Livewire\WithFileUploads;
class StepFive extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $relationshipList = [];
    public $application, $getLegacy, $legacyInformation = [];
    public function mount($application = null)
    {
        if ($application) {
            $this->application = $application;
            $this->getLegacy = Legacy::where('application_id', $this->application->id)->first();
            if ($this->getLegacy) {
                $this->legacyInformation = LegacyInformation::where('legacy_id', $this->getLegacy->id)->get()->toArray();
            }
        } else {
            $this->legacyInformation = new LegacyInformation();
        }
        $this->relationshipList = Relationship::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'legacyInformation.*.first_name' => ['required', 'max:40'],
            'legacyInformation.*.last_name' => ['required', 'max:40'],
            'legacyInformation.*.relationship_id' => ['required'],
            'legacyInformation.*.graduation_year' => ['required'],
        ];
    }

    protected $messages = [
        'legacyInformation.*.first_name.required' => 'Please enter your first name',
        'legacyInformation.*.first_name.max' => 'First name not be greater than 40 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->legacyInformation);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->legacyInformation);
        foreach ($this->legacyInformation as $value) {
            LegacyInformation::where('id', $value['id'])->update($value);
        }

        $msgAction = 'Legacy Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-five');
    }
}
