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
<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Promo Code" required />
            <x-admin.input type="text" wire:model.defer="promo_code" placeholder="Enter promo code name"
                class="{{ $errors->has('promo_code') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="promo_code" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Discount Amount($)" required />
            <x-admin.input type="text" wire:model.defer="discount_amount" placeholder="Enter discount amount"
                class="{{ $errors->has('discount_amount') ? 'is-invalid' : '' }}" />
            <x-admin.input-error for="discount_amount" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Status" />
            <x-admin.dropdown wire:model.defer="status" placeHolderText="Please select one" autocomplete="off"
                class="{{ $errors->has('status') ? 'is-invalid' : '' }}">
                @foreach ($statusList as $status)
                    <x-admin.dropdown-item :value="$status['value']" :text="$status['text']" />
                @endforeach
            </x-admin.dropdown>
            <x-admin.input-error for="status" />
        </x-admin.form-group>
        <div class="col-lg-12">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-12">
                        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
                        <x-admin.link :href="route('promocode.index')" color="secondary">Cancel</x-admin.link>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin.form-section>
