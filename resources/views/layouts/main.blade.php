<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/assets/css/main.css?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/css/main.css')}}" />
	<link rel="stylesheet" href="/assets/fonts/Montserrat/stylesheet.css?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Montserrat/stylesheet.css')}}"/>
	<link rel="stylesheet" href="/assets/fonts/Oswald/stylesheet.css?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Oswald/stylesheet.css')}}"/>
	<link rel="stylesheet" href="/assets/fonts/Pangram1/stylesheet.css?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/fonts/Pangram1/stylesheet.css')}}"/>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
			m[i].l=1*new Date();
			for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
			k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(17959771, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
		});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/17959771" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<meta name="yandex-verification" content="debaac812cceb84b" />
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
	<script src="/assets/js/index.bundle.js?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/index.bundle.js')}}"></script>
	<script src="/assets/js/backend.js?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/js/backend.js')}}"></script>
</body>
</html>