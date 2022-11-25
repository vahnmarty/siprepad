<x-admin-layout title="Promo Code Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="{{ $promocode ? 'Edit' : 'Add' }} Promo Code">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('promocode.index') }}" value="Promo Code List" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="{{ $promocode ? 'Edit' : 'Add' }} Promo Code" />
            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.promo-code.create-edit', ['promocode' => $promocode])
</x-admin-layout>
