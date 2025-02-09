@extends('layouts.main')
@section('title', 'Новости')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">НОВОСТИ</h1>
        <section class="section">

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
                    <a href="{{route('news-detail', ['id' => 3])}}" class="card-news__link">
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
                    <a href="news-detail.html" class="card-news__link">
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
                    <a href="news-detail.html" class="card-news__link">
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
                    <a href="news-detail.html" class="card-news__link">
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
                    <a href="news-detail.html" class="card-news__link">
                    </a>
                </article>

            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection