@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'УК')
@section('content')
    {{Breadcrumbs::render()}}
    <section class="uk-top section">
        <div class="container">
            <div class="uk-banner">
                <img src="/assets/img/complexes/zhk-sputnik.jpg" alt="" />
                <div class="uk-banner__row">
                    <div class="uk-banner__item">
                        <div class="uk-banner__item-title">Преимущество</div>
                        <div class="uk-banner__item-text">Описание преимущества</div>
                    </div>
                    <div class="uk-banner__item">
                        <div class="uk-banner__item-title">Преимущество</div>
                        <div class="uk-banner__item-text">Описание преимущества</div>
                    </div>
                    <div class="uk-banner__item">
                        <div class="uk-banner__item-title">Преимущество</div>
                        <div class="uk-banner__item-text">Описание преимущества</div>
                    </div>
                    <div class="uk-banner__item">
                        <div class="uk-banner__item-title">Преимущество</div>
                        <div class="uk-banner__item-text">Описание преимущества</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-service section">
        <div class="container">
            <div class="uk-service__container">
                <div class="service__item">
                    <img src="/assets/img/uk/uk-icon3.png" alt="Коммунальные услуги" />
                    <h3>Коммунальные услуги</h3>
                    <p>
                        Все коммунальные услуги предоставляются без перебоев. Вода
                        течет, свет горит, батареи греют.
                    </p>
                </div>
                <div class="service__item">
                    <img src="/assets/img/uk/uk-icon1.png" alt="Качественное обслуживание" />
                    <h3>Качественное обслуживание</h3>
                    <p>
                        Мы действуем проактивно. Решаем проблемы до их возникновения и
                        предотвращаем аварийные ситуации.
                    </p>
                </div>
                <div class="service__item">
                    <img src="/assets/img/uk/uk-icon2.png" alt="Благоустройство территорий" />
                    <h3>Благоустройство территорий</h3>
                    <p>
                        Строим детские и спортивные площадки. Высаживаем деревья и
                        кустарники. Организуем пространства для досуга.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-objects section">
        <div class="container">
            <h3 class="uk-objects__title title">ОБЪЕКТЫ УК КИТ</h3>
            <div class="cards-wrapper-col3">
                @foreach($ukObjects as $item)
                    <div class="uk-objects__card">
                        <div class="uk-objects__card-image">
                            <img src="{{$item->img}}" alt="{{$item->title}}" />
                            <h3>{{$item->title}}</h3>
                        </div>
                        <div class="uk-objects__card-info">
                            <div class="contacts-column-txt">
                                <img src="/assets/img/icons/loc.svg" alt="ic">
                                <p>{{$item->address}}</p>
                            </div>
                            @if($item->phone)
                                <div class="contacts-column-txt">
                                    <img src="/assets/img/icons/tel.svg" alt="ic">
                                    <a href="tel:+7{{preg_replace('/[^0-9]/', '', $item->phone)}}"> Тел.: {{$item->phone}} - многоканальный</a>
                                </div>
                            @endif
                            @if($item->email)
                                <div class="contacts-column-txt">
                                    <img src="/assets/img/icons/mail.svg" alt="ic">
                                    <p>E-mail: {{$item->email}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="uk-questions details-group section">
        <div class="container">
            <h3 class="title">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</h3>
            @foreach($questions as $item)
                <details class="details">
                    <summary class="details__summary">
                        {{$item->question}}
                    </summary>
                    <div class="details__content">
                        {{$item->answer}}
                    </div>
                </details>
            @endforeach
        </div>
    </section>
    @include('partials.forms.questions')
@endsection