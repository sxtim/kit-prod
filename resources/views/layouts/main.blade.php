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
	<footer class="footer">
		<div class="container">
			<div class="footer__wrapper">
				<div class="footer__logo logo">
					<img src="/assets/img/logo/logo.svg" alt="Logo">
				</div>
				<nav class="footer__col">
					<ul class="footer__list">
						<li><p class="footer__list-link">Мы в соц. сетях</p></li>
						<div class="footer-socials">
							<li><a href="#!"><img src="/assets/img/icons/VK.svg" alt="vk-icon"></a></li>
							<li><a href="#!"><img src="/assets/img/icons/TG.svg" alt="tg-icon"></a></li>
						</div>
					</ul>
					<ul class="footer__list">
						<li><a class="footer__list-link" href="!#">О компании</a></li>
						<li><a class="footer__list-link" href="!#">Жилые комплексы</a></li>
						<li><a class="footer__list-link" href="!#">Акции</a></li>
						<li><a class="footer__list-link" href="!#">Новости</a></li>
					</ul>
					<ul class="footer__list">
						<li><a class="footer__list-link" href="!#">Квартиры</a></li>
						<li><a class="footer__list-link" href="!#">Однокомнатные</a></li>
						<li><a class="footer__list-link" href="!#">Двухкомнатные</a></li>
						<li><a class="footer__list-link" href="!#">Трехкомнатные</a></li>
					</ul>
					<ul class="footer__list">
						<li><a class="footer__list-link" href="!#">Ипотека</a></li>
						<li><a class="footer__list-link" href="!#">Контакты</a></li>
						<li><a class="footer__list-link" href="!#">Коммерция</a></li>
						<li><a class="footer__list-link" href="!#">УК</a></li>
					</ul>
				</nav>
				<div class="footer__col-phone">
					<ul>
						<div class="footer__col-phone-item">
							<li>Отдел продаж</li>
							<a class="footer__phone phone" href="tel:+7 (473) 274-38-84">+7 (473) 274-38-84</a></div>
						<div class="footer__col-phone-item">
							<li>Многоканальный</li>
							<a class="footer__phone phone" href="tel:+7 (473) 273-80-46">+7 (473) 273-80-46</a></div>
						<div class="footer__col-phone-item">
							<li>Отдел снабжения</li>
							<a class="footer__phone phone" href="tel:+7 (473) 274-34-92">+7 (473) 274-34-92</a></div>
						<div class="footer__col-phone-item">
							<li>Факс</li>
							<a class="footer__phone phone" href="tel:+7 (473) 274-38-84">+7 (473) 274-38-84</a></div>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="/assets/js/index.bundle.js"></script>
</body>
</html>