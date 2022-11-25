<x-admin.table>
    <x-slot name="search">
    </x-slot>
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student First Name<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortByName('first_name')"></i>
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-label="Company Email: activate to sort column ascending">Student Last Name<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortByName('last_name')"></i></th>


            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Student Email
            </th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;"
                aria-label="Company Agent: activate to sort column ascending">Student Phone
            </th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 30%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchFirstName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchLastName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchEmail" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchPhone " placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <div class="row justify-content-center align-items-center">
                    <button class="btn btn-brand kt-btn btn-sm kt-btn--icon button-fx" wire:click="search">
                        <span>
                            <i class="la la-search"></i>
                            <span>Search</span>
                        </span>
                    </button>
                    <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon button-fx" wire:click="resetSearch">
                        <span>
                            <i class="la la-close"></i>
                            <span>Reset</span>
                        </span>
                    </button>
                </div>
            </th>
        </tr>
    </x-slot>

    @php
        $lastId = null;
        $rowClass = 'grey';
    @endphp
    <x-slot name="tbody">
        @forelse($students as $student)
            @php
                //if userid changed from last iteration, store new userid and change color
                if ($lastId !== $student['Application_ID']) {
                    $lastId = $student['Application_ID'];
                    if ($rowClass == 'grey') {
                        $rowClass = 'white';
                    } else {
                        $rowClass = 'grey';
                    }
                }
            @endphp

            <tr role="row" class="odd {{ $rowClass }}">
                <td>{{ ucfirst($student['First_Name']) ?? '---' }}</td>
                <td>{{ ucfirst($student['Last_Name']) ?? '---' }}</td>
                <td>{{ $student['Personal_Email'] ?? '---' }}</td>
                <td>{{ $student['Mobile_Phone'] ?? '---' }}</td>
                <td>
                    <div class="action__btn">
                        <a class="btn"
                            href="{{ route('application.show', ['application' => $student['Application_ID']]) }}">
                            <i class="la la-eye"></i>
                            @if ($student['status'] == 1)
                                View Submitted Application.
                            @else
                                View Incomplete Application.
                            @endif
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>

    <x-slot name="pagination">
        {{ $students->links() }}
    </x-slot>

    <x-slot name="showingEntries">
        Showing {{ $students->firstitem() ?? 0 }} to {{ $students->lastitem() ?? 0 }} of
        {{ $students->total() }}
        entries
    </x-slot>

</x-admin.table>
