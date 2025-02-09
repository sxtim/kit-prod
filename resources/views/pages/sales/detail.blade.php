@extends('layouts.main')
@section('title', $id)
@section('content')
    @include('partials.breadcrumb')
    <div class="container">
    <h1 class="title">{{$id}}</h1>
    <section class="section">
        <div class="promo-detail__inner _inner">
            <div class="promo-detail__content">
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores beatae cum delectus doloribus fugiat impedit ipsam laudantium nam neque nihil placeat possimus, praesentium quidem sequi tenetur ullam veritatis! Explicabo, quas?</p>
                <br>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur eligendi est fuga iure minus molestiae officia optio quidem sunt. Ab, aut corporis cumque doloremque doloribus iusto minus quis sequi.</p>
                <br>
                <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus earum ex nemo, nihil optio quibusdam ullam. Ad atque nostrum quos sapiente sequi sint sit velit? Aut explicabo nulla possimus!</p>

                <a class="btn btn-green promo-detail__btn" href="{{route('sales-list')}}">Вернуться к акциям</a>
            </div>
            <div class="promo-detail__inner-item">
                <img class="promo-detail__img" src="/assets/img/apartments/sputnik/sp-g-07.jpg" alt="img">
            </div>
        </div>
    </section>
</div>
    @include('partials.forms.questions')
@endsection