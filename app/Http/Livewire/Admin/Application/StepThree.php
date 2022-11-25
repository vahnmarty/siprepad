<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Models\School;
use App\Models\ParentInformation;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\AddressInformation;
use App\Models\LivingSituation;
use App\Models\MaritalStatus;
use App\Models\Relationship;
use App\Models\Salutation;
use App\Models\Suffix;

class StepThree extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $relationshipList = [], $salutationList = [], $suffixList = [], $addressList = [];
    public $application, $appplication_id, $parentInfo = [], $maritalStatusList = [], $livingSituationList = [];
    public function mount($application = null)
    {
        //dd($application);
        if ($application) {
            $this->application = $application;
            $this->parentInfo = ParentInformation::where('application_id', $this->application->id)->get()->toArray();
        } else {
            $this->parentInfo = new ParentInformation();
        }
        $this->relationshipList = Relationship::get()->toArray();
        $this->salutationList = Salutation::get()->toArray();
        $this->suffixList = Suffix::get()->toArray();
        $this->addressList = AddressInformation::get()->toArray();
        $this->maritalStatusList = MaritalStatus::get()->toArray();
        $this->livingSituationList = LivingSituation::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'parentInfo.*.first_name' => ['required', 'max:40'],
            'parentInfo.*.middle_name' => ['nullable'],
            'parentInfo.*.last_name' => ['required'],
            'parentInfo.*.relationship_id' => ['required','integer'],
            'parentInfo.*.salutation_id' => ['required','integer'],
            'parentInfo.*.suffix_id' => ['nullable'],
            'parentInfo.*.address_id' => ['required'],
            'parentInfo.*.email' => ['required'],
            'parentInfo.*.mobile_number' => ['required'],
            'parentInfo.*.employer' => ['nullable'],
            'parentInfo.*.title' => ['nullable'],
            'parentInfo.*.work_phone' => ['nullable'],
            'parentInfo.*.work_email' => ['nullable'],
            'parentInfo.*.schoole_collage_list' => ['required'],
            'parentInfo.*.marital_status_id' => ['required'],
            'parentInfo.*.living_situation_id' => ['required'],
            'parentInfo.*.deceased_status' => ['required'],

        ];
    }

    protected $messages = [
        'parentInfo.*.first_name.required' => 'Please enter your first name',
    ];

    public function saveOrUpdate()
    {
        //dd($this->parentInfo);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->parentInfo);
        foreach ($this->parentInfo as $value) {
           //dd($value);
            ParentInformation::where('id', $value['id'])->update($value);
        }

        $msgAction = 'Parent Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }
    public function render()
    {
        return view('livewire.admin.application.step-three');
    }
}
