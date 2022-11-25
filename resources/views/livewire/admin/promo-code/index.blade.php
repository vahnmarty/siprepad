{{-- <div>
    <div class="row application__dtails">
        <div class="col-md-12">
            <div class="kt-section">
                <div class="no_data__found">
                    <h3>Development in Progress...</h3>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                style="width: 25%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Promo Code
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 25%;" aria-label="Company Email: activate to sort column ascending">Discount Amount</th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1"
                style="width: 25%;" aria-label="Status: activate to sort column ascending">Status</th>
            {{-- <th class="align-center" rowspan="1" colspan="1" style="width: 25%;" aria-label="Actions">Actions</th> --}}
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchCode" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchAmount" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select One</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </th>
            {{-- <th>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th> --}}
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($promoCode as $promo)
            <tr role="row" class="odd">

                <td class="align-center">{{ $promo->promo_code ?? '---' }}</td>

                <td class="align-center">{{ $promo->discount_amount ?  '$'.''.$promo->discount_amount :'---' }}</td>

                <td class="align-center">
                    <span
                        class="kt-badge  kt-badge--{{ $promo->status == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill cursor-pointer"
                        wire:click="changeStatusConfirm({{ $promo->id }})">{{ $promo->status == 1 ? 'Active' : 'Inactive' }}</span>
                </td>
                {{-- <x-admin.td-action>
                    <a class="dropdown-item" href="{{ route('users.show',['vendor'=>$user->id]) }}"><i class="la la-eye"></i>Edit</a>
                    <a class="dropdown-item" href="{{ route('users.stock',['vendor'=>$user->id]) }}"><i class="la la-eye"></i> View Application</a>
                </x-admin.td-action> --}}
            </tr>
        @empty
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $promoCode->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $promoCode->firstitem() ?? 0 }} to {{ $promoCode->lastitem() ?? 0 }} of {{ $promoCode->total() }}
        entries
    </x-slot>
</x-admin.table>
