@php use App\Helpers\Price; @endphp
@extends('layouts.main')
@section('title', 'Жилые комплексы')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">ЖИЛЫЕ КОМПЛЕКСЫ</h1>
    </div>
    <div class="container">
        <section class="section-projects section">
            <div class="section-projects__cards-wrapper">
                @foreach($items as $item)
                    <article class="card-complex">
                        <div class="card-complex__picture">
                            <div class="card-complex__details">Подробнее о ЖК</div>
                            <img src="{{$item->preview_img}}" alt="card-img">
                        </div>
                        <div class="card-complex__desc">
                            <div class="card-complex__desc-row">
                                <div class="card-complex__title">{{$item->title}}</div>
                                <div class="card-complex__sub-title">{{$item->address}}</div>

                            </div>
                            <div class="card-complex__desc-row">
                                <div class="card-complex__info-container">
                                    <div class="card-complex__info-item">
                                        <div class="card-complex__info-title">Сдача</div>
                                        <div class="card-complex__info-value">{{$item->lease}}</div>
                                    </div>
                                    <div class="card-complex__info-item">
                                        <div class="card-complex__info-title">Цена от</div>
                                        <div class="card-complex__info-value">{{Price::getBaseFormat($item->price)}} р.</div>
                                    </div>
                                    <div class="card-complex__info-item">
                                        <div class="card-complex__info-title">Ипотека от</div>
                                        <div class="card-complex__info-value">{{Price::getBaseFormat($item->credit_price)}} р/мес</div>
                                    </div>
                                    <div class="card-complex__info-item">
                                        <div class="card-complex__info-title">Планировка</div>
                                        <div class="card-complex__info-value">{{$item->layout}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('jk_detail', ['id' => $item->id])}}" class="card-complex__link"></a>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection