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

        $finishingTabs = ($item->finishings ?? collect())->filter(function ($finishing) {
            return $finishing->active
                && filled($finishing->title)
                && (filled($finishing->img) || filled($finishing->link));
        })->values();

        $commerceFilterUrl = route('commerce_list', [
            'data' => json_encode([
                'project' => ($commerceJkIds ?? collect([$item->id]))
                    ->map(fn ($id) => (string) $id)
                    ->values()
                    ->all(),
            ], JSON_UNESCAPED_UNICODE),
        ]);

        $showComplexThis = ($item->options ?? collect())->isNotEmpty() || $commerceCount > 0;

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
        @if($apartmentPreviewItems->isNotEmpty())
            <section class="catalog-section section">
                <div class="container">
                    <div class="cards-wrapper-col4">
                        @foreach($apartmentPreviewItems as $apartment)
                            @include('pages.house.partials.card', ['item' => $apartment])
                        @endforeach
                    </div>
                </div>
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

        @if($finishingTabs->isNotEmpty())
            <section class="section apartment-tabs">
                <div class="container">
                    <h3 class="title">Отделка квартир</h3>
                </div>
                <div data-tab-component>
                    <div class="container">
                        <div class="tab-btns-container" role="tablist" aria-label="Отделка квартир">
                            @foreach($finishingTabs as $finishing)
                                <button role="tab"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                        aria-controls="jk-finishing-{{$item->id}}-{{$loop->iteration}}-content"
                                        id="jk-finishing-{{$item->id}}-{{$loop->iteration}}">
                                    <h3 class="tab-title">{{$finishing->title}}</h3>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="container">
                        @foreach($finishingTabs as $finishing)
                            <div id="jk-finishing-{{$item->id}}-{{$loop->iteration}}-content"
                                 role="tabpanel"
                                 aria-labelledby="jk-finishing-{{$item->id}}-{{$loop->iteration}}"
                                 tabindex="0"
                                 aria-hidden="{{ $loop->first ? 'false' : 'true' }}">
                                <div class="apartment-tabs__wrapper">
                                    <div class="apartment-tabs__content">
                                        @if($finishing->img)
                                            <img class="apartment-tabs__img" src="{{$finishing->img}}" alt="{{$finishing->title}}">
                                        @endif
                                        @if($finishing->link)
                                            <a href="{{$finishing->link}}"
                                               class="btn btn-sand apartment-tabs__link"
                                               target="_blank">3D-Тур</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <div class="section">
            <div class="container">
                @include('partials.forms.layout')
            </div>
        </div>
        @php
            $galleryAttachments = $item->attachments
                ->map(fn ($attach) => [
                    'attach' => $attach,
                    'url' => $attach->url(),
                ])
                ->filter(fn ($data) => filled($data['url']))
                ->values();
        @endphp
        @if($galleryAttachments->isNotEmpty())
            <section class="apartment-gallery section">
                <div class="container">
                    <h3 class="title">Фотогалерея комплекса</h3>
                </div>
                <div class="apartment-gallery__wrapper">
                    @foreach($galleryAttachments as $galleryItem)
                        @php
                            $attachUrl = $galleryItem['url'];
                        @endphp
                        <div class="apartment-gallery__item">
                            <a class="apartment-gallery__pic" data-fslightbox="jk-gallery-{{$item->id}}"
                               href="{{$attachUrl}}">
                                <img class="apartment-gallery__img" src="{{$attachUrl}}" alt="img">

                                <div class="apartment-gallery__pic-hover">
                                    <img src="/assets/img/icons/search.svg" alt="">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
        @include('pages.jk.partials.construction_progress')
        @include('pages.jk.partials.project_documents')
        @if($showComplexThis)
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
                        @if($commerceCount > 0)
                            <div class="complex-this__item">
                                <div class="complex-this__item-content">
                                    <h3 class="complex-this__item-title">Нежилые помещения</h3>
                                    <span>&#10230;</span>
                                </div>
                                <img class="complex-this__item-img" src="/assets/img/complex-single/complex-teh.png" alt="Нежилые помещения">
                                <a class="complex-this__item-link" href="{{ $commerceFilterUrl }}"></a>
                            </div>
                        @endif
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
