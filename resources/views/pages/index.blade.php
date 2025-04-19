@php use App\Helpers\Price; @endphp
@extends('layouts.main')
@section('title', 'КИТ')
@section('content')
    <section class="filter section">
        <div class="container">
            <h4 class="title">Поиск квартиры</h4>
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
    <section class="section complexes">
        <div class="container">
            <div class="complexes__title title">ЖИЛЫЕ КОМПЛЕКСЫ</div>
            <div class="cards-wrapper-col3">
                @foreach($jks as $item)
                    <article class="card-complex-main">
                        <div class="card-complex-main__picture">
                            <div class="card-complex-main__status">Ипотека от 0%</div>
                            <div class="card-complex-main__details">Подробнее о ЖК</div>


                            <img src="{{$item->preview_img}}" alt="card-img">
                        </div>
                        <div class="card-complex-main__desc">
                            <div class="card-complex-main__desc-row">

                                <div class="card-complex-main__sub-title">Жилой комплекс</div>
                                <div class="card-complex-main__title">{{$item->title}}</div>
                                <div class="card-complex-main__address">
                                    <img src="/assets/img/icons/geoPoint.svg" alt="">{{$item->address}}</div>
                            </div>
                            <div class="card-complex-main__row">
                                <div class="card-complex-main__price-container">
                                    <span class="card-complex-main__price card-price"> <span>от</span> {{Price::getBaseFormat($item->price)}} <span>₽</span> </span>
                                </div>
                                <!-- <div class="card-btn-box">
                                  <a href="complex.html" class="card__btn btn btn-green">
                                    Выбрать
                                  </a>
                                </div> -->
                            </div>
                        </div>
                        <a href="{{route('jk_detail', ['id' => $item->id])}}" class="card-complex-main__link"></a>
                    </article>
                @endforeach
            </div>
            <div class="complexes__btn-container">
                <a href="{{route('jk_list')}}" class="btn btn-transparent">Все комплексы</a>
            </div>
        </div>
    </section>
    <section class="section section-about">
        <div class="container">
            <div class="title about-title">О КОМПАНИИ</div>
            <div data-tab-component>
                <div class="tab-btns-container" role="tablist" aria-label="Tabbed content">
                    <button class="about-company-tab__btn" role="tab"
                            aria-selected="true"
                            aria-controls="tab3-content"
                            id="tab3">
                        <h3 class="tab-title about-company__btn-title">Большой <br> опыт</h3>
                    </button>

                    <button role="tab"
                            aria-selected="false"
                            aria-controls="tab4-content"
                            id="tab4">
                        <h3 class="tab-title about-company__btn-title">Сервисное <br> обслуживание</h3>
                    </button>

                    <button role="tab"
                            aria-selected="false"
                            aria-controls="tab5-content"
                            id="tab5">
                        <h3 class="tab-title about-company__btn-title">Удобство и <br> комфорт</h3>
                    </button>

                    <button role="tab"
                            aria-selected="false"
                            aria-controls="tab6-content"
                            id="tab6">
                        <h3 class="tab-title about-company__btn-title">Высокий <br> рейтинг</h3>
                    </button>
                    <button role="tab"
                            aria-selected="false"
                            aria-controls="tab7-content"
                            id="tab7">
                        <h3 class="tab-title about-company__btn-title">Автоклавное <br> производство</h3>
                    </button>
                </div>

                <section class="about-company__tabpanel" id="tab3-content"
                         role="tabpanel"
                         aria-labelledby="tab3"
                         tabindex="0">

                    <div class="tab-about__inner">
                        <img src="/assets/img/about-company/experience.jpg" alt="experience">
                        <div class="tab-about__content-wrapper">
                            <div class="tab-about__content">
                                <h3 class="tab-about__inner-title">Большой опыт</h3>
                                <p>ООО предприятие «ИП К.И.Т.» уже 33 года осуществляет продажу квартир в Воронеже в комфортном квартале.
                                </p>
                                <p>За это время сотрудникам удалось приобрести ценный опыт, повысить свою квалификацию и освоить все
                                    сложные моменты строительных работ в новостройках.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about-company__tabpanel" id="tab4-content"
                         role="tabpanel"
                         aria-labelledby="tab4"
                         tabindex="0"
                         aria-hidden="true">

                    <div class="tab-about__inner">
                        <img src="/assets/img/about-company/service.jpg" alt="service">
                        <div class="tab-about__content-wrapper">
                            <div class="tab-about__content">
                                <h3 class="tab-about__inner-title">Сервисное обслуживание</h3>

                                <p>Каждый построенный дом это детище, в которое вложено старание и любовь, а своих "детей" мы не бросаем.
                                    Именно для заботы специально была создана фирма «К.И.Т.-сервис».

                                    Наличие штата сантехников, плотников, слесарей и других специальностей позволяет максимально быстро
                                    устранять неполадки, обеспечивая благоприятные условия людям, которые доверились нашей организации.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-company__tabpanel" id="tab5-content"
                         role="tabpanel"
                         aria-labelledby="tab5"
                         tabindex="0"
                         aria-hidden="true">

                    <div class="tab-about__inner">
                        <img src="/assets/img/about-company/comfort.jpg" alt="comfort">
                        <div class="tab-about__content-wrapper">
                            <div class="tab-about__content">
                                <h3 class="tab-about__inner-title">Удобство и комфорт</h3>

                                <p>Следующим пунктом в перечне наших преимуществ является качественная работа строителей. Если вы задались
                                    целью купить квартиру в Воронеже, то вам не придётся беспокоиться о будущем ремонте и отделке.

                                    ООО предприятие «ИП К.И.Т.» предоставляет новостройки, в которых стоит качественная сантехника, поклеены
                                    хорошие обои, застеклена лоджия и установлены металлические двери.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-company__tabpanel" id="tab6-content"
                         role="tabpanel"
                         aria-labelledby="tab6"
                         tabindex="0"
                         aria-hidden="true">

                    <div class="tab-about__inner">
                        <img src="/assets/img/about-company/rating.jpg" alt="rating">
                        <div class="tab-about__content-wrapper">
                            <div class="tab-about__content">
                                <h3 class="tab-about__inner-title">Высокий рейтинг</h3>

                                <p>Одной из главных составляющих успеха являются тысячи положительных отзывов. Жители наших новостроек не
                                    перестают выражать благодарность за «дом, в котором не страшно жить».

                                    Мы ориентируемся не на количество, а на качество, именно поэтому наши квартиры – это надёжная
                                    крепость.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="about-company__tabpanel" id="tab7-content"
                         role="tabpanel"
                         aria-labelledby="tab7"
                         tabindex="0"
                         aria-hidden="true">
                    <div class="tab-about__inner">
                        <img src="/assets/img/about-company/avtoklavnoe.jpg" alt="avtoklavnoe">
                        <div class="tab-about__content-wrapper">
                            <div class="tab-about__content">
                                <h3 class="tab-about__inner-title">Автоклавное производство</h3>

                                <p>Особая технология производства автоклавных
                                    газобетонных блоков позволяет сочетать свойства натурального камня и дерева, делая его уникальным среди
                                    других. Такой стройматериал способен «дышать», что очень важно для создания в доме необходимых
                                    комфортных
                                    температурных условий для проживания.

                                    Вдобавок, за счет наличия многочисленных пор, обеспечивается высокая теплоизоляция.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="about-company__btn-container">
                <a href="{{route('about_company')}}" class="btn btn-transparent">Подробнее о компании</a>
            </div>
        </div>
    </section>
    <section class="section promotions">
        <div class="container">
            <div class="title title-promotions">АКЦИИ</div>
            <div class="cards-wrapper-col3--one">
                @foreach($sales as $item)
                    <article class="card-promotion">
                        <img src="{{$item->attachment()->first()->url()}}" alt="Building">
                        <div class="card-promotion__status">До {{(new DateTime($item->sale_end))->format('d.m.Y')}}г.</div>
                        <div class="card-promotion__txt-bottom ">{{$item->title}}
                            <span>&#10230;</span></div>
                        <a href="{{route('sales_detail', ['id' => $item->id])}}" class="card-promotion__link">
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="section-promotions__btn-container">
                <a href="{{route('sales_list')}}" class="btn btn-transparent">Все акции</a>
            </div>
        </div>
    </section>
    <section class="section mortgage-calculator">
        <div class="container">
            <h3 class="title">Ипотечный калькулятор</h3>
            <h4 class="mortgage-calculator__sub-title">Выберите подходящие условия ипотеки, введите параметры и получите
                предварительный расчет:
            </h4>
            <div class="mortgage-calculator__content">
                <div class="mortgage-calculator__type-selector">
                    <div class="mortgage-calculator__type-item mortgage-calculator__type-item--active" data-type="standard"
                         data-rate="19.8">
                        <span class="mortgage-calculator__type-name">Стандартная</span>
                        <span class="mortgage-calculator__type-rate">19.8%</span>
                    </div>
                    <div class="mortgage-calculator__type-item" data-type="family" data-rate="6.0">
                        <span class="mortgage-calculator__type-name">Семейная</span>
                        <span class="mortgage-calculator__type-rate">6.0%</span>
                    </div>
                    <div class="mortgage-calculator__type-item" data-type="it" data-rate="5.0">
                        <span class="mortgage-calculator__type-name">IT-ипотека</span>
                        <span class="mortgage-calculator__type-rate">5.0%</span>
                    </div>
                </div>
                <div class="mortgage-calculator__row">
                    <div class="mortgage-calculator__col">
                        <div class="mortgage-calculator__el">
                            <h4 class="mortgage-calculator__row-title">Стоимость квартиры</h4>
                            <div class="mortgage-calculator__inputs">
                                <input type="text" class="mortgage-calculator__input" id="input-apartment-price">
                                <span class="mortgage-calculator__text">₽</span>
                            </div>
                            <div class="mortgage-calculator__range-slider" id="apartment-price-slider"></div>
                        </div>
                    </div>
                    <div class="mortgage-calculator__col">
                        <div class="mortgage-calculator__el">
                            <h4 class="mortgage-calculator__row-title">Первоначальный взнос</h4>
                            <div class="mortgage-calculator__inputs">
                                <input type="text" class="mortgage-calculator__input" id="input-down-payment">
                                <span class="mortgage-calculator__text">₽</span>
                            </div>
                            <div class="mortgage-calculator__range-slider" id="down-payment-slider"></div>
                        </div>
                    </div>
                    <div class="mortgage-calculator__col">
                        <div class="mortgage-calculator__el">
                            <h4 class="mortgage-calculator__row-title">Срок кредита</h4>
                            <div class="mortgage-calculator__inputs">
                                <input type="text" class="mortgage-calculator__input" id="input-loan-term">
                                <span class="mortgage-calculator__text">лет</span>
                            </div>
                            <div class="mortgage-calculator__range-slider" id="loan-term-slider"></div>
                        </div>
                    </div>
                </div>
                <div class="mortgage-calculator__results">
                    <div class="mortgage-calculator__result-item">
                        <div class="mortgage-calculator__result-label">Ежемесячный платеж</div>
                        <div class="mortgage-calculator__result-value" id="monthly-payment">0 ₽</div>
                    </div>
                    <div class="mortgage-calculator__result-item">
                        <div class="mortgage-calculator__result-label">Процентная ставка</div>
                        <div class="mortgage-calculator__result-value" id="interest-rate">19.8%</div>
                    </div>
                    <div class="mortgage-calculator__result-item">
                        <div class="mortgage-calculator__result-label">Сумма кредита</div>
                        <div class="mortgage-calculator__result-value" id="loan-amount">0 ₽</div>
                    </div>
                    <div class="mortgage-calculator__result-item">
                        <div class="mortgage-calculator__result-label">Переплата по кредиту</div>
                        <div class="mortgage-calculator__result-value" id="overpayment">0 ₽</div>
                    </div>
                    <div class="mortgage-calculator__result-item">
                        <div class="mortgage-calculator__result-label">Общая сумма выплат</div>
                        <div class="mortgage-calculator__result-value" id="total-payment">0 ₽</div>
                    </div>
                </div>
                <div class="mortgage-calculator__consultation">
                    <button class="mortgage-calculator__consultation-btn btn btn-transparent"
                            data-modal="mortgage-consultation-modal">Получить консультацию</button>
                </div>
                <!-- Добавляем блок с банками-партнерами -->
                <div class="mortgage-calculator__banks">
                    <h4 class="mortgage-calculator__row-title">Банки-партнеры</h4>
                    <div class="mortgage-calculator__banks-container">
                        <div class="mortgage-calculator__bank-card">
                            <div class="mortgage-calculator__bank-logo">
                                <img src="/assets/img/banks/uralsib.png" alt="Уралсиб">
                            </div>
                            <div class="mortgage-calculator__bank-name">Уралсиб</div>
                            <!-- <div class="mortgage-calculator__bank-rate">от 8,9%</div> -->
                        </div>
                        <div class="mortgage-calculator__bank-card">
                            <div class="mortgage-calculator__bank-logo">
                                <img src="/assets/img/banks/sber.png" alt="Сбербанк">
                            </div>
                            <div class="mortgage-calculator__bank-name">Сбербанк</div>
                            <!-- <div class="mortgage-calculator__bank-rate">от 9,4%</div> -->
                        </div>
                        <div class="mortgage-calculator__bank-card">
                            <div class="mortgage-calculator__bank-logo">
                                <img src="/assets/img/banks/metall.png" alt="Металинвест Банк">
                            </div>
                            <div class="mortgage-calculator__bank-name">Металинвест Банк</div>
                            <!-- <div class="mortgage-calculator__bank-rate">от 8,7%</div> -->
                        </div>
                        <div class="mortgage-calculator__bank-card">
                            <div class="mortgage-calculator__bank-logo">
                                <img src="/assets/img/banks/vtb.png" alt="ВТБ">
                            </div>
                            <div class="mortgage-calculator__bank-name">ВТБ</div>
                            <!-- <div class="mortgage-calculator__bank-rate">от 9,2%</div> -->
                        </div>
                        <div class="mortgage-calculator__bank-card">
                            <div class="mortgage-calculator__bank-logo">
                                <img src="/assets/img/banks/alfa.png" alt="Альфа Банк">
                            </div>
                            <div class="mortgage-calculator__bank-name">Альфа Банк</div>
                            <!-- <div class="mortgage-calculator__bank-rate">от 8,5%</div> -->
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <section class="section">
        <div class="container banner-rent__container">
            <div class="banner-rent banner-main">
                <img src="/assets/img/rent/banner-rent.jpg" alt="banner-rent">
                <!--      <source media="(max-width: 768px)" srcset="/assets/img/rent/banner-rent1.jpg">-->
                <div class="banner-rent__content-wrapper">
                    <div class="banner-rent__content">
                        <h3 class="banner-rent__title">Аренда коммерческих помещений
                            в ЖК Спутник!</h3>
                        <p>ул. Академика Конопатова, д.19
                        </p>
                        <a class="btn btn-green banner-rent__btn" href="#!">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-news section">
        <div class="container">
            <div class="title news-title">НОВОСТИ</div>
            <div class="cards-wrapper-col3--one">
                @foreach($news as $item)
                    <article class="card-news">
                        <div class="card-news__picture">
                            <img src="{{$item->attachment()->first()->url()}}" alt="card-img">
                            <date class="card-news__date">{{$item->created_at->format('d.m.Y')}}</date>
                        </div>
                        <div class="card-news__desc">
                            <div class="card-news__desc-row">
                                <div class="card-news__title">{{$item->title}}</div>
                                <div class="card-news__sub-title">{{strip_tags(Str::limit($item->description, 45))}}</div>
                            </div>
                        </div>
                        <a href="{{route('news_detail', ['id' => $item->id])}}" class="card-news__link">
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="section-news__btn-container">
                <a href="{{route('news_list')}}" class="btn btn-transparent">Все новости</a>
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection