<x-admin-layout title="Recommendation Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('recommendation.index') }}" value="Recommendations" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="{{ $recommendation ? 'Edit' : 'Add' }} Recommendation" />

            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <livewire:admin.recommendation.create-edit :recommendation="$recommendation" />
</x-admin-layout>
