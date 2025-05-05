@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', $item->title)
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
    <h1 class="title">{{$item->title}}</h1>
    <section class="section">
        <div class="promo-detail__inner _inner">
            <div class="promo-detail__content">
                {!! $item->description !!}
                <a class="btn btn-green promo-detail__btn" href="{{route('sales_list')}}">Вернуться к акциям</a>
            </div>
            <div class="promo-detail__inner-item">
                <img class="promo-detail__img" src="{{$img}}" alt="img">
            </div>
        </div>
    </section>
</div>
    @include('partials.forms.questions')
@endsection