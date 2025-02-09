<header class="header">
    <div class="container">
        <div class="header__nav">
            <nav class="nav">
                <a href="{{route('home')}}" class="nav__logo nav__logo-dark">
                    <img src="/assets/img/logo/logo-dark.svg" alt="Logo">
                </a>
                <div class="nav__list header__nav-list-white">
                    <ul>
                        @include('partials.menu.header')
                        <a class="header__phone phone header__phone-white" href="tel:+7 (473) 274-38-84">+7 (473) 274-38-84</a>
                    </ul>
                </div>
                <div class="mobile-nav-btn">
                    <div class="nav-icon nav-icon-black"></div>
                </div>
                <div class="mobile-nav">
                    <ul class="mobile-nav__list">
                        @include('partials.menu.header')
                        <a class="header__phone phone header__phone-white" href="tel:+7 (473) 274-38-84">+7 (473) 274-38-84</a>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>