@php
    $monthNames = [
        1 => 'Январь',
        2 => 'Февраль',
        3 => 'Март',
        4 => 'Апрель',
        5 => 'Май',
        6 => 'Июнь',
        7 => 'Июль',
        8 => 'Август',
        9 => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
    ];

    $progressItems = ($item->constructionProgress ?? collect())
        ->filter(function ($progress) {
            return $progress->type === 'photo' && $progress->attachments->isNotEmpty();
        })
        ->values();

    $years = $progressItems
        ->map(fn ($progress) => $progress->report_date?->year)
        ->filter()
        ->unique()
        ->values();

    $months = $progressItems
        ->map(fn ($progress) => $progress->report_date?->month)
        ->filter()
        ->unique()
        ->sort()
        ->values();
@endphp

@if($progressItems->isNotEmpty())
    <section class="construction-progress section" data-construction-progress>
        <div class="container">
            <div class="construction-progress__header">
                <h3 class="title">ХОД СТРОИТЕЛЬСТВА</h3>
                @if($years->count() > 1 || $months->count() > 1)
                    <div class="construction-progress__filters">
                        <div class="construction-progress__filter construction-progress__dropdown"
                             data-progress-dropdown
                             data-progress-filter="year"
                             data-value="">
                            <button class="construction-progress__dropdown-button"
                                    type="button"
                                    data-progress-dropdown-button
                                    aria-label="Фильтр по году"
                                    aria-expanded="false">
                                Все годы
                            </button>
                            <div class="construction-progress__dropdown-content" data-progress-dropdown-content>
                                <button class="construction-progress__dropdown-option selected"
                                        type="button"
                                        data-progress-filter-value=""
                                        aria-selected="true">
                                    Все годы
                                </button>
                                @foreach($years as $year)
                                    <button class="construction-progress__dropdown-option"
                                            type="button"
                                            data-progress-filter-value="{{ $year }}"
                                            aria-selected="false">
                                        {{ $year }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                        <div class="construction-progress__filter construction-progress__dropdown"
                             data-progress-dropdown
                             data-progress-filter="month"
                             data-value="">
                            <button class="construction-progress__dropdown-button"
                                    type="button"
                                    data-progress-dropdown-button
                                    aria-label="Фильтр по месяцу"
                                    aria-expanded="false">
                                Все месяцы
                            </button>
                            <div class="construction-progress__dropdown-content" data-progress-dropdown-content>
                                <button class="construction-progress__dropdown-option selected"
                                        type="button"
                                        data-progress-filter-value=""
                                        aria-selected="true">
                                    Все месяцы
                                </button>
                                @foreach($months as $month)
                                    <button class="construction-progress__dropdown-option"
                                            type="button"
                                            data-progress-filter-value="{{ $month }}"
                                            aria-selected="false">
                                        {{ $monthNames[$month] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="construction-progress__list {{ $progressItems->count() === 1 ? 'construction-progress__list--single' : '' }}">
                @foreach($progressItems as $progress)
                    @php
                        $cover = $progress->attachments->first();
                        $date = $progress->report_date;
                        $month = $date?->month;
                        $year = $date?->year;
                        $dateLabel = $month && $year ? $monthNames[$month] . ' ' . $year . ' г.' : null;
                    @endphp
                    <article class="construction-progress__card"
                             data-progress-card
                             data-year="{{ $year }}"
                             data-month="{{ $month }}"
                             data-progress-modal="construction-progress-modal-{{ $progress->id }}"
                             data-progress-start="0">
                        <div class="construction-progress__cover">
                            <x-responsive-image
                                :src="$cover->url()"
                                :alt="$progress->title ?: 'Ход строительства'"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="low"
                            />
                            <span class="construction-progress__badge">{{ $progress->attachments->count() }} фото</span>
                        </div>
                        <div class="construction-progress__card-body">
                            @if(filled($progress->title) || filled($item->title))
                                <h4 class="construction-progress__card-title">{{ $progress->title ?: $item->title }}</h4>
                            @endif
                            @if($dateLabel)
                                <p class="construction-progress__date">{{ $dateLabel }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="construction-progress__empty" data-progress-empty hidden>Нет отчетов за выбранный период</p>
        </div>
    </section>

    @foreach($progressItems as $progress)
        @php
            $date = $progress->report_date;
            $month = $date?->month;
            $year = $date?->year;
            $dateLabel = $month && $year ? $monthNames[$month] . ' ' . $year . ' г.' : null;
        @endphp
        <div class="construction-progress-modal"
             id="construction-progress-modal-{{ $progress->id }}"
             data-construction-slider
             role="dialog"
             aria-modal="true"
             tabindex="-1">
            <div class="modal__overlay"></div>
            <div class="modal__content construction-progress-modal__content {{ $progress->attachments->count() > 1 ? 'construction-progress-modal__content--with-thumbs' : '' }}">
                <button class="modal__close construction-progress-modal__close" aria-label="Закрыть модальное окно">
                    <svg class="construction-progress-modal__close-icon" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false">
                        <path d="M11.1,10l8.67-8.67c0.31-0.31,0.31-0.81,0-1.11c-0.31-0.31-0.81-0.31-1.11,0L10,8.9L1.33,0.22c-0.31-0.31-0.81-0.31-1.11,0c-0.31,0.31-0.31,0.81,0,1.11L8.9,10l-8.67,8.67c-0.31,0.31-0.31,0.81,0,1.11C0.38,19.92,0.58,20,0.78,20s0.4-0.08,0.56-0.23L10,11.1l8.67,8.67C18.82,19.92,19.02,20,19.22,20s0.4-0.08,0.56-0.23c0.31-0.31,0.31-0.81,0-1.11L11.1,10z" />
                    </svg>
                </button>

                <div class="construction-progress-modal__top">
                    <div class="construction-progress-modal__meta">
                        <span data-progress-counter>1 / {{ $progress->attachments->count() }}</span>
                        <p>Ход строительства@if(filled($item->title)) / {{ $item->title }}@endif</p>
                    </div>
                </div>

                <div class="construction-progress-modal__body">
                    <div class="construction-progress-modal__main">
                        @if($progress->attachments->count() > 1)
                            <button class="construction-progress-modal__nav construction-progress-modal__nav--prev"
                                    type="button"
                                    data-progress-prev
                                    aria-label="Предыдущее фото">
                                <svg class="construction-progress-modal__nav-icon" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false">
                                    <path d="M18.271,9.212H3.615l4.184-4.184c0.306-0.306,0.306-0.801,0-1.107c-0.306-0.306-0.801-0.306-1.107,0L1.21,9.403C1.194,9.417,1.174,9.421,1.158,9.437c-0.181,0.181-0.242,0.425-0.209,0.66c0.005,0.038,0.012,0.071,0.022,0.109c0.028,0.098,0.075,0.188,0.142,0.271c0.021,0.026,0.021,0.061,0.045,0.085c0.015,0.016,0.034,0.02,0.05,0.033l5.484,5.483c0.306,0.307,0.801,0.307,1.107,0c0.306-0.305,0.306-0.801,0-1.105l-4.184-4.185h14.656c0.436,0,0.788-0.353,0.788-0.788S18.707,9.212,18.271,9.212z" />
                                </svg>
                            </button>
                        @endif

                        <div class="construction-progress-modal__slides swiper" data-progress-main>
                            <div class="swiper-wrapper">
                            @foreach($progress->attachments as $attach)
                                <div class="construction-progress-modal__slide swiper-slide"
                                     data-progress-slide>
                                    <x-responsive-image
                                        :src="$attach->url()"
                                        :alt="$progress->title ?: 'Ход строительства'"
                                        loading="lazy"
                                        decoding="async"
                                        fetchpriority="low"
                                    />
                                </div>
                            @endforeach
                            </div>
                        </div>

                        <div class="construction-progress-modal__info">
                            <h4>{{ $progress->title }}</h4>
                            @if($dateLabel)
                                <p class="construction-progress-modal__date">{{ $dateLabel }}</p>
                            @endif
                            @if(trim(strip_tags((string) $progress->description)) !== '')
                                <div class="construction-progress-modal__text">{!! $progress->description !!}</div>
                            @endif
                        </div>

                        @if($progress->attachments->count() > 1)
                            <button class="construction-progress-modal__nav construction-progress-modal__nav--next"
                                    type="button"
                                    data-progress-next
                                    aria-label="Следующее фото">
                                <svg class="construction-progress-modal__nav-icon" width="20" height="20" viewBox="0 0 20 20" aria-hidden="true" focusable="false">
                                    <path d="M1.729,9.212h14.656l-4.184-4.184c-0.307-0.306-0.307-0.801,0-1.107c0.305-0.306,0.801-0.306,1.106,0l5.481,5.482c0.018,0.014,0.037,0.019,0.053,0.034c0.181,0.181,0.242,0.425,0.209,0.66c-0.004,0.038-0.012,0.071-0.021,0.109c-0.028,0.098-0.075,0.188-0.143,0.271c-0.021,0.026-0.021,0.061-0.045,0.085c-0.015,0.016-0.034,0.02-0.051,0.033l-5.483,5.483c-0.306,0.307-0.802,0.307-1.106,0c-0.307-0.305-0.307-0.801,0-1.105l4.184-4.185H1.729c-0.436,0-0.788-0.353-0.788-0.788S1.293,9.212,1.729,9.212z" />
                                </svg>
                            </button>
                        @endif
                    </div>

                    @if($progress->attachments->count() > 1)
                        <div class="construction-progress-modal__thumbs-wrap">
                            <div class="construction-progress-modal__thumbs swiper" data-progress-thumbs>
                                <div class="swiper-wrapper">
                                @foreach($progress->attachments as $attach)
                                    <div class="construction-progress-modal__thumb swiper-slide"
                                         data-progress-thumb="{{ $loop->index }}">
                                        <x-responsive-image
                                            :src="$attach->url()"
                                            :alt="$progress->title ?: 'Ход строительства'"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="low"
                                        />
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif
