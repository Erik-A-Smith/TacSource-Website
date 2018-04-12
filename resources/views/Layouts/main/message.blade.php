@if (session('success'))
    @foreach (session('success') as $msg)
	<div class="alert alert-success">
		<strong>Success:</strong> {{ $msg }}
	</div>
    @endforeach
@endif

@if (session('message'))
    @foreach (session('message') as $msg)
	<div class="alert alert-primary">
		<strong>Success:</strong> {{ $msg }}
	</div>
    @endforeach
@endif

@if (session('error'))
    @foreach (session('error') as $msg)
	<div class="alert alert-danger">
		<strong>Error:</strong> {{ $msg }}
	</div>
	@endforeach
@endif

@if(isset($errors) && $errors->any())
	@foreach ($errors->all() as $msg)
	<div class="alert alert-danger">
		<strong>Oops!</strong> {{ $msg }}
	</div>
	@endforeach
@endif

@if (session('alert'))
    @foreach (session('alert') as $msg)
	<div class="alert alert-warning">
		<strong>Warning:</strong> {{ $msg }}
	</div>
	@endforeach
@endif
