@extends('layouts.main')
@section('title', $item->title)
@section('content')
    @php
        $objectFeatureTabs = collect([
            [
                'title' => $item->object_feature_1_title,
                'text' => $item->object_feature_1_text,
                'img' => $item->object_feature_1_img,
            ],
            [
                'title' => $item->object_feature_2_title,
                'text' => $item->object_feature_2_text,
                'img' => $item->object_feature_2_img,
            ],
            [
                'title' => $item->object_feature_3_title,
                'text' => $item->object_feature_3_text,
                'img' => $item->object_feature_3_img,
            ],
            [
                'title' => $item->object_feature_4_title,
                'text' => $item->object_feature_4_text,
                'img' => $item->object_feature_4_img,
            ],
            [
                'title' => $item->object_feature_5_title,
                'text' => $item->object_feature_5_text,
                'img' => $item->object_feature_5_img,
            ],
        ])->filter(function ($tab) {
            return filled($tab['title'])
                && (filled($tab['img']) || trim(strip_tags((string) $tab['text'])) !== '');
        })->values();

        $constructionFeatureItems = collect([
            [
                'title' => $item->construction_feature_1_title,
                'text' => $item->construction_feature_1_text,
            ],
            [
                'title' => $item->construction_feature_2_title,
                'text' => $item->construction_feature_2_text,
            ],
            [
                'title' => $item->construction_feature_3_title,
                'text' => $item->construction_feature_3_text,
            ],
            [
                'title' => $item->construction_feature_4_title,
                'text' => $item->construction_feature_4_text,
            ],
        ])->filter(function ($feature) {
            return filled($feature['title']) || filled($feature['text']);
        })->values();

        $constructionFeatureLeftItems = $constructionFeatureItems->take(2);
        $constructionFeatureRightItems = $constructionFeatureItems->skip(2);
        $showConstructionFeature = filled($item->construction_feature_title)
            && (filled($item->construction_feature_img) || $constructionFeatureItems->isNotEmpty());
    @endphp

        <section class="complex-single__top-banner section">
            <div class="container">
                <h1 class="title title-page">{{$item->title}}</h1>
                <div class="single-banner">
                    <img src="{{$item->detail_img}}" alt="{{$item->title}}">
                    <div class="single-banner__row">
                        <div class="single-banner__item item-1">
                            <div class="single-banner__item-title">{{$item->hero_feature_1_title}}</div>
                            <div class="single-banner__item-text">{{$item->hero_feature_1_text}}</div>
                        </div>
                        <div class="single-banner__item item-2">
                            <div class="single-banner__item-title">{{$item->hero_feature_2_title}}</div>
                            <div class="single-banner__item-text">{{$item->hero_feature_2_text}}</div>
                        </div>
                        <div class="single-banner__item item-3">
                            <div class="single-banner__item-title">{{$item->hero_feature_3_title}}</div>
                            <div class="single-banner__item-text">{{$item->hero_feature_3_text}}</div>
                        </div>
                        <div class="single-banner__item item-4">
                            <div class="single-banner__item-title">{{$item->hero_feature_4_title}}</div>
                            <div class="single-banner__item-text">{{$item->hero_feature_4_text}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-project section">
            <div class="container">
                <div class="about-project__wrap">
                    <div class="about-project__col">
                        <div class="about-project__text">
                            {!! $item->description !!}
                        </div>
                    </div>
                    @if($item->video)
                        <div class="about-project__col">
                            <div class="about-project__media">
                                <iframe src="{{$item->video}}" width="100%" height="360"
                                        allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0"
                                        allowfullscreen></iframe>
                            </div>
                        </div>
                    @elseif($item->about_media_img)
                        <div class="about-project__col">
                            <div class="about-project__media">
                                <img src="{{$item->about_media_img}}" alt="{{$item->title}}">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        @if(!empty($filter))
            <section class="filter section">
                <div class="container">
                    <h3 class="title">Выбрать квартиру</h3>
                </div>
                @include('partials.filter')
            </section>
        @endif
        @if($objectFeatureTabs->isNotEmpty())
            <section class="section">
                <div class="container">
                    <h3 class="title">ОСОБЕННОСТИ ОБЪЕКТА</h3>
                    <div data-tab-component>
                        <div class="tab-btns-container" role="tablist" aria-label="Особенности объекта">
                            @foreach($objectFeatureTabs as $tab)
                                <button role="tab"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="object-feature-{{$item->id}}-{{$loop->iteration}}-content"
                                        id="object-feature-{{$item->id}}-{{$loop->iteration}}">
                                    <h3 class="tab-title">{{$tab['title']}}</h3>
                                </button>
                            @endforeach
                        </div>

                        @foreach($objectFeatureTabs as $tab)
                            <section id="object-feature-{{$item->id}}-{{$loop->iteration}}-content"
                                     role="tabpanel"
                                     aria-labelledby="object-feature-{{$item->id}}-{{$loop->iteration}}"
                                     tabindex="0"
                                     aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                                <div class="tab-company__inner">
                                    @if($tab['img'])
                                        <img src="{{$tab['img']}}" alt="{{$tab['title']}}">
                                    @endif
                                    @if(trim(strip_tags((string) $tab['text'])) !== '')
                                        <div class="tab-company__content-wrapper">
                                            <div class="tab3__content">
                                                {!! $tab['text'] !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if($showConstructionFeature)
            <section class="construction-feature section">
                <div class="container">
                    <h3 class="title">{{$item->construction_feature_title}}</h3>
                    <div class="construction-feature__wrap">
                        @if($constructionFeatureLeftItems->isNotEmpty())
                            <div class="construction-feature__col">
                                @foreach($constructionFeatureLeftItems as $feature)
                                    <div class="construction-feature__col-item">
                                        @if($feature['title'])
                                            <p class="construction-feature__item-title">{{$feature['title']}}</p>
                                        @endif
                                        @if($feature['text'])
                                            <p class="construction-feature__item-text">{{$feature['text']}}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if($item->construction_feature_img)
                            <div class="construction-feature__col">
                                <img src="{{$item->construction_feature_img}}" alt="{{$item->construction_feature_title}}" class="construction-feature__img">
                            </div>
                        @endif

                        @if($constructionFeatureRightItems->isNotEmpty())
                            <div class="construction-feature__col">
                                @foreach($constructionFeatureRightItems as $feature)
                                    <div class="construction-feature__col-item">
                                        @if($feature['title'])
                                            <p class="construction-feature__item-title">{{$feature['title']}}</p>
                                        @endif
                                        @if($feature['text'])
                                            <p class="construction-feature__item-text">{{$feature['text']}}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif


        <div class="container">
            <h3 class="title">Отделка квартир</h3>
            <div data-tab-component>
                <div class="tab-btns-container" role="tablist" aria-label="Tabbed content">
                    <button role="tab" aria-selected="true" aria-controls="tab8-content" id="tab8">
                        <h3 class="tab-title">Прихожая</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab9-content" id="tab9">
                        <h3 class="tab-title">Кухня</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab10-content" id="tab10">
                        <h3 class="tab-title">Спальня</h3>
                    </button>

                    <button role="tab" aria-selected="false" aria-controls="tab11-content" id="tab11">
                        <h3 class="tab-title">Санузел</h3>
                    </button>
                    <button role="tab" aria-selected="false" aria-controls="tab12-content" id="tab12">
                        <h3 class="tab-title">Балкон</h3>
                    </button>
                </div>

                <section id="tab8-content" role="tabpanel" aria-labelledby="tab8" tabindex="0">

                    <div class="tab8__inner">
                        <!--          <img src="/assets/img/about-company/company1.jpg" alt="company">-->
                        <div class="tab8__content-wrapper">
                            <div class="tab8__content">
                                <!--              <h3 class="tab8__inner-title">Прихожая</h3>-->
                                <img src="/assets/img/complex-single/prihozhaya.jpg" alt="company">
                            </div>
                        </div>
                    </div>
                </section>


                <section id="tab9-content" role="tabpanel" aria-labelledby="tab9" tabindex="0" aria-hidden="true">
                    <div class="tab9__content">
                        <!--          <h3 class="tab9__inner-title">Кухня</h3>-->

                        <img src="/assets/img/complex-single/kuhnya.jpg" alt="company">
                    </div>
                </section>

                <section id="tab10-content" role="tabpanel" aria-labelledby="tab10" tabindex="0" aria-hidden="true">
                    <div class="tab10__content">
                        <!--          <h3 class="tab10__inner-title">Спальня</h3>-->
                        <img src="/assets/img/complex-single/gostin.jpg" alt="company">
                    </div>
                </section>

                <section id="tab11-content" role="tabpanel" aria-labelledby="tab11" tabindex="0" aria-hidden="true">
                    <div class="tab11__content">
                        <!--          <h3 class="tab11__inner-title">Санузел</h3>-->
                        <img src="/assets/img/complex-single/vannaya.jpg" alt="company">
                    </div>
                </section>
                <section id="tab12-content" role="tabpanel" aria-labelledby="tab12" tabindex="0" aria-hidden="true">
                    <div class="tab12__content">
                        <!--          <h3 class="tab12__inner-title">Балкон</h3>-->

                        <img src="/assets/img/complex-single/balkon.jpg" alt="company">
                    </div>
                </section>
            </div>
        </div>

        <div class="section">
            <div class="container">
                @include('partials.forms.layout')
            </div>
        </div>
        @if(($item->options ?? collect())->isNotEmpty())
            <section class="complex-this section">
                <div class="container">
                    <div class="title">В ЭТОМ ЖК</div>
                    <div class="complex-this__wrap">
                        @foreach($item->options as $option)
                            <div class="complex-this__item">
                                <div class="complex-this__item-content">
                                    <h3 class="complex-this__item-title">{{ $option->title }}</h3>
                                    <span>&#10230;</span>
                                </div>
                                <img class="complex-this__item-img"
                                     src="/assets/img/complex-single/complex-car.png"
                                     alt="{{ $option->title }}">
                                <a class="complex-this__item-link" href="{{ route('jk_option_detail', $option) }}"></a>
                            </div>
                        @endforeach
                        <div class="complex-this__item">
                            <div class="complex-this__item-content">
                                <h3 class="complex-this__item-title">Нежилые помещения</h3>
                                <span>&#10230;</span>
                            </div>
                            <img class="complex-this__item-img" src="/assets/img/complex-single/complex-teh.png" alt="">
                            <a class="complex-this__item-link" href="{{ route('commerce_list') }}"></a>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if($item->map)
            <div class="map-container container">
                <div class="title">ИНФРАСТРУКТУРА</div>
                <iframe src="{{$item->map}}" frameborder="0" allowfullscreen="true" width="100%" height="500px" style="display: block;"></iframe>
            </div>
        @endif
           
    @include('partials.forms.questions')
@endsection
