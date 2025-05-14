@use(App\Helpers\Price)
@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Выбрать квартиру')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">Выбрать коммерческое помещение</h1>
    </div>
    @include('partials.filter.commerce')
    <section class="catalog-section section">
        <div class="container">
            <div class="cards-wrapper-col3">
                @foreach($items as $item)
                    <article class="card-commerce card-box">
                        <div class="card-commerce__picture">
                            <!--      <div class="card-zhk-main__status">@@status</div>-->
                            @if($item->type)
                                <div class="card-commerce__details">{{implode('/', json_decode($item->type, true))}}</div>
                            @endif
                            <img src="{{$item->attachment()->first()->url()}}" alt="card-img">
                        </div>
                        <div class="card-commerce__desc">
                            <div class="card-commerce__desc-row">
                                <div class="card-commerce__desc-col">
                                    <div class="card-commerce__title">{{$item->title}}</div>
                                    <div class="card-commerce__sub-title">{{$item->address}}</div>
                                </div>
                                <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="card-commerce__row">
                                <div class="card-commerce__info-container">
                                    <div class="card-commerce__info-item">
                                        <div class="card-commerce__info-title">Площадь, м2</div>
                                        <div class="card-commerce__info-value">{{$item->square}}</div>
                                    </div>
                                    <div class="card-commerce__info-item">
                                        <div class="card-commerce__info-title">Сдача</div>
                                        <div class="card-commerce__info-value">{{$item->lease}}</div>
                                    </div>
                                    <div class="card-commerce__info-item">
                                        <div class="card-commerce__info-title">Цена от</div>
                                        <div class="card-commerce__info-value">{{Price::getBaseFormat($item->base_price)}} р/мес</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('commerce_detail', $item)}}" class="card-commerce__link"></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection