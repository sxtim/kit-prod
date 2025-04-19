@extends('layouts.main')
@section('title', 'Новость')
@section('content')
    @include('partials.breadcrumb')
        <section class="complex-single__top-banner section">
            <div class="container">
                <h1 class="title title-page">{{$item->title}}</h1>
                <div class="single-banner">
                    <img src="/assets/img/complexes/zhk-sputnik.jpg" alt="">
                    <div class="single-banner__row">
                        <div class="single-banner__item">
                            <div class="single-banner__item-title">Преимущество</div>
                            <div class="single-banner__item-text">Описание преимущества</div>
                        </div>
                        <div class="single-banner__item">
                            <div class="single-banner__item-title">Преимущество</div>
                            <div class="single-banner__item-text">Описание преимущества</div>
                        </div>
                        <div class="single-banner__item">
                            <div class="single-banner__item-title">Преимущество</div>
                            <div class="single-banner__item-text">Описание преимущества</div>
                        </div>
                        <div class="single-banner__item">
                            <div class="single-banner__item-title">Преимущество</div>
                            <div class="single-banner__item-text">Описание преимущества</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-project section">
            <div class="container">
                <h3 class="title">ЖК «Спутник» в Воронеже</h3>
                <div class="about-project__wrap">
                    <div class="about-project__col">
                        <div class="about-project__text">
                            <p><span> Жилой комплекс «Спутник» находится в центральном районе на севере Воронежа, в экологически
                      чистом
                      месте. Рядом заповедник Воронежской нагорной дубравы и лесопарк НИИЛГиС.
                    </span></p>
                            <p> <span> Есть вся необходимая социальная инфраструктура, новый детский сад и Мегашкола. Благодаря
                      удачному
                      расположению и просторным квартирам ЖК «Спутник» в Воронеже можно считать одним из лучших мест для
                      проживания семей с детьми.</span></p>
                            <p>
                            <p><span>Основные параметры:</span></p>
                            <p><span>- комплекс состоит из</span> 10 позиций <span>(блоков) по</span> 16 этажей <span></span></p>
                            <p><span>- квартиры</span> от 1 до 3 комнат,<span> сдаются с отделкой</span></p>
                            <p><span>- просторные планировки с гардеробными</span></p>
                            <p><span>- площадь квартир</span>от 48,7 до 103 м2</p>
                            </p>
                        </div>
                    </div>
                    @if($item->video)
                        <div class="about-project__col">
                            <div class="about-project__media">
                                <iframe src="{{$item->video}}" width="100%" height="360"
                                        allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <section class="filter section">
            <div class="container">
                <h3 class="title">Выбрать квартиру</h3>
            </div>

            <form action="apartments-catalog.html">
                <div class="filter__wrap">
                    <div class="filter__tab-row">
                        <div class="filter__col filter-mobile-top">
                            <div class="filter__el filter__hidden-elements active">
                                <h4 class="filter__row-title">Комнаты</h4>
                                <div class="filter__row-el-btns-container">
                                    <button class="filter__el-btns btn-small">1к</button>
                                    <button class="filter__el-btns btn-small">2к</button>
                                    <button class="filter__el-btns btn-small">3к</button>
                                </div>
                            </div>
                            <div class="filter__el filter__hidden-elements active">
                                <div class='filter__dropdown'>
                                    <label class="filter__dropdown-menu">Проект</label>
                                    <div class="filter__dropdown-menu-btn">Любой</div>
                                    <div class="filter__dropdown-content">
                                        <div class="input_field all-input-field">
                                            <input type="checkbox" class="custom-checkbox checked" id="any-project-mobile">
                                            <label for="any-project-mobile">Любой</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-2-mobile">
                                            <label for="project-2-mobile">Проект 2</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-3-mobile">
                                            <label for="project-3-mobile">Проект 3</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-4-mobile">
                                            <label for="project-4-mobile">Проект 4</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-5-mobile">
                                            <label for="project-5-mobile">Проект 5</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-6-mobile">
                                            <label for="project-6-mobile">Проект 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="filter__show-all-btn btn btn-green">Все фильтры</button>


                        </div>
                        <div class="filter__col">
                            <div class="filter__el filter__hidden-elements">
                                <h4 class="filter__row-title">Комнаты</h4>
                                <div class="filter__row-el-btns-container">
                                    <button class="filter__el-btns btn-small">1к</button>
                                    <button class="filter__el-btns btn-small">2к</button>
                                    <button class="filter__el-btns btn-small">3к</button>
                                </div>
                            </div>
                            <div class="filter__el filter__hidden-elements">
                                <div class='filter__dropdown'>
                                    <label class="filter__dropdown-menu">Проект</label>
                                    <div class="filter__dropdown-menu-btn">Любой</div>
                                    <div class="filter__dropdown-content">
                                        <div class="input_field all-input-field">
                                            <input type="checkbox" class="custom-checkbox checked" id="any-project">
                                            <label for="any-project">Любой</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-2">
                                            <label for="project-2">Проект 2</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-3">
                                            <label for="project-3">Проект 3</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-4">
                                            <label for="project-4">Проект 4</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-5">
                                            <label for="project-5">Проект 5</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="project-6">
                                            <label for="project-6">Проект 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="filter__col">
                            <div class="filter__el filter__hidden-elements">
                                <div class='filter__dropdown'>
                                    <label class="filter__dropdown-menu">Сдача</label>
                                    <div class="filter__dropdown-menu-btn">Все даты</div>
                                    <div class="filter__dropdown-content">
                                        <div class="input_field all-input-field">
                                            <input type="checkbox" class="custom-checkbox checked" id="all-dates">
                                            <label for="all-dates">Все даты</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="date-2">
                                            <label for="date-2">Адрес 2</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="date-3">
                                            <label for="date-3">Адрес 3</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="date-4">
                                            <label for="date-4">Адрес 4</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="date-5">
                                            <label for="date-5">Адрес 5</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="date-6">
                                            <label for="date-6">Адрес 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter__el filter__hidden-elements">
                                <h4 class="filter__row-title">Этаж</h4>
                                <div class="filter-slider__inputs">
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">от</span>
                                        <input type="number" min="2" max="16" class="filter-slider__input" id="input-floor-min">
                                    </label>

                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">до</span>
                                        <input type="number" min="2" max="16" class="filter-slider__input" id="input-floor-max">
                                    </label>
                                </div>
                                <div class="filter__range-slider" id="floor-slider">
                                </div>
                            </div>
                        </div>
                        <div class="filter__col">
                            <div class="filter__el filter__hidden-elements">
                                <h4 class="filter__row-title">Площадь, м2</h4>
                                <div class="filter-slider__inputs">
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">от</span>
                                        <input type="number" min="40" max="120" class="filter-slider__input" id="input-square-min">
                                    </label>

                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">до</span>
                                        <input type="number" min="40" max="120" class="filter-slider__input" id="input-square-max">
                                    </label>
                                </div>
                                <div class="filter__range-slider" id="square-slider">
                                </div>
                            </div>
                            <div class="filter__el filter__hidden-elements">
                                <div class='filter__dropdown'>
                                    <label class="filter__dropdown-menu">Адрес</label>
                                    <div class="filter__dropdown-menu-btn">Любой</div>
                                    <div class="filter__dropdown-content">
                                        <div class="input_field all-input-field">
                                            <input type="checkbox" class="custom-checkbox checked" id="any-address">
                                            <label for="any-address">Любой</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="address-2">
                                            <label for="address-2">Адрес 2</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="address-3">
                                            <label for="address-3">Адрес 3</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="address-4">
                                            <label for="address-4">Адрес 4</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="address-5">
                                            <label for="address-5">Адрес 5</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="address-6">
                                            <label for="address-6">Адрес 6</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="filter__col">
                            <div class="filter__el filter__hidden-elements">
                                <h4 class="filter__row-title">Цена, руб.</h4>
                                <div class="filter-slider__inputs">
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">от</span>
                                        <input type="text" min="4000000" max="12000000" class="filter-slider__input" id="input-price-min">
                                        <span class="filter-slider__text">₽</span>
                                    </label>
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">до</span>
                                        <input type="text" min="4000000" max="12000000" class="filter-slider__input" id="input-price-max">
                                        <span class="filter-slider__text">₽</span>
                                    </label>
                                </div>
                                <div class="filter__range-slider" id="price-slider">
                                </div>
                            </div>
                            <div class="filter__el filter__hidden-elements">
                                <div class='filter__dropdown'>
                                    <label class="filter__dropdown-menu">Особенности</label>
                                    <div class="filter__dropdown-menu-btn">Все особенности</div>
                                    <div class="filter__dropdown-content">
                                        <div class="input_field all-input-field">
                                            <input type="checkbox" class="custom-checkbox checked" id="all-features">
                                            <label for="all-features">Все особенности</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="feature-keys">
                                            <label for="feature-keys">С ключами</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="feature-family">
                                            <label for="feature-family">Для семей</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="feature-windows">
                                            <label for="feature-windows">Окна на 2 стороны</label>
                                        </div>
                                        <div class="input_field">
                                            <input type="checkbox" class="custom-checkbox" id="feature-wardrobes">
                                            <label for="feature-wardrobes">С гардеробными</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="filter__el ">
                                <button class="filter__btn-apartment btn btn-green">Показать&nbsp;<span>59934</span>&nbsp;квартир</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </section>

        <section class="section">
            <div class="container">
                <h3 class="title">ОСОБЕННОСТИ ОБЪЕКТА</h3>
                <div data-tab-component>
                    <div class="tab-btns-container" role="tablist" aria-label="Tabbed content">
                        <button role="tab" aria-selected="true" aria-controls="tab3-content" id="tab3">
                            <h3 class="tab-title">Архитектура</h3>
                        </button>

                        <button role="tab" aria-selected="false" aria-controls="tab4-content" id="tab4">
                            <h3 class="tab-title">Паркинг</h3>
                        </button>

                        <button role="tab" aria-selected="false" aria-controls="tab5-content" id="tab5">
                            <h3 class="tab-title">Инфраструктура</h3>
                        </button>

                        <button role="tab" aria-selected="false" aria-controls="tab6-content" id="tab6">
                            <h3 class="tab-title">Материалы</h3>
                        </button>
                        <button role="tab" aria-selected="false" aria-controls="tab7-content" id="tab7">
                            <h3 class="tab-title">Уникальность</h3>
                        </button>
                    </div>


                    <section id="tab3-content" role="tabpanel" aria-labelledby="tab3" tabindex="0">
                        <div class="tab-company__inner">
                            <img src="/assets/img/about-company/company1.jpg" alt="company">
                            <div class="tab-company__content-wrapper">
                                <div class="tab3__content">
                                    <!--              <h3 class="tab3__inner-title">Архитектура</h3>-->
                                    <!--              <p>Lorem ipsum dolor sit amet consectetur. Euismod cursus nec vitae fames blandit.</p>-->
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="tab4-content" role="tabpanel" aria-labelledby="tab4" tabindex="0" aria-hidden="true">
                        <div class="tab4__content">
                            <h3 class="tab4__inner-title">Паркинг</h3>

                            <p>Lorem ipsum dolor sit amet consectetur. Euismod cursus nec vitae fames blandit.</p>
                        </div>
                    </section>

                    <section id="tab5-content" role="tabpanel" aria-labelledby="tab5" tabindex="0" aria-hidden="true">
                        <div class="tab5__content">
                            <h3 class="tab5__inner-title">Инфраструктура</h3>

                            <p>Lorem ipsum dolor sit amet consectetur. Euismod cursus nec vitae fames blandit.</p>
                        </div>
                    </section>

                    <section id="tab6-content" role="tabpanel" aria-labelledby="tab6" tabindex="0" aria-hidden="true">
                        <div class="tab6__content">
                            <h3 class="tab6__inner-title">Материалы</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Euismod cursus nec vitae fames blandit.</p>
                        </div>
                    </section>

                    <section id="tab7-content" role="tabpanel" aria-labelledby="tab7" tabindex="0" aria-hidden="true">
                        <div class="tab7__content">
                            <h3 class="tab7__inner-title">Уникальность</h3>

                            <p>Lorem ipsum dolor sit amet consectetur. Euismod cursus nec vitae fames blandit.</p>
                        </div>
                    </section>
                </div>
            </div>
        </section>

        <section class="construction-feature section">
            <div class="container">
                <h3 class="title">УНИКАЛЬНОСТЬ СТРОИТЕЛЬСТВА</h3>
                <div class="construction-feature__wrap">
                    <div class="construction-feature__col">
                        <div class="construction-feature__col-item">
                            <p class="construction-feature__item-title">Умные счетчики</p>
                            <p class="construction-feature__item-text">Lorem ipsum dolor sit amet consectetur. Euismod cursus nec
                                vitae
                                fames blandit.</p>
                        </div>
                        <div class="construction-feature__col-item">
                            <p class="construction-feature__item-title">Умные счетчики</p>
                            <p class="construction-feature__item-text">Lorem ipsum dolor sit amet consectetur. Euismod cursus nec
                                vitae
                                fames blandit.</p>
                        </div>
                    </div>
                    <div class="construction-feature__col">
                        <img src="/assets/img/complex-single/room.png" alt="Room layout" class="construction-feature__img">
                    </div>
                    <div class="construction-feature__col">
                        <div class="construction-feature__col-item">
                            <p class="construction-feature__item-title">Умные счетчики</p>
                            <p class="construction-feature__item-text">Lorem ipsum dolor sit amet consectetur. Euismod cursus nec
                                vitae
                                fames blandit.</p>
                        </div>
                        <div class="construction-feature__col-item">
                            <p class="construction-feature__item-title">Умные счетчики</p>
                            <p class="construction-feature__item-text">Lorem ipsum dolor sit amet consectetur. Euismod cursus nec
                                vitae
                                fames blandit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <h3 class="title">Отделка квартир</h3>
            <div data-tab-component>
                <div class="tab-btns-container" role="tablist" aria-label="Tabbed content">
                    <button role="tab" aria-selected="true" aria-controls="tab8-content" id="tab8">
                        <h3 class="tab-title">Прихожая</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab9-content" id="tab9">
                        <h3 class="tab-title">Кухня</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab10-content" id="tab10">
                        <h3 class="tab-title">Спальня</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab11-content" id="tab11">
                        <h3 class="tab-title">Санузел</h3>
                    </button>
                    <button role="tab" aria-selected="false" aria-controls="tab12-content" id="tab12">
                        <h3 class="tab-title">Балкон</h3>
                    </button>
                </div>

                <section id="tab8-content" role="tabpanel" aria-labelledby="tab8" tabindex="0">

                    <div class="tab8__inner">
                        <!--          <img src="/assets/img/about-company/company1.jpg" alt="company">-->
                        <div class="tab8__content-wrapper">
                            <div class="tab8__content">
                                <!--              <h3 class="tab8__inner-title">Прихожая</h3>-->
                                <img src="/assets/img/complex-single/prihozhaya.jpg" alt="company">
                            </div>
                        </div>
                    </div>
                </section>


                <section id="tab9-content" role="tabpanel" aria-labelledby="tab9" tabindex="0" aria-hidden="true">
                    <div class="tab9__content">
                        <!--          <h3 class="tab9__inner-title">Кухня</h3>-->

                        <img src="/assets/img/complex-single/kuhnya.jpg" alt="company">
                    </div>
                </section>

                <section id="tab10-content" role="tabpanel" aria-labelledby="tab10" tabindex="0" aria-hidden="true">
                    <div class="tab10__content">
                        <!--          <h3 class="tab10__inner-title">Спальня</h3>-->
                        <img src="/assets/img/complex-single/gostin.jpg" alt="company">
                    </div>
                </section>

                <section id="tab11-content" role="tabpanel" aria-labelledby="tab11" tabindex="0" aria-hidden="true">
                    <div class="tab11__content">
                        <!--          <h3 class="tab11__inner-title">Санузел</h3>-->
                        <img src="/assets/img/complex-single/vannaya.jpg" alt="company">
                    </div>
                </section>
                <section id="tab12-content" role="tabpanel" aria-labelledby="tab12" tabindex="0" aria-hidden="true">
                    <div class="tab12__content">
                        <!--          <h3 class="tab12__inner-title">Балкон</h3>-->

                        <img src="/assets/img/complex-single/balkon.jpg" alt="company">
                    </div>
                </section>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="apartment-form__wrap">
                    <div class="apartment-form__content">
                        <h3>Получите персональную подборку планировок</h3>
                        <form class="apartment-form">
                            <input type="text" id="name" placeholder="Имя" required>
                            <input type="tel" id="phone" placeholder="+7 999 999 99 99" required>
                            <button class="btn btn-green" type="submit">Отправить</button>
                        </form>
                    </div>
                    <div class="apartment-form__image"></div>
                </div>
            </div>
        </div>
        <section class="complex-this section">
            <div class="container">
                <div class="title">В ЭТОМ ЖК</div>
                <div class="complex-this__wrap">
                    <div class="complex-this__item">
                        <div class="complex-this__item-content">
                            <h3 class="complex-this__item-title">Машиноместа
                                ЖК Спутник</h3>
                            <span>&#10230;</span>
                        </div>
                        <img class="complex-this__item-img" src="/assets/img/complex-single/complex-car.png" alt="">
                        <a class="complex-this__item-link" href="parking.html"></a>
                    </div>
                    <div class="complex-this__item">
                        <div class="complex-this__item-content">
                            <h3 class="complex-this__item-title">Нежилые помещения</h3>
                            <span>&#10230;</span>
                        </div>
                        <img class="complex-this__item-img" src="/assets/img/complex-single/complex-teh.png" alt="">
                        <a class="complex-this__item-link" href="commerce-catalog.html"></a>
                    </div>
                    <div class="complex-this__item">
                        <div class="complex-this__item-content">
                            <h3 class="complex-this__item-title">Кладовые</h3>
                            <span>&#10230;</span>
                        </div>
                        <img class="complex-this__item-img" src="/assets/img/complex-single/complex-by.png" alt="">
                        <a class="complex-this__item-link" href="#!"></a>
                    </div>
                </div>
            </div>
        </section>
    @include('partials.forms.questions')
@endsection