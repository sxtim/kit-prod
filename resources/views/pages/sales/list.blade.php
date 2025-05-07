@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Акции')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">АКЦИИ</h1>
    </div>
    <div class="container">
        <section class="section">
            <div class="cards-wrapper-col3">
                @foreach($items as $item)
                    <article class="card-promotion">
                        <img src="{{$item->attachment()->first()->url()}}" alt="Building">
                        <div class="card-promotion__status">До {{(new DateTime($item->sale_end))->format('d.m.Y')}}г.</div>
                        <div class="card-promotion__txt-bottom ">{{$item->title}}
                            <span>&#10230;</span></div>
                        <a href="{{route('sales_detail', $item)}}" class="card-promotion__link">
                        </a>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection