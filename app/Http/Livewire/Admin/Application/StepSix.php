<?php

namespace App\Http\Livewire\Admin\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Legacy;
use App\Models\ParentStatement;
use App\Models\ParentStatementInformation;
use App\Models\Relationship;
use Livewire\WithFileUploads;

class StepSix extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $relationshipList = [];
    public $application, $getParentStatement = [], $parentStatementInformation = [];
    //public $parent_statement, $statement_submitted_by, $relationship_id;
    public function mount($application = null)
    {
        if ($application) {
            $this->application = $application;
            $parentStatement = ParentStatement::where('application_id', $this->application->id)->first();
            if (!is_null($parentStatement)) {
                $this->getParentStatement = ParentStatement::where('application_id', $this->application->id)->first()->toArray();
            }
            if ($this->getParentStatement) {
                $this->parentStatementInformation = ParentStatementInformation::where('parent_statement_id', $this->getParentStatement['id'])->get()->toArray();
            }
        } else {
            $this->parentStatementInformation = new parentStatementInformation();
        }
        $this->relationshipList = Relationship::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'getParentStatement.parent_statement' => ['required'],
            'getParentStatement.statement_submitted_by' => ['required'],
            'getParentStatement.relationship_id' => ['required'],
            'parentStatementInformation.*.child_endearing_quality_growth' => ['required', 'max:500'],
            'parentStatementInformation.*.tell_something_about_your_child' => ['required', 'max:500']
        ];
    }

    protected $messages = [
        'parentStatementInformation.*.child_endearing_quality_growth.required' => 'Please enter your first name',
        'parentStatementInformation.*.child_endearing_quality_growth.max' => 'First name not be greater than 500 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->getParentStatement,$this->parentStatementInformation);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->parentStatementInformation);

        foreach ($this->parentStatementInformation as $value) {
            ParentStatementInformation::where('id', $value['id'])->update($value);
        }
        ParentStatement::where('id', $this->getParentStatement['id'])->update($this->getParentStatement);

        $msgAction = 'Parent Statement Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-six');
    }
}
