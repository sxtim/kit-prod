@use(Diglactic\Breadcrumbs\Breadcrumbs)
@extends('layouts.main')
@section('title', 'Избранное')
@section('content')
    {{Breadcrumbs::render()}}
    <div class="container">
        <h1 class="title">ИЗБРАННОЕ</h1>
        <div data-tab-component>
            <div class="tab-btns-container favorites-tab-btns" role="tablist" aria-label="Tabbed content">
                <button role="tab" aria-selected="true" aria-controls="favorites-tab-apartments" id="favorites-tab-apart">
                    <h3 class="tab-title">Квартиры</h3>
                </button>
                <button role="tab" aria-selected="false" aria-controls="favorites-tab-commerce" id="favorites-tab-comm">
                    <h3 class="tab-title">Коммерческие помещения</h3>
                </button>
            </div>
            <div class="tab-content-container">
                <section id="favorites-tab-apartments" role="tabpanel" aria-labelledby="tab-apart" tabindex="0">
                    <div class="catalog-sort">
                        <div class="catalog-sort__dropdown filter__dropdown">
                            <label class="filter__dropdown-menu">Сортировать</label>
                            <div class="filter__dropdown-menu-btn">Сначала дешевле</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field sort-item selected" data-sort="price-asc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-price-asc" checked>
                                    <label for="sort-apartment-price-asc">Сначала дешевле</label>
                                </div>
                                <div class="input_field sort-item" data-sort="price-desc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-price-desc">
                                    <label for="sort-apartment-price-desc">Сначала дороже</label>
                                </div>
                                <div class="input_field sort-item" data-sort="date-desc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-date-desc">
                                    <label for="sort-apartment-date-desc">Срок сдачи (позже)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="date-asc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-date-asc">
                                    <label for="sort-apartment-date-asc">Срок сдачи (раньше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="area-desc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-area-desc">
                                    <label for="sort-apartment-area-desc">Площадь (больше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="area-asc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-area-asc">
                                    <label for="sort-apartment-area-asc">Площадь (меньше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="floor-desc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-floor-desc">
                                    <label for="sort-apartment-floor-desc">Этаж (выше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="floor-asc">
                                    <input type="radio" name="sort-apartment" id="sort-apartment-floor-asc">
                                    <label for="sort-apartment-floor-asc">Этаж (ниже)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cards-wrapper-col4">
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                        <article class="card-apartment">
                            <div class="card-apartment_header">
                                <div class="card-apartment__info">
                                    <div>
                                        <p><span>1-комнатная</span></p>

                                        <p>Кв. № <span>5</span> &nbsp; &nbsp;<span>50,4 м²</span></p>
                                    </div>
                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="card-apartment__delivery">
                                    <p>Сдача <span>2 кв. 2024г.</span></p>
                                    <p>Этаж <span>5 из 25</span></p>
                                </div>
                            </div>
                            <div class="card-apartment__body">
                                <img src="./img/apartments/apartment-one.png" alt="Floor Plan" />
                                <div class="card-apartment__details"></div>
                            </div>
                            <div class="card-apartment__footer">
                                <div class="card-apartment__address">
                                    <span>ЖК СПУТНИК</span><br />
                                    ул. Летчика Филипова д.6 ул. Летчика Филипова д.6
                                </div>
                                <div class="card-apartment__price-wrap">
                                    <div class="card-apartment__price">15 700 000 ₽</div>
                                    <div class="card-apartment__price-disc">15 700 000 ₽</div>
                                    <!--      <a href="apartment.html" class="btn btn-green">Выбрать</a>-->

                                </div>
                            </div>
                            <a class="card-apartment__link" href="apartment.html"></a>
                        </article>
                    </div>
                </section>
                <section id="favorites-tab-commerce" role="tabpanel" aria-labelledby="tab-comm" tabindex="0"
                         aria-hidden="true">
                    <div class="catalog-sort">
                        <div class="catalog-sort__dropdown filter__dropdown">
                            <label class="filter__dropdown-menu">Сортировать</label>
                            <div class="filter__dropdown-menu-btn">Сначала дешевле</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field sort-item selected" data-sort="price-asc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-price-asc" checked>
                                    <label for="sort-commerce-price-asc">Сначала дешевле</label>
                                </div>
                                <div class="input_field sort-item" data-sort="price-desc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-price-desc">
                                    <label for="sort-commerce-price-desc">Сначала дороже</label>
                                </div>
                                <div class="input_field sort-item" data-sort="area-desc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-area-desc">
                                    <label for="sort-commerce-area-desc">Площадь (больше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="area-asc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-area-asc">
                                    <label for="sort-commerce-area-asc">Площадь (меньше)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="date-desc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-date-desc">
                                    <label for="sort-commerce-date-desc">Срок сдачи (позже)</label>
                                </div>
                                <div class="input_field sort-item" data-sort="date-asc">
                                    <input type="radio" name="sort-commerce" id="sort-commerce-date-asc">
                                    <label for="sort-commerce-date-asc">Срок сдачи (раньше)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cards-wrapper-col4">
                        <article class="card-commerce card-box">
                            <div class="card-commerce__picture">

                                <!--      <div class="card-zhk-main__status">@@status</div>-->
                                <div class="card-commerce__details">Аренда/Продажа</div>


                                <img src="./img/complexes/zhk-sputnik1.jpg" alt="card-img">
                            </div>
                            <div class="card-commerce__desc">
                                <div class="card-commerce__desc-row">
                                    <div class="card-commerce__desc-col">
                                        <div class="card-commerce__title">Торговое помещение</div>
                                        <div class="card-commerce__sub-title">ул. Летчика Филипова д.8</div>
                                    </div>

                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </div>

                                <div class="card-commerce__row">
                                    <div class="card-commerce__info-container">
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Площадь, м2</div>
                                            <div class="card-commerce__info-value">1 550</div>
                                        </div>
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Сдача</div>
                                            <div class="card-commerce__info-value">2 кв. 2024г.</div>
                                        </div>
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Цена от</div>
                                            <div class="card-commerce__info-value">400 000 р/мес</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="commerce.html" class="card-commerce__link"></a>
                        </article>
                        <article class="card-commerce card-box">
                            <div class="card-commerce__picture">

                                <!--      <div class="card-zhk-main__status">@@status</div>-->
                                <div class="card-commerce__details">Аренда/Продажа</div>


                                <img src="./img/complexes/zhk-sputnik1.jpg" alt="card-img">
                            </div>
                            <div class="card-commerce__desc">
                                <div class="card-commerce__desc-row">
                                    <div class="card-commerce__desc-col">
                                        <div class="card-commerce__title">Торговое помещение</div>
                                        <div class="card-commerce__sub-title">ул. Летчика Филипова д.8</div>
                                    </div>

                                    <svg class='card-favorite' width="32" height="29" viewBox="0 0 32 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5924 5.04075C12.8131 1.8018 8.16889 0.80082 4.68664 3.76673C1.20438 6.73264 0.714123 11.6914 3.44876 15.1993C5.72243 18.1157 12.6033 24.2669 14.8585 26.2578C15.1108 26.4805 15.237 26.5919 15.3842 26.6356C15.5125 26.6737 15.6531 26.6737 15.7816 26.6356C15.9288 26.5919 16.0548 26.4805 16.3072 26.2578C18.5624 24.2669 25.4432 18.1157 27.7169 15.1993C30.4515 11.6914 30.0211 6.70144 26.479 3.76673C22.9369 0.83202 18.3716 1.8018 15.5924 5.04075Z" stroke="#8C8C8C" stroke-width="3.0891" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </div>

                                <div class="card-commerce__row">
                                    <div class="card-commerce__info-container">
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Площадь, м2</div>
                                            <div class="card-commerce__info-value">1 550</div>
                                        </div>
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Сдача</div>
                                            <div class="card-commerce__info-value">2 кв. 2024г.</div>
                                        </div>
                                        <div class="card-commerce__info-item">
                                            <div class="card-commerce__info-title">Цена от</div>
                                            <div class="card-commerce__info-value">400 000 р/мес</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="commerce.html" class="card-commerce__link"></a>
                        </article>
                    </div>
                </section>
            </div>
        </div>

    </div>
    @include('partials.forms.questions')
@endsection