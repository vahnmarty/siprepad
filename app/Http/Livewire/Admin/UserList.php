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
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
      public $userlist;
    public $searchFirstName, $searchLastName, $searchEmail, $searchPhone, $select_value;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public function mount($notificationButton = null)
    {
        $this->notificationButton = $notificationButton;
        // $this->perPageList = [
        //     ['value' => 5, 'text' => "5"],
        //     ['value' => 10, 'text' => "10"],
        //     ['value' => 20, 'text' => "20"],
        //     ['value' => 50, 'text' => "50"],
        //     ['value' => 100, 'text' => "100"]
        // ];

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
    
            return view('livewire.admin.user-list', [
                'users' => Profile::paginate(2),
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
  
    public function searchArray($array, $key, $value)
    {
        $results = array();
        
        if (is_array($array)) {
            if (isset($array[$key])) {
                if (strpos($array[$key], $value) !== false) {
                    $results[] = $array;
                }
            }
            
            foreach ($array as $subarray) {
                $results = array_merge($results, $this->searchArray($subarray, $key, $value));
            }
        }
        
        return $results;
    }
    
    public function sortByName($data)
    {

        dd($data);
        if ($data == "first_name") {
            $this->first_name_sort_by = ($this->first_name_sort_by == 'asc') ? 'desc' : 'asc';
            $this->last_name_sort = false;
            $this->first_name_sort = true;
        } else {
            $this->last_name_sort_by = ($this->last_name_sort_by == 'asc') ? 'desc' : 'asc';
            $this->first_name_sort = false;
            $this->last_name_sort = true;
        }
    }
    



    
    
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
