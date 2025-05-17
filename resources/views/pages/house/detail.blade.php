@use(App\Helpers\Price)
@use(App\Helpers\Text)
@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Квартира №' . $item->number)
@section('content')
    {{Breadcrumbs::render()}}
    <section class="apartment section">
        <div class="container">
            <!--      <h3 class="title title-page">Квартира №235</h3>-->
            <div class="apartment-info">
                <div class="apartment-info__slider">
                    <div class="section-tabs">
                        <!-- Swiper Tab -->
                        <div class="swiper-container apartment-swiper-tabs-nav">
                            <div class="swiper-wrapper apartment-info-tabs-wrapper">
                                @if($item->layout_img)
                                    <div class="swiper-slide">
                                        <p>Планировка</p>
                                    </div>
                                @endif
                                @if($item->size_img)
                                    <div class="swiper-slide">
                                        <p>С размерами</p>
                                    </div>
                                @endif
                                @if($item->floor_img)
                                    <div class="swiper-slide">
                                        <p>На этаже</p>
                                    </div>
                                @endif
                                @if($item->gen_plan_img)
                                    <div class="swiper-slide">
                                        <p>На генплане</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Swiper Content -->
                        <div class="swiper-container apartment-swiper-tabs-content">
                            <div class="swiper-wrapper">
                                @if($item->layout_img)
                                    <a class="swiper-slide" data-fslightbox="apartment-info-tab"
                                       href="{{$item->layout_img}}">
                                        <img class="apartment-info__slider-img" src="{{$item->layout_img}}" alt="img">
                                        <div class="apartment-info__slider-pic-hover">
                                            <img src="/assets/img/icons/search.svg" alt="">
                                        </div>
                                    </a>
                                @endif
                                @if($item->size_img)
                                    <a class="swiper-slide" data-fslightbox="apartment-info-tab"
                                       href="{{$item->size_img}}">
                                        <img class="apartment-info__slider-img" src="{{$item->size_img}}"
                                             alt="img">
                                        <div class="apartment-info__slider-pic-hover">
                                            <img src="/assets/img/icons/search.svg" alt="">
                                        </div>
                                    </a>
                                @endif
                                @if($item->floor_img)
                                    <a class="swiper-slide" data-fslightbox="apartment-info-tab"
                                       href="{{$item->floor_img}}">
                                        <img class="apartment-info__slider-img" src="{{$item->floor_img}}" alt="img">
                                        <div class="apartment-info__slider-pic-hover">
                                            <img src="/assets/img/icons/search.svg" alt="">
                                        </div>
                                    </a>
                                @endif
                                @if($item->gen_plan_img)
                                    <a class="swiper-slide" data-fslightbox="apartment-info-tab"
                                       href="{{$item->gen_plan_img}}">
                                        <img class="apartment-info__slider-img" src="{{$item->gen_plan_img}}" alt="img">
                                        <div class="apartment-info__slider-pic-hover">
                                            <img src="/assets/img/icons/search.svg" alt="">
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="apartment-info__content">
                    <div class="apartment-info__header">
                        <h4 class="apartment-info__title">{{Text::getRoomNumberText($item->rooms)}}</h4>
                        <p>№ {{$item->number}}</p>
                    </div>
                    <div class="apartment-info__columns">
                        <div class="apartment-info__column">
                            <p><span>ЖК</span><br>Спутник</p>
                            <p><span>Срок сдачи</span><br>{{$item->time}}</p>
                            <p><span>Этаж</span><br>{{$item->floor}}/16</p>
                            <p><span>Жилая площадь</span><br>{{$item->houseroom}}</p>
                            <p><span>Высота потолков</span><br>{{$item->ceiling_height}}</p>


                        </div>
                        <div class="apartment-info__column">
                            <p><span>Адрес</span><br>{{$item->address}}</p>
                            <p><span>Позиция</span><br>{{$item->position}}</p>
                            <p><span>Площадь, м²</span><br>{{$item->square}}</p>
                            <p><span>Площадь кухни</span><br>{{$item->square_kitchen}}</p>
                            <p><span>Вид из окна</span><br>{{$item->view_window}}</p>

                        </div>
                    </div>
                    <div class="apartment-info__price-wrap">
                        @if($item->sale_price)
                            <p>{{Price::getBaseFormat($item->sale_price)}} ₽</p>
                            <p class='apartment-info__price-disc'>{{Price::getBaseFormat($item->base_price)}} ₽</p>
                        @else
                            <p>{{Price::getBaseFormat($item->base_price)}} ₽</p>
                        @endif
                    </div>
                    <div class="apartment-info__price-desc">
                        <span>{{Price::getBaseFormat($item->price_square)}} за м²</span>
                        @if($item->description_small)
                            <p class='apartment-info__price-txt'>{!! $item->description_small !!}<p/>
                        @endif
                    </div>
                    <div class="apartment-info__btns-container">
                        <button class="btn btn-green btn-open-modal-buyback" data-modal="modal-buyback">Забронировать
                        </button>
                        <div class="apartment-info__icons">
                            <div class="apartment-info__icons-item">
                                <svg class="card-apartment__favorite" width="63" height="63" viewBox="0 0 63 63"
                                     fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="31.5" cy="31.5" r="31.5" fill="#F9F9F9"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M31.5924 24.0407C28.8131 20.8018 24.1689 19.8008 20.6866 22.7667C17.2044 25.7326 16.7141 30.6914 19.4488 34.1993C21.7224 37.1157 28.6033 43.2669 30.8585 45.2578C31.1108 45.4805 31.237 45.5919 31.3842 45.6356C31.5125 45.6737 31.6531 45.6737 31.7816 45.6356C31.9288 45.5919 32.0548 45.4805 32.3072 45.2578C34.5624 43.2669 41.4432 37.1157 43.7169 34.1993C46.4515 30.6914 46.0211 25.7014 42.479 22.7667C38.9369 19.832 34.3716 20.8018 31.5924 24.0407Z"
                                          stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="apartment-info__icons-item">
                                <div class="share-drodown__wr">
                                    <div class="share-drodown">
                                        <div class="share-drodown__btn">
                                            <svg width="63" height="63" viewBox="0 0 63 63" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="31.5" cy="31.5" r="31.5" fill="#F9F9F9"></circle>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M34.5387 21.7037C34.5387 19.1059 36.6543 17 39.2638 17C41.8734 17 43.9889 19.1059 43.9889 21.7037C43.9889 24.3015 41.8734 26.4074 39.2638 26.4074C37.9461 26.4074 36.7553 25.8702 35.8992 25.0059L29.3581 29.4594C29.4185 29.76 29.4502 30.0704 29.4502 30.3875C29.4502 31.0155 29.3261 31.6158 29.1011 32.1644L36.2734 36.8767C37.0875 36.2139 38.129 35.8148 39.2638 35.8148C41.8734 35.8148 43.9889 37.9208 43.9889 40.5186C43.9889 43.1163 41.8734 45.2223 39.2638 45.2223C36.6543 45.2223 34.5387 43.1163 34.5387 40.5186C34.5387 39.8382 34.6843 39.1905 34.9461 38.6057L27.8318 33.9315C27.0019 34.6528 25.9148 35.0912 24.7251 35.0912C22.1155 35.0912 20 32.9852 20 30.3875C20 27.7897 22.1155 25.6838 24.7251 25.6838C26.2257 25.6838 27.5615 26.38 28.4264 27.4637L34.7658 23.1474C34.6183 22.6919 34.5387 22.2064 34.5387 21.7037Z"
                                                      fill="#8C8C8C"></path>
                                            </svg>
                                        </div>
                                        <ul class="share-drodown__menu">
                                            <li><a class='share-current-link-tg' href="" target="_blank"><img
                                                            src="/assets/img/icons/telegram-mini.svg"
                                                            alt="">Отправить в Telegram</a></li>
                                            <li><a class='share-current-link-wht' href="" target="_blank"><img
                                                            src="/assets/img/icons/whatsapp-mini.svg"
                                                            alt="">Отправить в Whatsapp</a></li>
                                            <li>
                                                <a class="share-copy-btn"><img src="/assets/img/icons/copy-link-mini.svg"
                                                                               alt=""><span>Скопировать ссылку</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="apartment-info__desc">
                        <div class="apartment-info__desc-text">
                            <p>
                                <span>Условия покупки: </span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde facilis necessitatibus quae, sapiente, eligendi magni repudiandae nostrum perferendis aspernatur reprehenderit, error libero blanditiis. At repudiandae eveniet cumque cum esse! Eum.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($item->attachments)
        <section class="apartment-gallery section">
            <div class="container">
                <h3 class="title">Фотогалерея комплекса</h3>
            </div>
            <div class="apartment-gallery__wrapper">
                @foreach($item->attachments as $attach)
                    <div class="apartment-gallery__item">
                        <a class="apartment-gallery__pic" data-fslightbox="apartment-gallery"
                           href="{{$attach->url()}}">
                            <img class="apartment-gallery__img" src="{{$attach->url()}}" alt="img">

                            <div class="apartment-gallery__pic-hover">
                                <img src="/assets/img/icons/search.svg" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    @if(!$finishing->isEmpty())
        <section class="section apartment-tabs">
            <div class="container">
                <h3 class="title">Отделка</h3>
            </div>
            <div data-tab-component>
                <div class="container">
                    <div class="tab-btns-container" role="tablist" aria-label="Tabbed content">
                        @foreach($finishing as $item)
                            <button
                                    role="tab"
                                    @if($loop->index === 0)
                                        aria-selected="true"
                                    @else
                                        aria-selected="false"
                                    @endif
                                    aria-controls="{{$item->id}}-content"
                                    id="{{$item->id}}">
                                <h3 class="tab-title">{{$item->title}}</h3>
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="container">
                    @foreach($finishing as $item)
                        <div id="{{$item->id}}-content" role="tabpanel" aria-labelledby="{{$item->id}}" tabindex="0">
                            <div class="apartment-tabs__wrapper">
                                <div class="apartment-tabs__content">
                                    <img class="apartment-tabs__img" src="{{$item->img}}" alt="company">
                                    @if($item->link)
                                        <a href="{{$item->link}}"
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

    @if($item->jk->map)
        <div class="map-container container">
            <div class="title">ИНФРАСТРУКТУРА</div>
            <iframe src="{{$item->jk->map}}" frameborder="0" allowfullscreen="true" width="100%" height="500px" style="display: block;"></iframe>
        </div>
    @endif

    @include('partials.mortgage')

    @if(!$similar->isEmpty())
        <section class="apartment-similar section">
            <div class="container">
                <h3 class="title">Похожие Квартиры</h3>
                <div class="apartment-similar-swiper">
                    <div class="swiper-wrapper">
                        @foreach($similar as $item)
                            <div class="swiper-slide">
                                <article class="card-apartment">
                                    <div class="card-apartment_header">
                                        <div class="card-apartment__info">
                                            <div>
                                                <p><span>{{$item->rooms}}-комнатная</span></p>
                                                <p>Кв. № <span>{{$item->number}}</span> &nbsp; &nbsp;<span>{{$item->square}} м²</span></p>
                                            </div>
                                            <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z"
                                                      stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="card-apartment__delivery">
                                            <p>Сдача <span>{{$item->time}}</span></p>
                                            <p>Этаж <span>{{$item->floor}} из 25</span></p>
                                        </div>
                                    </div>
                                    <div class="card-apartment__body">
                                        <img src="{{$item->layout_img}}" alt="{{$item->number}}"/>
                                        <div class="card-apartment__details"></div>
                                    </div>
                                    <div class="card-apartment__footer">
                                        <div class="card-apartment__address">
                                            <span>{{$item->jk->title}}</span><br/>
                                            {{$item->address}}
                                        </div>
                                        <div class="card-apartment__price-wrap">
                                            @if($item->sale_price)
                                                <div class="card-apartment__price">{{Price::getBaseFormat($item->sale_price)}} ₽</div>
                                                <div class="card-apartment__price-disc">{{Price::getBaseFormat($item->base_price)}} ₽</div>
                                            @else
                                                <div class="card-apartment__price">{{Price::getBaseFormat($item->base_price)}} ₽</div>
                                            @endif
                                        </div>
                                    </div>
                                    <a class="card-apartment__link" href="{{route('house_detail', ['house' => $item])}}"></a>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="apartment-similar-swiper-pag"></div>
                    <div class="apartment-similar-swiper-prev"></div>
                    <div class="apartment-similar-swiper-next"></div>
                </div>
            </div>
        </section>
    @endif
    @include('partials.forms.questions')
    @include('partials.forms.apartment')
@endsection