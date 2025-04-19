@php use App\Helpers\Price; @endphp
@extends('layouts.main')
@section('title', 'Выбрать квартиру')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">Выбрать квартиру</h1>
    </div>
    <section class="filter-apartments-cat">
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
    <section class="catalog-section section">
        <div class="container">

            <div class="catalog-sort">
                <div class="catalog-sort__dropdown filter__dropdown">
                    <label class="filter__dropdown-menu">Сортировать</label>
                    <div class="filter__dropdown-menu-btn">Сначала дешевле</div>
                    <div class="filter__dropdown-content">
                        <div class="input_field sort-item selected" data-sort="price-asc">
                            <input type="radio" name="sort" id="sort-price-asc" checked>
                            <label for="sort-price-asc">Сначала дешевле</label>
                        </div>
                        <div class="input_field sort-item" data-sort="price-desc">
                            <input type="radio" name="sort" id="sort-price-desc">
                            <label for="sort-price-desc">Сначала дороже</label>
                        </div>
                        <div class="input_field sort-item" data-sort="date-desc">
                            <input type="radio" name="sort" id="sort-date-desc">
                            <label for="sort-date-desc">Срок сдачи (позже)</label>
                        </div>
                        <div class="input_field sort-item" data-sort="date-asc">
                            <input type="radio" name="sort" id="sort-date-asc">
                            <label for="sort-date-asc">Срок сдачи (раньше)</label>
                        </div>
                        <div class="input_field sort-item" data-sort="area-desc">
                            <input type="radio" name="sort" id="sort-area-desc">
                            <label for="sort-area-desc">Площадь (больше)</label>
                        </div>
                        <div class="input_field sort-item" data-sort="area-asc">
                            <input type="radio" name="sort" id="sort-area-asc">
                            <label for="sort-area-asc">Площадь (меньше)</label>
                        </div>
                        <div class="input_field sort-item" data-sort="floor-desc">
                            <input type="radio" name="sort" id="sort-floor-desc">
                            <label for="sort-floor-desc">Этаж (выше)</label>
                        </div>
                        <div class="input_field sort-item" data-sort="floor-asc">
                            <input type="radio" name="sort" id="sort-floor-asc">
                            <label for="sort-floor-asc">Этаж (ниже)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cards-wrapper-col4">
                @foreach($items as $item)
                    <article class="card-apartment">
                        <div class="card-apartment_header">
                            <div class="card-apartment__info">
                                <div>
                                    <p><span>{{$item->rooms}}-комнатная</span></p>

                                    <p>Кв. № <span>{{$item->number}}</span> &nbsp; &nbsp;<span>{{$item->square}} м²</span></p>
                                </div>
                                <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="card-apartment__delivery">
                                <p>Сдача <span>2 кв. 2024г.</span></p>
                                <p>Этаж <span>{{$item->floor}} из 25</span></p>
                            </div>
                        </div>
                        <div class="card-apartment__body">
                            <img src="{{$item->layout_img}}" alt="Floor Plan" />
                            <div class="card-apartment__details"></div>
                        </div>
                        <div class="card-apartment__footer">
                            <div class="card-apartment__address">
                                <span>ЖК СПУТНИК</span><br />
                                {{$item->address}}
                            </div>
                            <div class="card-apartment__price-wrap">
                                <div class="card-apartment__price">{{Price::getBaseFormat($item->base_price)}} ₽</div>
                                @if($item->sale_price)
                                    <div class="card-apartment__price-disc">{{Price::getBaseFormat($item->sale_price)}} ₽</div>
                                @endif
                                <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                            </div>
                        </div>
                        <a class="card-apartment__link" href="{{route('house_detail', ['id' => $item->id])}}"></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection