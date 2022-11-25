<x-admin-layout title="User Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="View User">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('users.index') }}" value="User List" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="View User" />

            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    @livewire('admin.user-view', ['user' => $user])
</x-admin-layout>
