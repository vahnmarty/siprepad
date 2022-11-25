<x-admin-layout title="Application Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('application.index') }}" value="Applications" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="View Application" />

            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <livewire:admin.application.show :application="$application" />
</x-admin-layout>
