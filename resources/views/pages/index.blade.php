@php use App\Helpers\Price; @endphp
@extends('layouts.main')
@section('title', 'КИТ')
@section('content')
    <section class="filter section">
        <div class="container">
            <h4 class="title">Поиск квартиры</h4>
        </div>
        @include('partials.filter')
    </section>
    <section class="section complexes">
        <div class="container">
            <div class="complexes__title title">ЖИЛЫЕ КОМПЛЕКСЫ</div>
            <div class="cards-wrapper-col3">
                @foreach($jks as $item)
                    <article class="card-complex-main">
                        <div class="card-complex-main__picture">
                            @isset($item->preview_label)
                                <div class="card-complex-main__status">{{$item->preview_label}}</div>
                            @endisset
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
                        <a href="{{route('sales_detail', $item)}}" class="card-promotion__link">
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="section-promotions__btn-container">
                <a href="{{route('sales_list')}}" class="btn btn-transparent">Все акции</a>
            </div>
        </div>
    </section>
    @include('partials.mortgage')
    <section class="section">
        <div class="container banner-rent__container">
            <div class="banner-rent banner-main">
                <img src="/assets/img/rent/banner-rent.jpg" alt="banner-rent">
                <!--      <source media="(max-width: 768px)" srcset="/assets/img/rent/banner-rent1.jpg">-->
                <div class="banner-rent__content-wrapper">
                    <div class="banner-rent__content">
                        <h3 class="banner-rent__title">Аренда коммерческих помещений
                            в ЖК Спутник!</h3>
                        <p>На первых этажах домов
                        </p>
                        <a class="btn btn-green banner-rent__btn" href="{{route('commerce_list')}}">Подробнее</a>
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
                            <date class="card-news__date">{{(new DateTime($item->date))->format('d.m.Y')}}</date>
                        </div>
                        <div class="card-news__desc">
                            <div class="card-news__desc-row">
                                <div class="card-news__title">{{$item->title}}</div>
                                <div class="card-news__sub-title">{{Str::limit(strip_tags($item->description), 65)}}</div>
                            </div>
                        </div>
                        <a href="{{route('news_detail', $item)}}" class="card-news__link">
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