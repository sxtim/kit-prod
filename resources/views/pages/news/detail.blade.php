@extends('layouts.main')
@section('title', 'Новость')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">{{$item->title}}</h1>
        <section class="section">
            <div class="news-detail__inner _inner">
                <div class="news-detail__content">
                    {!! $item->description !!}
                    <a class="btn btn-green news-detail__btn" href="{{route('news_list')}}">Вернуться к новостям</a>
                </div>
                <div class="news-detail__inner-item">
                    <img class="news-detail__img" src="{{$img}}" alt="img">
                </div>
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection