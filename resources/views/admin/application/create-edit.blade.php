<x-admin-layout title="Application Management">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="">
            <x-admin.breadcrumbs>
                <x-admin.breadcrumbs-item value="Dashboard" href="{{ route('admin.dashboard') }}" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item href="{{ route('application.index') }}" value="Applications" />
                <x-admin.breadcrumbs-separator />
                <x-admin.breadcrumbs-item value="{{ $application ? 'Edit' : 'Add' }} Application" />

            </x-admin.breadcrumbs>
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
    </x-slot>
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
                    <div class="kt-grid__item kt-wizard-v2__aside">
                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v2__nav">
                            <div class="kt-wizard-v2__nav-items">
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                1. Student Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                2. Address Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                3. Parent Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                4. Sibling Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                5. Legacy Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                6. Parent Statement
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                7. Spirituality and Community Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                8. Student Statement
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                9. Writing Sample
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                10. Release Authorization!
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                        <!--begin: Form Wizard Step 1-->

                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content"
                            data-ktwizard-state="current">
                            <livewire:admin.application.step-one :application="$application" />
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-two :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-three :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-four :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Wizard Step 5-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-five :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 5-->

                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-six :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 6-->

                        <!--begin: Form Wizard Step 7-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-seven :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 7-->
                        
                        <!--begin: Form Wizard Step 8-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-eight :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 8-->

                        <!--begin: Form Wizard Step 9-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-nine :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 9-->

                        <!--begin: Form Wizard Step 10-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <livewire:admin.application.step-ten :application="$application" />
                        </div>
                        <!--end: Form Wizard Step 10-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</x-admin-layout>
