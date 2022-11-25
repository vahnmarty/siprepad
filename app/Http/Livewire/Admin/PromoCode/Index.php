<?php

namespace App\Http\Livewire\Admin\PromoCode;

use Livewire\Component;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Exports\UsersExport;
use App\Models\Profile;
use App\Models\Promocode;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $searchCode, $searchAmount, $searchStatus = -1, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public function mount()
    {
        //
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchCode = "";
        $this->searchAmount = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $promoQuery = Promocode::query();
        if ($this->searchCode)
            $promoQuery->WhereRaw(
                "promo_code like '%" . trim($this->searchCode) . "%' "
            );
        if ($this->searchAmount)
            $promoQuery->where('discount_amount', $this->searchAmount);

        if ($this->searchStatus >= 0)
            $promoQuery->where('status', $this->searchStatus);

        return view('livewire.admin.promo-code.index', [
            'promoCode' => $promoQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }

    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this promo code!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        Promocode::destroy($id);
        $this->showModal('success', 'Success', 'Promo code has been deleted successfully');
    }


    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function changeStatus(Promocode $promocode)
    {
        $promocode->fill(['status' => ($promocode->status == 1) ? 0 : 1])->save();
        $this->showModal('success', 'Success', 'Status has been changed successfully');
    }
}
