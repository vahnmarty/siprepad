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
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 13%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">User Name
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 13%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Rec. Name
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 13%;"
                aria-label="Company Email: activate to sort column ascending"> Rec. Email</th>

            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 13%;"
                aria-label="Company Agent: activate to sort column ascending">Rec. Student
            </th>
            {{-- <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 16%;"
                aria-label="Company Agent: activate to sort column ascending">Rec. Message
            </th> --}}
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 10%;" aria-label="Status: activate to sort column ascending">Rec. Request Send Date</th>

                <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 16%;" aria-label="Status: activate to sort column ascending">Status</th>

            <th class="align-center" rowspan="1" colspan="1" style="width: 22%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchRecName" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchRecEmail" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchRecStudent" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            {{-- <th>
                <x-admin.input type="search" placeholder="" autocomplete="off" class="form-control-sm form-filter"
                    disabled />
            </th> --}}
            <th>
                <x-admin.input type="date" placeholder="" wire:model.defer="searchRecSendDate" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>

                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchRecStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select One</option>
                    <option value="1">Complete</option>
                    <option value="0">Pending</option>
                </select>
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

    <x-slot name="tbody">
        @forelse($recommendations as $item)
            <tr role="row" class="odd">
                <td>
                    <a class="kt-link"
                        href="{{ route('users.show', ['user' => $item->Profile_ID]) }}">{{ $item->user->full_name }}</a>
                </td>
                <td>{{ $item->Rec_Name }}</td>
                <td>{{ $item->Rec_Email }}</td>
                <td>{{ $item->Rec_Student }}</td>
                {{-- <td>{!! $item->Rec_Message !!}</td> --}}
                <td>{{ \Carbon\Carbon::parse($item->Rec_Request_Send_Date)->format('d-m-Y') }}</td>
                <td class="align-center">
                    <span
                        class="kt-badge  kt-badge--{{ $item->Status == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill">{{ $item->Status == 1 ? 'Complete' : 'Pending' }}</span>
                </td>
                <x-admin.td-action>
                    <a class="dropdown-item"
                        href="{{ route('recommendation.show', ['recommendation' => $item->id]) }}"><i
                            class="la la-eye"></i> View Details</a>
                </x-admin.td-action>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $recommendations->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $recommendations->firstitem() ?? 0 }} to {{ $recommendations->lastitem() ?? 0 }} of
        {{ $recommendations->total() }}
        entries
    </x-slot>
</x-admin.table>
