<div class="notification_action"> 
 @if($notificationButton[0]->notifiable == '1') 
  <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_ON}}/{{$notificationButton[0]->id}}"style="color: white; background: linear-gradient(180deg, #19a74d 0%, #002664 100%) !important;"class="btn btn-on mb-3">Notification On</a> 
 @else 
 <a href="{{ url('/admin/user/notify/')}}/{{App\Models\Profile::NOTIFICATION_OFF}}/{{$notificationButton[0]->id}}" style="color:white" class="btn btn-off mb-3">Notification Off</a> 
 @endif 
  </div> 
 <div>
 
<x-admin.table>
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
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 20%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">First Name

                <i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortBy('Pro_First_Name')"></i>
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"

                style="width: 20%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Last

                Name<i class="fa fa-fw fa-sort pull-right" style="cursor: pointer;"
                    wire:click="sortBy('Pro_Last_Name')"></i>
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 15%;" aria-label="Company Email: activate to sort column ascending">Email</th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 15%;" aria-label="Company Agent: activate to sort column ascending">Phone</th>

            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Status</th>
                
             <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 10%;" aria-label="Company Agent: activate to sort column ascending">Decision</th>
                
            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
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
                <x-admin.input type="search" wire:model.defer="searchPhone" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
          <th>
          </th>
            <th>
          </th>
            <th>
            
                <div class="row">
                    <div class="col-md-5">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($users as $user)
            <tr role="row" class="odd">

                {{-- <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__pic">
                            <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor() }}">
                                <span>{{ substr($user->Pro_First_Name, 0, 1) }}{{ substr($user->Pro_Last_Name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name">{{ ucwords($user->full_name) }}</span>
                            <a href="#" class="kt-user-card-v2__email kt-link">Member since
                                {{ $user->created_at->diffForHumans(null, true) . ' ' }}</a>
                        </div>
                    </div>
                </td> --}}

                <td class="align-center">{{ $user->Pro_First_Name ?? '---' }}</td>

                <td class="align-center">{{ $user->Pro_Last_Name ?? '---' }}</td>

                <td class="align-center"><a class="kt-link" href="mailto:adingate15@furl.net">{{ $user->email }}</a>
                </td>
                <td class="align-center">{{ $user->Pro_Mobile ?? '---' }}</td>

                @php
                    $getApplication = App\Models\Application::where('Profile_ID', $user->id)
                        //->where('status', 1)
                       //->where('last_step_complete', 'ten')
                        ->first();
                @endphp
                          
                <td>
                @if($getApplication)
                    <input type='hidden' name='app_id' value='{{ $getApplication->Application_ID }}'>
                    @switch($getApplication->application_type_id)
                        @case(1)
                        <select name='candidate-status' required class='state_select-box'>
                            <option value='' disabled>Select</option>
                            <option value='1' selected>Accepted</option>
                            <option value='2'>Wait Listed</option>
                            <option value='3'>Not Accepted</option>
                        </select>
                        @break
                        @case(2)
                        <select name='candidate-status' required class='state_select-box'>
                            <option value=''disabled>Select</option>
                            <option value='1'>Accepted</option>
                            <option value='2' selected>Wait Listed</option>
                            <option value='3'>Not Accepted</option>
                        </select>
                        @break
                        @case(3)
                        <select name='candidate-status' required class='state_select-box'>
                            <option value=''disabled>Select</option>
                            <option value='1'>Accepted</option>
                            <option value='2'>Wait Listed</option>
                            <option value='3' selected>Not Accepted</option>
                        </select>
                        @break
                        @default 
                        <select name='candidate-status' required class='state_select-box'>
                            <option value='' selected disabled>Select</option>
                            <option value='1'>Accepted</option>
                            <option value='2'>Wait Listed</option>
                            <option value='3'>Not Accepted</option>
                        </select>
                    @endswitch
                    @endif
                </td>
                <td>
               
                        <div class="decision">
                        @if ($getApplication)
                        @switch($getApplication->candidate_status)
                          @case(1)
                          {{"Offer Accepted"}}
                           @break
                        @case(2)
                        {{"Offer Rejected"}}
                         @break
                        @case(3)
                        {{"Offer Read"}}
                        @break
                        @default
                        {{"Offer not Read"}}
                          @endswitch
                           @endif
                        </div>
                    </td>
                
                
                
            
                @if($getApplication)

                

                    <td>
                        <div class="action__btn">
                            <a class="btn"
                                href="{{ route('application.show', ['application' => $getApplication->Application_ID]) }}">
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
        @empty
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $users->links() }}  
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $users->firstitem() ?? 0 }} to {{ $users->lastitem() ?? 0 }} of {{ $users->total() }}
        entries
    </x-slot>
</x-admin.table>
</div>
</div>
</div>