@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Выбрать квартиру')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">Выбрать квартиру</h1>
    </div>
    <section class="filter-apartments-cat">
        @include('partials.filter')
    </section>
    <section class="catalog-section section">
        <div class="container">
            <div class="catalog-sort">
                <div class="catalog-sort__dropdown filter__dropdown">
                    <label class="filter__dropdown-menu">Сортировать</label>
                    @if($order['active'])
                        <div class="filter__dropdown-menu-btn">{{$order['active']['name']}}</div>
                    @else
                        <div class="filter__dropdown-menu-btn">Сначала дешевле</div>
                    @endif
                    <div class="filter__dropdown-content" data-type="sort">
                        @foreach($order['result'] as $orderItem)
                            <div class="input_field sort-item @if(isset($orderItem['active'])) selected @endif" data-sort="{{$orderItem['field']}}">
                                <input type="radio" name="sort" id="{{$orderItem['field']}}" @if(isset($orderItem['active'])) checked @endif>
                                <label for="{{$orderItem['field']}}">{{$orderItem['name']}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="cards-wrapper-col4">
                @foreach($items as $item)
                    @include('pages.house.partials.card', ['item' => $item])
                @endforeach
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection
