<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Grade;
use App\Models\Relationship;
use App\Models\School;
use App\Models\Sibling;
use App\Models\SiblingInformation;
use App\Models\Suffix;
use Livewire\WithFileUploads;

class StepFour extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $suffixList = [], $relationshipList = [], $gradeList = [], $schoolList = [];
    public $application, $getSibling, $childInfo = [];
    public function mount($application = null)
    {

        if ($application) {
            $this->application = $application;
            $this->getSibling = Sibling::where('application_id', $this->application->id)->first();
            if ($this->getSibling) {
                $this->childInfo = SiblingInformation::where('sibling_id', $this->getSibling->id)->get()->toArray();
            }
        } else {
            $this->childInfo = new SiblingInformation();
        }

        $this->suffixList = Suffix::get()->toArray();
        $this->relationshipList = Relationship::get()->toArray();
        $this->gradeList = Grade::get()->toArray();
        $this->schoolList = School::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'childInfo.*.first_name' => ['required', 'max:40'],
            'childInfo.*.middle_name' => ['nullable', 'max:255'],
            'childInfo.*.last_name' => ['required', 'max:40'],
            'childInfo.*.relationship_id' => ['required'],
            'childInfo.*.suffix_id' => ['required'],
            'childInfo.*.grade_id' => ['required'],
            'childInfo.*.current_school_id' => ['required'],
            'childInfo.*.not_listed_school' => ['nullable', 'max:255'],
            'childInfo.*.hs_graduation_year' => ['required']
        ];
    }

    protected $messages = [
        'childInfo.*.first_name.required' => 'Please enter your first name',
        'childInfo.*.first_name.max' => 'First name not be greater than 40 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->childInfo);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->childInfo);
        foreach ($this->childInfo as $value) {

            SiblingInformation::where('id', $value['id'])->update($value);
        }

        $msgAction = 'Children Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-four');
    }
}
