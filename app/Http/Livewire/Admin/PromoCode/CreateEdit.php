<?php

namespace App\Http\Livewire\Admin\PromoCode;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Promocode;

class CreateEdit extends Component
{
    use AlertMessage;
    public $promo_code, $discount_amount, $status, $promoCode;
    public $isEdit = false;
    public $statusList = [];
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($promoCode = null)
    {
        if ($promoCode) {
            $this->promoCode = $promoCode;
            $this->fill($this->promoCode);
            $this->isEdit = true;
        } else
            $this->promoCode = new Promocode();

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
    }

    public function validationRuleForSave(): array
    {
        return [
            'promo_code' => ['required', 'max:255'],
            'discount_amount' => ['required'],
            'status' => ['required']
        ];
    }

    public function saveOrUpdate()
    {
        $this->promoCode->fill($this->validate($this->isEdit ? $this->validationRuleForSave() : $this->validationRuleForSave()))->save();

        $msgAction = 'Promo code was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);
        return redirect()->route('promocode.index');
    }
    public function render()
    {
        return view('livewire.admin.promo-code.create-edit');
    }
}
