<!DOCTYPE html>
<html lang="es">
<head>
    @include('layouts/partials/meta')
	<meta name="description" content="@yield('description')">
	@include('layouts/partials/icons')
	<title>@yield('title') | Direco</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	@yield('stylesheets')
</head>
<body>
    @include('layouts/partials/top')
	
    {!! Alert::render('components/alert') !!}

	@yield('slider')

	<div class="wrap">
		@yield('content')
	</div>

    @include('layouts/partials/footer')

	<script src="/assets/js/jquery.min.js"></script>
	@yield('scripts')
	<script src="/assets/js/scripts.min.js"></script>
</body>
</html>