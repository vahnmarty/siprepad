@props(['submit'])
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="form-group validated row">
                {{ $form }}
                {{-- <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-12">
                                {{ $actions }}
                            </div>
                            <div class="col-lg-12 kt-align-right">
                                {{ $actions_2 }}
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>
    </div>
</div>
