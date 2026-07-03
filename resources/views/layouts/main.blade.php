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
	@if(!empty($siteSettings) && $siteSettings->snowfall_enabled && Route::currentRouteName() === 'home')
		<link rel="stylesheet" href="/assets/Snowfall.js/snowfall.css?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/Snowfall.js/snowfall.css')}}" />
	@endif
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
	@php
		$brandContacts = $brandContacts ?? [];
		$brandLogo = filled($brandContacts['logo'] ?? null) ? $brandContacts['logo'] : null;
		$brandPhone = filled($brandContacts['phone'] ?? null) ? $brandContacts['phone'] : '+7 (473) 274-38-84';
		$brandPhoneDigits = preg_replace('/\D+/', '', $brandPhone);
		$brandPhoneHref = $brandPhoneDigits ? 'tel:+' . $brandPhoneDigits : 'tel:' . $brandPhone;
		$brandEmail = filled($brandContacts['email'] ?? null) ? $brandContacts['email'] : null;
		$hasBrandContacts = $brandLogo || filled($brandContacts['phone'] ?? null) || $brandEmail;
	@endphp
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
	<script>
        document.addEventListener('DOMContentLoaded', function () {
            const trackedParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'yclid', 'gclid', 'fbclid'];
            const forms = document.querySelectorAll('form.form-contact');

            if (!forms.length) {
                return;
            }

            const currentUrl = window.location.href;
            const currentParams = new URLSearchParams(window.location.search);
            const storedLandingUrl = sessionStorage.getItem('lead_landing_url');

            if (!storedLandingUrl) {
                sessionStorage.setItem('lead_landing_url', currentUrl);
            }

            trackedParams.forEach(function (key) {
                const value = currentParams.get(key);

                if (value) {
                    sessionStorage.setItem('lead_' + key, value);
                }
            });

            const setHiddenValue = function (form, name, value) {
                let input = form.querySelector('input[name="' + name + '"]');

                if (!input) {
                    input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    form.appendChild(input);
                }

                input.value = value ?? '';
            };

            forms.forEach(function (form) {
                if (!form.dataset.formOpenedAt) {
                    form.dataset.formOpenedAt = String(Date.now());
                }

                setHiddenValue(form, 'form_opened_at', form.dataset.formOpenedAt);
                setHiddenValue(form, 'page_url', currentUrl);
                setHiddenValue(form, 'landing_url', sessionStorage.getItem('lead_landing_url') || currentUrl);

                trackedParams.forEach(function (key) {
                    setHiddenValue(form, key, sessionStorage.getItem('lead_' + key) || currentParams.get(key) || '');
                });
            });

            document.addEventListener('submit', function (event) {
                const form = event.target;

                if (!(form instanceof HTMLFormElement) || !form.matches('form.form-contact')) {
                    return;
                }

                if (!form.dataset.formOpenedAt) {
                    form.dataset.formOpenedAt = String(Date.now());
                }

                setHiddenValue(form, 'form_opened_at', form.dataset.formOpenedAt);
                setHiddenValue(form, 'page_url', window.location.href);
                setHiddenValue(form, 'landing_url', sessionStorage.getItem('lead_landing_url') || window.location.href);

                trackedParams.forEach(function (key) {
                    setHiddenValue(form, key, sessionStorage.getItem('lead_' + key) || currentParams.get(key) || '');
                });
            }, true);
        });
	</script>
	@vite('resources/js/app.js')
	@if(!empty($siteSettings) && $siteSettings->snowfall_enabled && Route::currentRouteName() === 'home')
		<script src="/assets/Snowfall.js/snowfall.js?m={{filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/Snowfall.js/snowfall.js')}}"></script>
		<script>
            document.addEventListener('DOMContentLoaded', function () {
                if (typeof Snowfall === 'function') {
                    new Snowfall();
                }
            });
		</script>
	@endif
</body>
</html>
