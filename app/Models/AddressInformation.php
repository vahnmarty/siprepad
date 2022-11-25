<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressInformation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'Profile_ID', 'Application_ID',
        'Address_Type_1', 'Country_1', 'Address_1', 'City_1', 'State_1', 'Zipcode_1', 'Address_Phone_1',
        'Address_Type_2', 'Country_2', 'Address_2', 'City_2', 'State_2', 'Zipcode_2', 'Address_Phone_2',
        'Address_Type_3', 'Country_3', 'Address_3', 'City_3', 'State_3', 'Zipcode_3', 'Address_Phone_3',
        'Address_Type_4', 'Country_4', 'Address_4', 'City_4', 'State_4', 'Zipcode_4', 'Address_Phone_4',
        'Address_Info_Date','is_step_complete'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function countryCode()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function stateCode()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function cityCode()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
