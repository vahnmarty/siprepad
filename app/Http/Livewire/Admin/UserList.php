<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\AlertMessage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Exports\UsersExport;
use App\Models\Application;
use App\Models\Profile;
use Maatwebsite\Excel\Facades\Excel;

class UserList extends Component
{

    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $bulkDelIds = [];
    public $selectAll = false;
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];
    public $notificationButton;
    protected $paginationTheme = 'bootstrap';
    public $valueStatus;

    public $searchFirstName, $searchLastName, $searchEmail, $searchPhone, $perPage = 5,$select_value;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public function mount($notificationButton = null)
    {
        $this->notificationButton = $notificationButton;
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
        $this->status = request('status');
    }
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function appStatus() {
      return $this->select_value;
    }

    public function resetSearch()
    {
        $this->searchFirstName = "";
        $this->searchLastName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
    }

    public function render()
    {
        $userQuery = Profile::query();

        if ($this->searchFirstName)
            $userQuery->where('Pro_First_Name', 'like', '%' . trim($this->searchFirstName) . '%');

        if ($this->searchLastName)
            $userQuery->where('Pro_Last_Name', 'like', '%' . trim($this->searchLastName) . '%');

        if ($this->searchEmail)
            $userQuery->where('email', 'like', '%' . trim($this->searchEmail) . '%');

        if ($this->searchPhone)
            $userQuery->where('Pro_Mobile', 'like', '%' . trim($this->searchPhone) . '%');

        return view('livewire.admin.user-list', [
            'users' => $userQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Profile::destroy($id);
        $this->showModal('success', 'Success', 'User has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this user!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->bulkDelIds = Profile::role('CLIENT')->pluck('id');
        } else {
            $this->bulkDelIds = [];
        }
    }

    public function deleteSelected()
    {
        Profile::query()->whereIn('id', $this->bulkDelIds)->delete();
        $this->bulkDelIds = [];
        $this->selectAll = false;
        $this->showModal('success', 'Success', 'Users have been deleted successfully');
    }

    public function bulkDeleteAttempt()
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this data !", 'Yes, delete!', 'deleteSelected', []); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Profile $user)
    {
        $user->fill(['active' => ($user->active == 1) ? 0 : 1])->save();
        if ($user->active != 1) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        $this->showModal('success', 'Success', 'User status has been changed successfully');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
