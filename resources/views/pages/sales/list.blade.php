@extends('layouts.main')
@section('title', 'Акции')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">АКЦИИ</h1>
    </div>
    <div class="container">
        <section class="section">
            <div class="cards-wrapper-col3">
                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="{{route('sales-detail', ['id' => 3])}}" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="promo-detail.html" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="promo-detail.html" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="promo-detail.html" class="card-promotion__link">
                    </a>
                </article>

                <article class="card-promotion">
                    <img src="/assets/img/complexes/zhk-sputnik1.jpg" alt="Building">
                    <div class="card-promotion__status">До 30.07.2024г.</div>
                    <div class="card-promotion__txt-bottom ">Спеццены на позицию 10 <br> ЖК Спутник
                        <span>&#10230;</span></div>
                    <a href="promo-detail.html" class="card-promotion__link">
                    </a>
                </article>

            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection