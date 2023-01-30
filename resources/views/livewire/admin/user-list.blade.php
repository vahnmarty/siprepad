<x-admin.table>

    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">

            </x-admin.dropdown> entries
        </label>
    </x-slot>
    <x-slot name="thead">
        <tr role="row">
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">First Name

                <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('Pro_First_Name')"></i>
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 20%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Last

                Name<i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('Pro_Last_Name')"></i>
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-label="Company Email: activate to sort column ascending">Email</th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-label="Company Agent: activate to sort column ascending">Phone</th>


            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>

        <tr>
            <th class="text-center">
                <input type="text" id="searchFirstName">

            </th>
            <th class="text-center">
                <input type="text" id="searchLastName">

            </th>
            <th class="text-center">
                <input type="text" id="searchEmail">


            </th>
            <th class="text-center">
                <input type="text" id="searchPhone">

            </th>


            <th class="text-center">
                <div class="row text-center">
                    <div class="col-md-6"><a class="btn btn-primery text-light" id="serachData">Search</a></div>
                    <div class="col-md-6"><a class="btn btn-primery text-light" id="resetData">Reset</a></div>
                </div>


            </th>
        </tr>
    </x-slot>
    <x-slot name="tbody" id="user-list">
        @foreach($users as $user)
        <tr role="row" class="odd" id="dataU">
            <td class="align-center">{{ $user->Pro_First_Name ?? '---' }}</td>

            <td class="align-center">{{ $user->Pro_Last_Name ?? '---' }}</td>

            <td class="align-center"><a class="kt-link" href="mailto:adingate15@furl.net">{{ $user->email }}</a>
            </td>
            <td class="align-center">{{ $user->Pro_Mobile ?? '---' }}</td>
            @php
            $getApplication = App\Models\Application::where('Profile_ID', $user->id)->first();
            @endphp
            @if($getApplication)
            <td>
                <div class="action__btn">
                    <a class="btn" href="{{ route('application.show', ['application' => $getApplication->Application_ID]) }}">
                        <i class="la la-eye"></i>
                        @if ($getApplication->status == 1)
                        View Submitted Application.
                        @else
                        View Incomplete Application.
                        @endif
                    </a>
                </div>
            </td>
            @else
            <td>No Application Found</td>
            @endif
        </tr>

        @endforeach


    </x-slot>


</x-admin.table>