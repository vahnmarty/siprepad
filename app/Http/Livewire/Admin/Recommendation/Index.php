<?php

namespace App\Http\Livewire\Admin\Recommendation;

use Livewire\Component;
use App\Exports\UsersExport;
use App\Http\Livewire\Traits\AlertMessage;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Recommendation;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    protected $paginationTheme = 'bootstrap';
    public $searchName, $searchRecName, $searchRecEmail, $searchRecStudent,$searchRecStatus=-1, $searchRecSendDate, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus', 'deleteSelected'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
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
        $this->searchName = "";
        $this->searchRecName = "";
        $this->searchRecEmail = "";
        $this->searchRecStudent = "";
        $this->searchRecSendDate = "";
        $this->searchRecStatus= -1;

    }

    public function render()
    {
        $dbQuery = Recommendation::query();

        if ($this->searchName) {
            $q = $this->searchName;
            $dbQuery->whereHas('user', function ($query) use ($q) {
                $query->WhereRaw("concat(Pro_First_Name,' ', Pro_Last_Name) like '%" . trim($q) . "%' ");
            });
        }
        if ($this->searchRecName)
            $dbQuery->where('Rec_Name', 'like', '%' . trim($this->searchRecName) . '%');
        if ($this->searchRecEmail)
            $dbQuery->where('Rec_Email', $this->searchRecEmail);
        if ($this->searchRecStudent)
            $dbQuery->where('Rec_Student', $this->searchRecStudent);
        if ($this->searchRecSendDate)
            $dbQuery->where('Rec_Request_Send_Date', $this->searchRecSendDate);

        if ($this->searchRecStatus>=0)
            $dbQuery->where('Status', $this->searchRecStatus);

            
        return view('livewire.admin.recommendation.index', [
            'recommendations' => $dbQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }

    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this recommendation!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function deleteConfirm($id)
    {
        Recommendation::destroy($id);
        //dd($id,$id['id']);
        //Recommendation::find($id)->delete();
        $this->showModal('success', 'Success', 'Recommendation has been deleted successfully');
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->bulkDelIds = Recommendation::pluck('id');
        } else {
            $this->bulkDelIds = [];
        }
    }

    public function bulkDeleteAttempt()
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this data !", 'Yes, delete!', 'deleteSelected', []); //($type,$title,$text,$confirmText,$method)
    }

    public function deleteSelected()
    {
        // dd($this->bulkDelIds);
        Recommendation::query()->whereIn('id', $this->bulkDelIds)->delete();
        $this->bulkDelIds = [];
        $this->selectAll = false;
        $this->showModal('success', 'Success', 'Recommendation have been deleted successfully');
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function changeStatus(Recommendation $data)
    {
        $data->fill(['active' => ($data->active == 1) ? 0 : 1])->save();
        $this->showModal('success', 'Success', 'Status has been changed successfully');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
