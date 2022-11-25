<?php

namespace App\Http\Livewire\Frontend\Application;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\AddressInformation;
use App\Models\Application;
use App\Models\Country;
use App\Models\IdentifyRacially;
use App\Models\School;
use App\Models\StudentInformation;
use App\Models\Suffix;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ApplicationTwo extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $isEdit = false, $statusList = [], $schoolList = [], $identifyRacially = [], $suffixList = [], $studentInfo;
    public $addressInfo = [], $countryList = [], $state_list = [], $city_list = [], $i = 1, $application_id, $addressInfo_id;

    public function mount($getAddress = null)
    {
        //dd('livewire',$getAddress);
        if ($getAddress) {
            $this->addressInfo_id = $getAddress->id;
            //$getAddress = getAddressrmation::where('id', 1)->first();
            $arr1 = [
                "Address_Type" => $getAddress->Address_Type_1,
                "Country" => $getAddress->Country_1,
                "Address" =>  $getAddress->Address_1,
                "City" =>  $getAddress->City_1,
                "State" =>  $getAddress->State_1,
                "Zipcode" =>  $getAddress->Zipcode_1,
                //"Address_Phone" =>  $getAddress->Address_Phone_1,
                "phone_number_one" => Str::substr($getAddress->Address_Phone_1, 0, 3),
                "phone_number_two" =>  Str::substr($getAddress->Address_Phone_1, 3, 3),
                "phone_number_three" =>  Str::substr($getAddress->Address_Phone_1, 6, 4),
            ];

            $arr2 = [
                //"Address_Type" => $getAddress->Address_Type_2,
                "Country" => $getAddress->Country_2,
                "Address" =>  $getAddress->Address_2,
                "City" =>  $getAddress->City_2,
                "State" =>  $getAddress->State_2,
                "Zipcode" =>  $getAddress->Zipcode_2,
                //"Address_Phone" =>  $getAddress->Address_Phone_2
                "phone_number_one" => Str::substr($getAddress->Address_Phone_2, 0, 3),
                "phone_number_two" =>  Str::substr($getAddress->Address_Phone_2, 3, 3),
                "phone_number_three" =>  Str::substr($getAddress->Address_Phone_2, 6, 4),
            ];
            $arr3 = [
                //"Address_Type" => $getAddress->Address_Type_3,
                "Country" => $getAddress->Country_3,
                "Address" =>  $getAddress->Address_3,
                "City" =>  $getAddress->City_3,
                "State" =>  $getAddress->State_3,
                "Zipcode" =>  $getAddress->Zipcode_3,
                //"Address_Phone" =>  $getAddress->Address_Phone_3
                "phone_number_one" => Str::substr($getAddress->Address_Phone_3, 0, 3),
                "phone_number_two" =>  Str::substr($getAddress->Address_Phone_3, 3, 3),
                "phone_number_three" =>  Str::substr($getAddress->Address_Phone_3, 6, 4),
            ];
            $arr4 = [
                //"Address_Type" => $getAddress->Address_Type_4,
                "Country" => $getAddress->Country_4,
                "Address" =>  $getAddress->Address_4,
                "City" =>  $getAddress->City_4,
                "State" =>  $getAddress->State_4,
                "Zipcode" =>  $getAddress->Zipcode_4,
                //"Address_Phone" =>  $getAddress->Address_Phone_4
                "phone_number_one" => Str::substr($getAddress->Address_Phone_4, 0, 3),
                "phone_number_two" =>  Str::substr($getAddress->Address_Phone_4, 3, 3),
                "phone_number_three" =>  Str::substr($getAddress->Address_Phone_4, 6, 4),
            ];

            $address[] = $getAddress['Address_1'] || $getAddress['State_1'] || $getAddress['Zipcode_1'] ? $arr1 : null;
            $address[] = $getAddress['Address_2'] || $getAddress['State_2'] || $getAddress['Zipcode_2'] ? $arr2 : null;
            $address[] = $getAddress['Address_3'] || $getAddress['State_3'] || $getAddress['Zipcode_3'] ? $arr3 : null;
            $address[] = $getAddress['Address_4'] || $getAddress['State_4'] || $getAddress['Zipcode_4'] ? $arr4 : null;
            foreach ($address as $key => $value) {
                if (!is_null($value)) {
                    array_push($this->addressInfo, $value);
                }
            }
            //dd($this->addressInfo);

            $this->i = count($this->addressInfo);
            $this->isEdit = true;
        } else {
            $arr1 = [
                //"Address_Type_1" => 'Primary Address',
                "Country" => 'United States of America',
                "Address" => '',
                "City" => '',
                "State" => '',
                "Zipcode" => '',
                //"Address_Phone" => ''
                "phone_number_one" => '',
                "phone_number_two" =>  '',
                "phone_number_three" =>  '',
            ];
            array_push($this->addressInfo, $arr1);
        }

        $getApplication = Application::where('Profile_ID', Auth::guard('customer')->user()->id)->where('status', 0)->first();
        $this->application_id = $getApplication->Application_ID;
        $this->studentInfo = StudentInformation::where('Profile_ID', Auth::guard('customer')->user()->id)->where('Application_ID', $this->application_id)->first();

        $this->statusList = [
            ['value' => -1, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        $this->identifyRacially = IdentifyRacially::get()->toArray();
        $this->schoolList = School::get()->toArray();
        $this->suffixList = Suffix::get()->toArray();
        $this->countryList = Country::get()->toArray();
    }

    public function add($i)
    {
        $this->i += 1;
        $arr = [
            //"Address_Type_2" => 'Secondary Address',
            "Country" => 'United States of America',
            "Address" => '',
            "City" => '',
            "State" => '',
            "Zipcode" => '',
            //"Address_Phone" => ''
            "phone_number_one" => '',
            "phone_number_two" =>  '',
            "phone_number_three" =>  '',
        ];
        array_push($this->addressInfo, $arr);
    }
    public function remove($i)
    {
        $this->i -= 1;
        unset($this->addressInfo[$i]);
        $this->addressInfo = array_values($this->addressInfo);
    }

    public function saveOrUpdate()
    {
        foreach ($this->addressInfo as $addKey => $address) {
            $this->addressInfo[$addKey]['Address_Phone'] = $address['phone_number_one'] . $address['phone_number_two'] . $address['phone_number_three'];
        }
        //dd($this->addressInfo);
        $this->validate($this->addAddressInfoOneValidation());

        $new_arr = [];
        foreach (array_values($this->addressInfo) as $key => $value) {
            if ($key == 0) {
                $arr = [
                    "Address_Type_1" => 'Primary Address',
                    "Country_1" => $value['Country'],
                    "Address_1" => $value['Address'],
                    "City_1" => $value['City'],
                    "State_1" => $value['State'],
                    "Zipcode_1" => $value['Zipcode'],
                    "Address_Phone_1" => $value['phone_number_one'] . $value['phone_number_two'] . $value['phone_number_three']
                ];
            } elseif ($key == 1) {
                $arr = [
                    "Address_Type_2" => 'Secondary Address',
                    "Country_2" =>  $value['Country'],
                    "Address_2" => $value['Address'],
                    "City_2" => $value['City'],
                    "State_2" => $value['State'],
                    "Zipcode_2" => $value['Zipcode'],
                    "Address_Phone_2" =>  $value['phone_number_one'] . $value['phone_number_two'] . $value['phone_number_three']
                ];
            } elseif ($key == 2) {
                $arr = [
                    "Address_Type_3" => 'Other Address 1',
                    "Country_3" =>  $value['Country'],
                    "Address_3" => $value['Address'],
                    "City_3" => $value['City'],
                    "State_3" => $value['State'],
                    "Zipcode_3" => $value['Zipcode'],
                    "Address_Phone_3" =>  $value['phone_number_one'] . $value['phone_number_two'] . $value['phone_number_three']
                ];
            } elseif ($key == 3) {
                $arr = [
                    "Address_Type_4" => 'Other Address 2',
                    "Country_4" =>  $value['Country'],
                    "Address_4" => $value['Address'],
                    "City_4" => $value['City'],
                    "State_4" => $value['State'],
                    "Zipcode_4" => $value['Zipcode'],
                    "Address_Phone_4" =>  $value['phone_number_one'] . $value['phone_number_two'] . $value['phone_number_three']
                ];
            }

            array_push($new_arr, $arr);
        }

        //Merage all array to one array
        $addOrUpdateArr = Arr::collapse($new_arr);

        if ($this->isEdit) {
            AddressInformation::find($this->addressInfo_id)->delete();
        }
        $addOrUpdateArr['Profile_ID'] = Auth::guard('customer')->user()->id;
        $addOrUpdateArr['Application_ID'] = $this->application_id;
        AddressInformation::create($addOrUpdateArr);

        //Update Next step
        Application::where('Application_ID', $this->application_id)->where('Profile_ID', Auth::guard('customer')->user()->id)->update(['last_step_complete' => 'three']);

        return redirect()->route('admission-application', ['step' => 'three']);
    }

    public function render()
    {
        return view('livewire.frontend.application.application-two');
    }

    public function addAddressInfoOneValidation(): array
    {
        return [

            //'addressInfo.0.Address_Type' => ['required', 'max:40'],
            'addressInfo.0.Country' => ['required', 'max:40'],
            'addressInfo.0.Address' => ['required'],
            'addressInfo.0.City' => ['required'],
            'addressInfo.0.State' => ['required'],
            'addressInfo.0.Zipcode' => ['required'],
            'addressInfo.0.Address_Phone' => ['required', 'min:10'],
            'addressInfo.1.Address_Phone' => ['nullable', 'min:10'],
            'addressInfo.2.Address_Phone' => ['nullable', 'min:10'],
            'addressInfo.3.Address_Phone' => ['nullable', 'min:10'],
            //'addressInfo.0.State' => new RequiredIf($this->addressInfo[0]['Country'] == 1 || $this->addressInfo[0]['Country'] == 2),
        ];
    }
}
