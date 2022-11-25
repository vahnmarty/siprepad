<?php

namespace App\Http\Livewire\Admin\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Application;
use App\Models\IdentifyRacially;
use App\Models\School;
use App\Models\StudentInformation;
use App\Models\Suffix;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class StepOne extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $statusList = [], $schoolList = [], $identifyRacially = [], $suffixList = [];
    public $application, $appplication_id, $studentInfo = [];
    public function mount($application = null)
    {
        //dd($application);
        if ($application) {
            $this->application = $application;
            $this->studentInfo = StudentInformation::where('application_id', $this->application->id)->get()->toArray();
        } else {
            $this->studentInfo = new StudentInformation();
        }

        $this->statusList = [
            ['value' => -1, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->identifyRacially = IdentifyRacially::get()->toArray();
        $this->schoolList = School::get()->toArray();
        $this->suffixList = Suffix::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'studentInfo.*.first_name' => ['required', 'max:40'],
            'studentInfo.*.middle_name' => ['nullable', 'max:255'],
            'studentInfo.*.last_name' => ['required'],
            'studentInfo.*.name_suffix' => ['nullable'],
            'studentInfo.*.preferred_first_name' => ['nullable', 'max:255'],
            'studentInfo.*.dob' => ['required', 'max:255', 'min:6'],
            'studentInfo.*.gender' => ['required'],
            'studentInfo.*.email' => ['required'],
            'studentInfo.*.mobile_number' => ['nullable'],
            'studentInfo.*.application_photo' => ['nullable', 'max:255'],
            'studentInfo.*.identify_racially' => ['required', 'max:255'],
            'studentInfo.*.ethnicity' => ['required'],
            'studentInfo.*.current_school_id' => ['required'],
            'studentInfo.*.not_listed_school' => ['nullable', 'max:255'],
            'studentInfo.*.other_high_school_one_id' => ['nullable', 'max:255'],
            'studentInfo.*.other_high_school_two_id' => ['nullable'],
            'studentInfo.*.other_high_school_three_id' => ['nullable'],
            'studentInfo.*.other_high_school_four_id' => ['nullable']
        ];
    }

    protected $messages = [
        'studentInfo.*.first_name.required' => 'Please enter your first name',
        'studentInfo.*.first_name.max' => 'The first name may not be greater than 40 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->studentInfo);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->studentInfo);

        foreach ($this->studentInfo as $key => $value) {

            //dd($value);
            //$dataVal['user_id'] = $this->application->user_id;;
            //$dataVal['application_id'] = $this->application->id;

            if (isset($value['application_photo'])) {
                if ($value['photo']) {
                    unlink($value['photo']);
                }
                $imagePath = $value['application_photo'];
                $filename = time() . '-' . rand(1000, 9999) . '.' . $imagePath->getClientOriginalExtension();
                Storage::putFileAs('public/application_profile', $imagePath, $filename);
                $path = 'storage/application_profile/' . $filename;
                $value['photo'] = $path;
                unset($value['application_photo']);
            }

            // $data =  StudentInformation::where('id', $value['id'])->first();
            // $data->fill($value)

            StudentInformation::where('id', $value['id'])->update($value);
        }

        //dd($this->studentInfo);

        $msgAction = 'Student Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-one');
    }
}
