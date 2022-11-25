<?php

namespace App\Http\Livewire\Admin\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\WritingSample;
use App\Rules\MaxWordsRule;
use Livewire\Component;
use Livewire\WithFileUploads;

class StepNine extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true;
    public $application, $writingSampleInfo = [];
    public function mount($application = null)
    {

        if ($application) {
            $this->application = $application;
            $this->writingSampleInfo =  WritingSample::where('application_id', $this->application->id)->get()->toArray();
        } else {
            $this->writingSampleInfo = new  WritingSample();
        }
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'writingSampleInfo.*.obstacle_overcome_description' => ['required', 'max:1500',new MaxWordsRule(250)],
            'writingSampleInfo.*.is_aggree_submitted_writing_sample' => ['required'],
            'writingSampleInfo.*.submitted_by' => ['required']
        ];
    }

    protected $messages = [
        'writingSampleInfo.*.obstacle_overcome_description.required' => 'Please,Explain how the obstacle impacted you and how you handled the situation',
        'writingSampleInfo.*.obstacle_overcome_description.max' => 'Explain details not be greater than 1500 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->writingSampleInfo);
        $this->validate($this->validationRuleForUpdate());
        //dd($this-> writingSampleInfo);
        foreach ($this->writingSampleInfo as $value) {
            WritingSample::where('id', $value['id'])->update($value);
        }

        $msgAction = 'Writing Sample Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-nine');
    }
}
