<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/assets/css/main.css" />
	<link rel="stylesheet" href="/assets/fonts/Montserrat/stylesheet.css"/>
	<link rel="stylesheet" href="/assets/fonts/Oswald/stylesheet.css"/>
	<link rel="stylesheet" href="/assets/fonts/Pangram1/stylesheet.css"/>
</head>
<body>
	@switch(Route::currentRouteName())
		@case('home')
			@include('layouts.header.home')
		@break

		@default
			@include('layouts.header.other')
	@endswitch
	<main class="main">
		@yield('content')
	</main>
	@include('layouts.footer.base')
	<script src="/assets/js/index.bundle.js"></script>
</body>
</html>