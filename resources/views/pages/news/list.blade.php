@extends('layouts.main')
@section('title', 'Новости')
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
        <h1 class="title">НОВОСТИ</h1>
        <section class="section">

            <div class="cards-wrapper-col3">
                @foreach($news as $item)
                    <article class="card-news">
                        <div class="card-news__picture">
                            <img src="{{$item->attachment()->first()->url()}}" alt="card-img">
                        </div>
                        <div class="card-news__desc">
                            <div class="card-news__desc-row">
                                <div class="card-news__title">{{$item->title}}</div>
                                <div class="card-news__sub-title">{{strip_tags(Str::limit($item->description, 65))}}</div>
                                <date class="card-news__date">{{$item->created_at->format('d.m.Y')}}</date>
                            </div>
                        </div>
                        <a href="{{route('news_detail', ['id' => $item->id])}}" class="card-news__link">
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection