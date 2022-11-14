@extends('auth.layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
					@if (\Session::has('success'))
					<div class="alert alert-success">
							{!! \Session::get('success') !!}
					</div>
					@endif

					@if (\Session::has('warning'))
					<div class="alert alert-warning">
							{!! \Session::get('warning') !!}
					</div>
					@endif
					
			<div class="card">
				<div class="card-header">
					{{ __('Login to reset email') }}
				</div>

				<div class="card-body">

					<form method="POST" action="{{ route('email.update',$email) }}" id="loginForm1">
						@method('PUT')
						@csrf

						<input type="hidden" name="token" value="{{ $resetToken }}">

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" autocomplete>
								
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Login') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@push('after_scripts')

<script type="text/javascript"> 
	$(document).ready(function() {
		$("#loginForm1").validate({
			rules: {
				password: "required",
			},
			messages: {
				password: " Enter Password",
			}
		});
	});
</script>
@endpush

@endsection
