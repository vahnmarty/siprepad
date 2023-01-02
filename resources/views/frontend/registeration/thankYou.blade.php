@extends('layouts.frontend-layout')
@push('css')
@endpush
@section('content')
<form action="" method="POST">
@csrf

	<div class="home-wrap hme-wrp2">
		<div class="progress-outr"></div>
		<div class="form-outr">

			<div class="form-outr">
				<div class="cmn-hdr">

					<h4>THANK YOU</h4>
					<p><center>Your form details have been saved successfully.</center></p>
				</div>

			</div>

		</div>

	</div>
</form>


@endsection
@push('js')
@endpush

