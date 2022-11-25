<?php

namespace App\Http\Livewire\Admin\Application;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\AddressInformation;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StepTwo extends Component
{

    use WithFileUploads;
    use AlertMessage;
    public $isEdit = true, $countryList = [], $state_list = [], $city_list = [];
    public $application, $appplication_id, $addressInfo = [];
    public function mount($application = null)
    {
        //dd($application);
        if ($application) {
            $this->application = $application;
            $this->addressInfo = AddressInformation::where('application_id', $this->application->id)->get()->toArray();
        } else {
            $this->addressInfo = new AddressInformation();
        }
        $this->countryList = Country::get()->toArray();
    }

    public function validationRuleForUpdate(): array
    {
        return [
            'addressInfo.*.address' => ['required', 'max:255'],
            'addressInfo.*.country_id' => ['required'],
            'addressInfo.*.state_id' => ['required'],
            'addressInfo.*.city_id' => ['required'],
            'addressInfo.*.zipcode' => ['required', 'integer'],
            'addressInfo.*.primary_phone_number' => ['required', 'max:12', 'min:10']
        ];
    }

    protected $messages = [
        'addressInfo.*.address.required' => 'Please enter your address',
        'addressInfo.*.address.max' => 'Address not be greater than 40 characters ',
    ];

    public function saveOrUpdate()
    {
        //dd($this->addressInfo);
        $this->validate($this->validationRuleForUpdate());
        //dd($this->addressInfo);
        foreach ($this->addressInfo as $value) {
            // if (isset($value['application_photo'])) {
            //     if ($value['photo']) {
            //         unlink($value['photo']);
            //     }
            //     $imagePath = $value['application_photo'];
            //     $filename = time() . '-' . rand(1000, 9999) . '.' . $imagePath->getClientOriginalExtension();
            //     Storage::putFileAs('public/application_profile', $imagePath, $filename);
            //     $path = 'storage/application_profile/' . $filename;
            //     $value['photo'] = $path;
            //     unset($value['application_photo']);
            // }
            AddressInformation::where('id', $value['id'])->update($value);
        }

        $msgAction = 'Address Information ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('application.index');
    }

    public function render()
    {
        return view('livewire.admin.application.step-two');
    }
}
