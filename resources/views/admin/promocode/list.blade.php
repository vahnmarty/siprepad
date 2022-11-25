<x-admin-layout title="Promo Code Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Promo Code List">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('promocode.index') }}" value="Promo Code List" />
            </x-admin.breadcrumbs>

            <x-slot name="toolbar">
                <a href="{{ route('promocode.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    Add New Promo Code
                </a>
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.promo-code.index')
</x-admin-layout>
