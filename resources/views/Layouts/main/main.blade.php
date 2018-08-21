<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>
		TacSource
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<!-- end::Web font -->

	<!-- begin::CSS -->
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('/css/Global/global.css') }}">

	@stack("css")
	<!-- end:CSS -->
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body>
	<div class="container-fluid">
		<!-- begin::Header -->
		@include('Layouts.main.header')
		<!-- end::Header -->

		<!-- <div class="container"> -->
		<div class="content">

			<!-- begin::Messages -->
			@include ('Layouts.main.message')
			<!-- end::Messages -->

			<!-- begin::Content -->
			@yield('content')
			<!-- end::Content -->

		</div>
		<!-- begin::Footer -->
		@include('Layouts.main.footer')
		<!-- end::Footer -->


		<!-- begin::Modals -->
		@stack('modal')
		<!-- end::Modals -->
	</div>
	<!-- begin::Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>


	<script src="{{ URL::asset('/js/Global/global.js') }}"></script>
	@stack("js")
	<!-- end::Scripts -->
</body>
<!-- end::Body -->
</html>
