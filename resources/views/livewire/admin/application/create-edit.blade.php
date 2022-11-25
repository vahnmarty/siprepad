<div>
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
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(3)'>
                                                3. Parent Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(4)'>
                                                4. Sibling Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(5)'>
                                                5. Legacy Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(6)'>
                                                6. Parent Statement
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(7)'>
                                                7. Spirituality and Community Info
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(8)'>
                                                8. Student Statement
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step"
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(9)'>
                                                9. Writing Sample
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title"  wire:click='currentStep(10)'>
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
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Student Information</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John" wire:model='first_name'>
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>

                        <!--end: Form Wizard Step 1-->

                        <!--begin: Form Wizard Step 2-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Address Information</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 2-->

                        <!--begin: Form Wizard Step 3-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Parent Information</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 3-->

                        <!--begin: Form Wizard Step 4-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Siblings Information</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 4-->

                        <!--begin: Form Wizard Step 5-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Alumni/Legacy Family Information</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 5-->

                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Parent Statement</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 6-->

                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Family Spirituality and Community
                                    Information
                                </div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 7-->
                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Student Statement</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 8-->
                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Applicant Writing Sample
                                </div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 9-->
                        <!--begin: Form Wizard Step 10-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <form class="kt-form" id="kt_form" wire:submit.prevent="application">
                                <div class="kt-heading kt-heading--md">Edit Release Authorization
                                </div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="John">
                                            <span class="form-text text-muted">Please enter your first
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname"
                                                placeholder="Last Name" value="Wick">
                                            <span class="form-text text-muted">Please enter your last
                                                name.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" name="phone"
                                                        placeholder="phone" value="+61412345678">
                                                    <span class="form-text text-muted">Please enter your
                                                        phone number.</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email" value="john.wick@reeves.com">
                                                    <span class="form-text text-muted">Please enter your
                                                        email address.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <button type="submit"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">Update</button>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                        </div>
                        <!--end: Form Wizard Step 10-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>
