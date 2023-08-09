<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('frontend.layouts.head')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="js">
    <div>
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layouts.footer')
</div>

</body>
</html>
