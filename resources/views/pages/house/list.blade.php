@use(App\Helpers\Price)
@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Выбрать квартиру')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">Выбрать квартиру</h1>
    </div>
    <section class="filter-apartments-cat">
        @include('partials.filter')
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
                                <p>Сдача <span>{{$item->time}}</span></p>
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
                                @if($item->sale_price)
                                    <div class="card-apartment__price">{{Price::getBaseFormat($item->sale_price)}} ₽</div>
                                    <div class="card-apartment__price-disc">{{Price::getBaseFormat($item->base_price)}} ₽</div>
                                @else
                                    <div class="card-apartment__price">{{Price::getBaseFormat($item->base_price)}} ₽</div>
                                @endif
                                <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                            </div>
                        </div>
                        <a class="card-apartment__link" href="{{route('house_detail', ['house' => $item])}}"></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection