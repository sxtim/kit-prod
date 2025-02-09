@extends('layouts.main')
@section('title', 'КИТ')
@section('content')
    <section class="section">
        <section class="filter">
            <div class="container">
                <div data-tab-component>
                    <div class="filter__tab-btn-container" role="tablist" aria-label="Tabbed content">
                        <button class="filter__tab-btn" role="tab"
                                aria-selected="true"
                                aria-controls="tab1-content"
                                id="tab1">
                            <h3 class="tab-title">Подобрать квартиру</h3>
                        </button>

                        <button class="filter__tab-btn" role="tab"
                                aria-selected="false"
                                aria-controls="tab2-content"
                                id="tab2">
                            <h3 class="tab-title">Коммерческую недвижимость</h3>
                        </button>

                    </div>

                    <section class="filter__tab-content" id="tab1-content"
                             role="tabpanel"
                             aria-labelledby="tab1"
                             tabindex="0">

                        <div class="filter__tab-row">
                            <div class="filter__el">
                                <h4 class="filter__row-title">Комнатность</h4>
                                <div class="filter__row-el-btns-container">
                                    <button class="filter__el-btns btn-small">1к</button>
                                    <button class="filter__el-btns btn-small">2к</button>
                                    <button class="filter__el-btns btn-small">3к</button>
                                </div>

                            </div>
                            <div class="filter__el">
                                <h4 class="filter__row-title">Цена, руб.</h4>
                                <div class="filter-slider__inputs">
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">От</span>
                                        <input type="number" min="4000000" max="12000000" class="filter-slider__input"
                                               id="input-price-min">
                                    </label>

                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">До</span>
                                        <input type="number" min="4000000" max="12000000" class="filter-slider__input"
                                               id="input-price-max">
                                    </label>
                                </div>
                                <div class="filter__range-slider" id="price-slider">
                                </div>
                            </div>
                            <div class="filter__el">
                                <h4 class="filter__row-title">Площадь, м2</h4>
                                <div class="filter-slider__inputs">
                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">От</span>
                                        <input type="number" min="40" max="120" class="filter-slider__input"
                                               id="input-square-min">
                                    </label>

                                    <label class="filter-slider__label">
                                        <span class="filter-slider__text">До</span>
                                        <input type="number" min="40" max="120" class="filter-slider__input"
                                               id="input-square-max">
                                    </label>
                                </div>
                                <div class="filter__range-slider" id="square-slider">
                                </div>
                            </div>
                            <div class="filter__el filter__btn-container">
                                <button class="filter__btn btn btn-green">Показать</button>
                            </div>
                        </div>
                    </section>

                    <section class="filter__tab-content" id="tab2-content"
                             role="tabpanel"
                             aria-labelledby="tab2"
                             tabindex="0"
                             aria-hidden="true">

                        <div class="filter__tab-row">

                        </div>
                        <!--        <p>Quisque id augue sagittis, ullamcorper arcu a, commodo est. Sed dictum fringilla augue sit amet condimentum.-->
                        <!--          Donec sagittis tincidunt mattis. Aliquam eget tellus placerat, luctus odio sit amet, scelerisque ligula.-->
                        <!--          Nullam-->
                        <!--          in magna at erat porttitor lacinia. Donec placerat lacus vitae arcu efficitur sollicitudin. Nunc laoreet ex-->
                        <!--          tempus, fringilla nisl sit amet, varius odio. Nunc vel orci ut neque ullamcorper facilisis.</p>-->
                    </section>

                </div>
            </div>
        </section>
    </section>
    <section class="section complexes">
        <div class="container">
            <div class="complexes__title title">ЖИЛЫЕ КОМПЛЕКСЫ</div>
            <div class="cards-wrapper-col3">
                <article class="card-box">
                    <div class="card-picture">

                        <!--      <div class="card-zhk-main__status">@@status</div>-->
                        <div class="card-complex-main__status">Ипотека от 0%</div>


                        <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="card-img">
                    </div>
                    <div class="card-complex-main__desc">
                        <div class="card-complex-main__desc-row">
                            <!--      <div class="card__title">@@title</div>-->
                            <div class="card-complex-main__title">ЖК Спутник</div>
                            <div class="card-complex-main__sub-title">ул. Летчика Филипова д.6</div>

                        </div>
                        <div class="card-row-2">
                            <div class="card-price-container">
                                <!--        <span class="card-complex-main__price">@@price</span>-->
                                <span class="card-price"> <span>от</span>  6 <span>млн.</span> </span>

                            </div>
                            <div class="card-btn-box">
                                <a href="complex.html" class="card__btn btn btn-green">
                                    Выбрать
                                </a>
                            </div>
                        </div>
                    </div>
                </article>


                <article class="card-box">
                    <div class="card-picture">

                        <!--      <div class="card-zhk-main__status">@@status</div>-->
                        <div class="card-complex-main__status">Ипотека от 0%</div>


                        <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="card-img">
                    </div>
                    <div class="card-complex-main__desc">
                        <div class="card-complex-main__desc-row">
                            <!--      <div class="card__title">@@title</div>-->
                            <div class="card-complex-main__title">ЖК Спутник</div>
                            <div class="card-complex-main__sub-title">ул. Летчика Филипова д.6</div>

                        </div>
                        <div class="card-row-2">
                            <div class="card-price-container">
                                <!--        <span class="card-complex-main__price">@@price</span>-->
                                <span class="card-price"> <span>от</span>  6 <span>млн.</span> </span>

                            </div>
                            <div class="card-btn-box">
                                <a href="complex.html" class="card__btn btn btn-green">
                                    Выбрать
                                </a>
                            </div>
                        </div>
                    </div>
                </article>


                <article class="card-box">
                    <div class="card-picture">

                        <!--      <div class="card-zhk-main__status">@@status</div>-->
                        <div class="card-complex-main__status">Ипотека от 0%</div>


                        <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="card-img">
                    </div>
                    <div class="card-complex-main__desc">
                        <div class="card-complex-main__desc-row">
                            <!--      <div class="card__title">@@title</div>-->
                            <div class="card-complex-main__title">ЖК Спутник</div>
                            <div class="card-complex-main__sub-title">ул. Летчика Филипова д.6</div>

                        </div>
                        <div class="card-row-2">
                            <div class="card-price-container">
                                <!--        <span class="card-complex-main__price">@@price</span>-->
                                <span class="card-price"> <span>от</span>  6 <span>млн.</span> </span>

                            </div>
                            <div class="card-btn-box">
                                <a href="complex.html" class="card__btn btn btn-green">
                                    Выбрать
                                </a>
                            </div>
                        </div>
                    </div>
                </article>


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
        </div>
    </section>
    <section class="section promotions">
        <div class="container">
            <div class="title title-promotions">АКЦИИ</div>
            <div class="promotions__cards-wrapper">
                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="!#" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="!#" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="!#" class="card-promotion__link">
                    </a>
                </article>

            </div>
        </div>
    </section>
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
    <section class="section-news section">
        <div class="container">
            <div class="title news-title">НОВОСТИ</div>
            <div class="cards-wrapper-col3">
                <article class="card-news">
                    <div class="card-news__picture">
                        <img src="/assets/img/news/news1.jpg" alt="card-img">
                    </div>
                    <div class="card-news__desc">
                        <div class="card-news__desc-row">
                            <div class="card-news__title">Как получить региональный материнский капитал</div>
                            <div class="card-news__sub-title">В последние годы в России стабильно растет внимание к вопросам</div>
                            <date class="card-news__date">10.05.2024</date>
                        </div>
                    </div>
                    <a href="news-promo-detail.html" class="card-news__link">
                    </a>
                </article>

                <article class="card-news">
                    <div class="card-news__picture">
                        <img src="/assets/img/news/news1.jpg" alt="card-img">
                    </div>
                    <div class="card-news__desc">
                        <div class="card-news__desc-row">
                            <div class="card-news__title">Как получить региональный материнский капитал</div>
                            <div class="card-news__sub-title">В последние годы в России стабильно растет внимание к вопросам</div>
                            <date class="card-news__date">10.05.2024</date>
                        </div>
                    </div>
                    <a href="news-promo-detail.html" class="card-news__link">
                    </a>
                </article>

                <article class="card-news">
                    <div class="card-news__picture">
                        <img src="/assets/img/news/news1.jpg" alt="card-img">
                    </div>
                    <div class="card-news__desc">
                        <div class="card-news__desc-row">
                            <div class="card-news__title">Как получить региональный материнский капитал</div>
                            <div class="card-news__sub-title">В последние годы в России стабильно растет внимание к вопросам</div>
                            <date class="card-news__date">10.05.2024</date>
                        </div>
                    </div>
                    <a href="news-promo-detail.html" class="card-news__link">
                    </a>
                </article>

                <article class="card-news">
                    <div class="card-news__picture">
                        <img src="/assets/img/news/news1.jpg" alt="card-img">
                    </div>
                    <div class="card-news__desc">
                        <div class="card-news__desc-row">
                            <div class="card-news__title">Как получить региональный материнский капитал</div>
                            <div class="card-news__sub-title">В последние годы в России стабильно растет внимание к вопросам</div>
                            <date class="card-news__date">10.05.2024</date>
                        </div>
                    </div>
                    <a href="news-promo-detail.html" class="card-news__link">
                    </a>
                </article>

                <article class="card-news">
                    <div class="card-news__picture">
                        <img src="/assets/img/news/news1.jpg" alt="card-img">
                    </div>
                    <div class="card-news__desc">
                        <div class="card-news__desc-row">
                            <div class="card-news__title">Как получить региональный материнский капитал</div>
                            <div class="card-news__sub-title">В последние годы в России стабильно растет внимание к вопросам</div>
                            <date class="card-news__date">10.05.2024</date>
                        </div>
                    </div>
                    <a href="news-promo-detail.html" class="card-news__link">
                    </a>
                </article>

            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection