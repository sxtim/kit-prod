@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Новости')
@section('content')
    {{Breadcrumbs::render()}}
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
                                <div class="card-news__sub-title">{{Str::limit(strip_tags($item->description), 65)}}</div>
                                @if($item->date)
                                    <date class="card-news__date">{{(new DateTime($item->date))->format('d.m.Y')}}</date>
                                @else
                                    <date class="card-news__date">{{$item->created_at->format('d.m.Y')}}</date>
                                @endif
                            </div>
                        </div>
                        <a href="{{route('news_detail', $item)}}" class="card-news__link">
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection