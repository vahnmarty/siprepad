<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
class UserView extends Component
{
    public $user;
    public function mount($user = null)
    {
        $this->user=$user;
    }
    public function render()
    {
        return view('livewire.admin.user-view');
    }
}
