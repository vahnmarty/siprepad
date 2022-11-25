<?php

namespace App\Http\Livewire\Admin\Recommendation;

use Livewire\Component;

class Show extends Component
{
    public $recommendation;

    public function mount($recommendation = null)
    {
        $this->recommendation = $recommendation;
    }
    public function render()
    {
        return view('livewire.admin.recommendation.show');
    }
}
