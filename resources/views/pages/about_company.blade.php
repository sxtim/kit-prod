@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'О компании')
@section('content')
    {{Breadcrumbs::render()}}
    <section class="about-company-top section">
        <div class="container">
            <h1 class="title">О компании</h1>
            <div class="about-company-banner">
                <img src="/assets/img/complexes/zhk-sputnik.jpg" alt="" />
                <div class="about-company-banner-content">
                    <h3 class="about-company-banner-title">
                        У компании собственное сопутствующее производство:
                    </h3>
                    <div class="about-company-banner__row">
                        <div class="about-company-banner__col">
                            <div class="about-company-banner__item ci-01">
                                <div class="about-company-banner__item-title">
                                    ПВХ <br />
                                    окна
                                </div>
                                <div class="about-company-banner__item-text"></div>
                            </div>
                            <div class="about-company-banner__item ci-02">
                                <div class="about-company-banner__item-title">
                                    Асфальтирование <br />
                                    дорог
                                </div>
                                <div class="about-company-banner__item-text"></div>
                            </div>
                            <div class="about-company-banner__item ci-03">
                                <div class="about-company-banner__item-title">
                                    Краски и отделочные <br />
                                    материалы
                                </div>
                                <div class="about-company-banner__item-text"></div>
                            </div>
                        </div>
                        <div class="about-company-banner__col">
                            <div class="about-company-banner__item ci-04">
                                <div class="about-company-banner__item-title">
                                    Тротуарная <br />
                                    плитка
                                </div>
                                <div class="about-company-banner__item-text"></div>
                            </div>
                            <div class="about-company-banner__item ci-05">
                                <div class="about-company-banner__item-title">
                                    Железобетонные <br />
                                    изделия
                                </div>
                                <div class="about-company-banner__item-text"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="about-company-content section">
            @foreach($items as $i => $item)
                <div class="about-company-content-wrap">
                    <div class="about-company-content-item">
                        @if($item->video)
                            <div class="about-company-content-media">
                                <iframe src="{{$item->video}}" width="100%" height="360"
                                        allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
                        @elseif($item->img)
                            <div class="about-company-content-img">
                                <img src="{{$item->img}}" alt="Building " />
                            </div>
                        @endif
                    </div>

                    <div class="about-company-content-number">
                        <div class="circle">{{$i + 1}}</div>
                        <div class="line"></div>
                    </div>
                    <div class="about-company-content-item">
                        <div class="about-company-text">
                            <p class="about-company-text-year">{{$item->year}}</p>
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
    @include('partials.forms.questions')
@endsection