<?php

namespace App\Http\Livewire\Frontend\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;


class EditProfile extends Component
{
    public $user, $email, $Pro_First_Name, $Pro_Last_Name, $Pro_Mobile, $Pro_Mobile_one, $Pro_Mobile_two, $Pro_Mobile_three;

    public function mount()
    {
        $getUser = Auth::guard('customer')->user();
        //dd($getUser);
        $this->Pro_Mobile = $getUser->Pro_Mobile;
        $this->user = $getUser;
        $data = [
            "email" => $getUser->email,
            "Pro_First_Name" => $getUser->Pro_First_Name,
            "Pro_Last_Name" => $getUser->Pro_Last_Name,
            "Pro_Mobile_one" => Str::substr($getUser->Pro_Mobile, 0, 3),
            "Pro_Mobile_two" => Str::substr($getUser->Pro_Mobile, 3, 3),
            "Pro_Mobile_three" => Str::substr($getUser->Pro_Mobile, 6, 4),
        ];

        $this->fill($data);
    }
    public function render()
    {
        return view('livewire.frontend.profile.edit-profile');
    }
    public function customProfileValidation(): array
    {
        $user = Auth::guard('customer')->user();
        return [
            'Pro_First_Name' => ['required'],
            'Pro_Last_Name' => ['required'],
            'email' => ['required', 'email:rfc,dns', 'unique:profiles,email,' . $user->id],
            'Pro_Mobile' => ['required', 'min:10'],
        ];
    }

    protected $messages = [
        'email.unique' => 'This email already exists',
    ];

    public function saveOrUpdate()
    {
        $this->Pro_Mobile = $this->Pro_Mobile_one . $this->Pro_Mobile_two . $this->Pro_Mobile_three;
        $this->validate($this->customProfileValidation());

        $profileArr = [
            'Pro_First_Name' => $this->Pro_First_Name,
            'Pro_Last_Name' => $this->Pro_Last_Name,
            'email' => $this->email,
            'Pro_Mobile' => $this->Pro_Mobile,
        ];
        Profile::where('id', $this->user->id)->update($profileArr);
        return redirect('/')->with('success', 'Your profile has been updated');
    }
}
