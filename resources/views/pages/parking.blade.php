@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', $option->title)
@section('canonical', route('jk_option_detail', ['option' => $option->slug]))
@section('content')
    {{ Breadcrumbs::render('jk_option_detail', $option) }}
    <div class="container">
        <h1 class="title">{{ $option->title }}</h1>
    </div>
    <section class="section section-parking">
        <div class="container">
            <div class="section-parking__image">
                <x-responsive-image
                    :src="$option->img ?: '/assets/img/parking/parking.jpg'"
                    :alt="$option->title"
                    decoding="async"
                    fetchpriority="high"
                />
            </div>
            <div class="section-parking__content">
                @if($option->description)
                    <div class="section-parking__content-text">
                        {!! $option->description !!}
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('partials.forms.questions')
@endsection
