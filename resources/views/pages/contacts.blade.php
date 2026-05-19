@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Контакты')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">КОНТАКТЫ</h1>
        <section class="section">
            <div class="contacts-wrapper">
                <div class="contacts-column">
                    <h2 class="contacts-column-title">ООО предприятие «ИП К.И.Т.»</h2>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/loc.svg" alt="ic">
                        <p>394088, г. Воронеж, ул. Владимира Невского, д. 17-Б</p></div>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/tel.svg" alt="ic">
                        <a href="tel:+74732738046"> Тел.: (473) 273-80-46 - многоканальный</a></div>
                    <div class="contacts-column-txt">
                        <a href="tel:+74732645787">Тел.: (473) 264-57-87 - отдел кадров</a></div>
                    <div class="contacts-column-txt">
                        <a href="tel:+74732743492">Тел.: (473) 274-34-92 - отдел снабжения</a></div>
                    <div class="contacts-column-txt">
                        <a href="tel:+74732747908">Тел.: (473) 274-79-08,</a></div><div class="contacts-column-txt">  <a href="tel:+79529524272"> +7-952-952-42-72 </a> <p>- продажа стройматериалов</p> </div>
                    <div class="contacts-column-txt">
                        <a href="tel:+74732732299">📠 Факс: (473) 273-22-99</a>
                    </div>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/mail.svg" alt="ic"><a href="mailto:ipkit@bk.ru">E-mail: ipkit@bk.ru</a></div>
                    <h3 class="contacts-column-subtitle">График работы:</h3>
                    <div class="contacts-column-txt"><p>Пн-пт: 8:00-17:00</p></div>
                    <div class="contacts-column-txt"><p>Перерыв: с 12:00 по 13:00</p></div>
                    <div class="contacts-column-txt"><p>Сб-вс: выходной</p></div>
                </div>
                <div class="contacts-column">
                    <h2 class="contacts-column-title">Отдел реализации квартир</h2>
                    <div class="contacts-column-txt"><p>По приобретению недвижимости Вы можете обратиться:</p></div>

                    <div class="contacts-column-txt"><img src="/assets/img/icons/loc.svg" alt="ic"><p>г. Воронеж, ул. Владимира Невского, д. 17-Б</p></div>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/tel.svg" alt="ic"><a href="tel:+74732743884">Тел.: (473) 274-38-84,</a><a href="tel:+74732252484"> 225-24-84</a></div>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/mail.svg" alt="ic"><a href="mailto:kitcomm2@yandex.ru">E-mail: kitcomm2@yandex.ru</a></div>
                    <h3 class="contacts-column-subtitle">График работы:</h3>
                    <div class="contacts-column-txt"><p>Пн-пт: 8:00-18:00, перерыв с 12:00 по 13:00</p></div>
                    <div class="contacts-column-txt"><p>Сб: 9:00-13:00, вс - выходной</p></div>
                    <h3 class="contacts-column-subtitle">Отдел продаж (ЖК Спутник)</h3>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/loc.svg" alt="ic"><p>Ул. Летчика Филипова, дом 8, первый этаж</p></div>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/tel.svg" alt="ic"><a href="tel:+74732517343">Тел.: +7 (473) 251-73-43</a></div>
                </div>
                <div class="contacts-column">
                    <h2 class="contacts-column-title">Коммерческая недвижимость</h2>
                    <div class="contacts-column-txt"><img src="/assets/img/icons/tel.svg" alt="ic"><a href="tel:+79038585255">Тел.: 8-903-858-52-55</a></div>
                    <h3 class="contacts-column-subtitle">График работы:</h3>
                    <div class="contacts-column-txt"><p>Пн-пт: 8:00-18:00, перерыв с 12:00 по 13:00</p></div>
                    <div class="contacts-column-txt"><p>Сб: 9:00-13:00</p></div>
                    
                    <div class="contacts-column-txt"><p>Вы можете посмотреть объекты строительства <br> в будние дни с 8:00 до 16:30.</p>
                    </div>
                    <div class="contacts-column-txt"><p>Суббота с 9:00 до 13:00</p></div>
                    <div class="contacts-column-txt"><p>Воскресенье - выходной</p></div> 
                </div>
                <div class="contacts-column">
                    <h2 class="contacts-column-title">Банковские реквизиты:</h2>
                   <div class="contacts-column-txt"><p>Общество с ограниченной ответственностью <br> предприятие «ИП К.И.Т.»</p></div>
<div class="contacts-column-txt"><p>Адрес: 394088, г. Воронеж, ул. Владимира Невского, д. 17-б</p></div>
<div class="contacts-column-txt"><p>Расчётный счет: № 40702810313360116517</p></div>
<div class="contacts-column-txt"><p>Банк Центрально-Черноземный банк Сбербанка РФ <br> г. Воронеж</p></div>
<div class="contacts-column-txt"><p>Кор. счет: 30101810600000000681</p></div>
<div class="contacts-column-txt"><p>БИК: 042007681</p></div>
<div class="contacts-column-txt"><p>ИНН: 3662053761</p></div>
<div class="contacts-column-txt"><p>КПП 366201001</p></div>
<div class="contacts-column-txt"><p>Директор Куликов Вячеслав Иванович</p></div>
                </div>
            </div>
        </section>
    </div>
    @include('partials.forms.questions')
@endsection
