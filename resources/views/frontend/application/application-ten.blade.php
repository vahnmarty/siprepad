@extends('layouts.frontend-layout')
@section('title', __('page_title.admission_application_page_title'))
@push('css')
<script type="text/javascript">
    window.history.forward();

    function noBack() {
        window.history.forward();
    }
</script>
@endpush
@section('content')
@livewire('frontend.application.application-ten', ['getReleaseAuthorization' => $getReleaseAuthorization,'student_transfer'=>$student_transfer])
@endsection
@push('js')
<script>
    function formats(ele, e) {
        if (ele.value.length < 19) {
            ele.value = ele.value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
            return true;
        } else {
            return false;
        }
    }

    function numberValidation(e) {
        e.target.value = e.target.value.replace(/[^\d ]/g, '');
        return false;
    }

    window.livewire.on('openPaymentModal', () => {
        $('#staticBackdrop').modal('show');
    })

    window.livewire.on('hidePaymentModal', (data) => {

        if (data.status === "error") {
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error(data.message);
        } else {
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success(data.message);
            $('#staticBackdrop').modal('hide');
            $('#successPaymentModal').modal('show');
        }

    })

    window.livewire.on('hidePayment', (data) => {
        $('#staticBackdrop').modal('hide');
    })
</script>
@endpush