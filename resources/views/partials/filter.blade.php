<form action="{{route('house_list')}}" method="get" data-type="form-handle">
    <div class="filter__wrap">
        <div class="filter__tab-row">
            <div class="filter__col filter-mobile-top">
                <div class="filter__el filter__hidden-elements active">
                    <h4 class="filter__row-title">Комнаты</h4>
                    <div class="filter__row-el-btns-container">
                        @foreach($filter['rooms'] as $val)
                            <button class="filter__el-btns btn-small">{{$val}}к</button>
                        @endforeach
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements active">
                    <div class='filter__dropdown'>
                        <label class="filter__dropdown-menu">Проект</label>
                        <div class="filter__dropdown-menu-btn">Любой</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-project-mobile">
                                <label for="any-project-mobile">Любой</label>
                            </div>
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-2-mobile">--}}
{{--                                <label for="project-2-mobile">Проект 2</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-3-mobile">--}}
{{--                                <label for="project-3-mobile">Проект 3</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-4-mobile">--}}
{{--                                <label for="project-4-mobile">Проект 4</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-5-mobile">--}}
{{--                                <label for="project-5-mobile">Проект 5</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-6-mobile">--}}
{{--                                <label for="project-6-mobile">Проект 6</label>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <button class="filter__show-all-btn btn btn-green">Все фильтры</button>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <h4 class="filter__row-title">Комнаты</h4>
                    <div class="filter__row-el-btns-container">
                        @foreach($filter['rooms'] as $val)
                            <button type="button" class="filter__el-btns btn-small">{{$val}}к</button>
                        @endforeach
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown'>
                        <label class="filter__dropdown-menu">Проект</label>
                        <div class="filter__dropdown-menu-btn">Любой</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-project">
                                <label for="any-project">Любой</label>
                            </div>
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-2">--}}
{{--                                <label for="project-2">Проект 2</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-3">--}}
{{--                                <label for="project-3">Проект 3</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-4">--}}
{{--                                <label for="project-4">Проект 4</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-5">--}}
{{--                                <label for="project-5">Проект 5</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="project-6">--}}
{{--                                <label for="project-6">Проект 6</label>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown'>
                        <label class="filter__dropdown-menu">Сдача</label>
                        <div class="filter__dropdown-menu-btn">Все даты</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="all-dates">
                                <label for="all-dates">Все даты</label>
                            </div>
                            @foreach($filter['time'] as $val)
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="{{$val}}">
                                    <label for="{{$val}}">{{$val}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <h4 class="filter__row-title">Этаж</h4>
                    <div class="filter-slider__inputs">
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">от</span>
                            <input type="number" min="{{$filter['floor']['min']}}" max="{{$filter['floor']['max']}}" class="filter-slider__input" id="input-floor-min">
                        </label>

                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="number" min="{{$filter['floor']['min']}}" max="{{$filter['floor']['max']}}" class="filter-slider__input" id="input-floor-max">
                        </label>
                    </div>
                    <div class="filter__range-slider" id="floor-slider">
                    </div>
                </div>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <h4 class="filter__row-title">Площадь, м2</h4>
                    <div class="filter-slider__inputs">
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">от</span>
                            <input type="number" min="{{$filter['square']['min']}}" max="{{$filter['square']['max']}}" class="filter-slider__input" id="input-square-min">
                        </label>

                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="number" min="{{$filter['square']['min']}}" max="{{$filter['square']['max']}}" class="filter-slider__input" id="input-square-max">
                        </label>
                    </div>
                    <div class="filter__range-slider" id="square-slider">
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown'>
                        <label class="filter__dropdown-menu">Адрес</label>
                        <div class="filter__dropdown-menu-btn">Любой</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-address">
                                <label for="any-address">Любой</label>
                            </div>
                            @foreach($filter['address'] as $val)
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="{{$val}}">
                                    <label for="{{$val}}">{{$val}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <h4 class="filter__row-title">Цена, руб.</h4>
                    <div class="filter-slider__inputs">
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">от</span>
                            <input type="text" min="{{$filter['base_price']['min']}}" max="{{$filter['base_price']['max']}}" class="filter-slider__input" id="input-price-min">
                            <span class="filter-slider__text">₽</span>
                        </label>
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="text" min="{{$filter['base_price']['min']}}" max="{{$filter['base_price']['max']}}" class="filter-slider__input" id="input-price-max">
                            <span class="filter-slider__text">₽</span>
                        </label>
                    </div>
                    <div class="filter__range-slider" id="price-slider">
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown'>
                        <label class="filter__dropdown-menu">Особенности</label>
                        <div class="filter__dropdown-menu-btn">Все особенности</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="all-features">
                                <label for="all-features">Все особенности</label>
                            </div>
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="feature-keys">--}}
{{--                                <label for="feature-keys">С ключами</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="feature-family">--}}
{{--                                <label for="feature-family">Для семей</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="feature-windows">--}}
{{--                                <label for="feature-windows">Окна на 2 стороны</label>--}}
{{--                            </div>--}}
{{--                            <div class="input_field">--}}
{{--                                <input type="checkbox" class="custom-checkbox" id="feature-wardrobes">--}}
{{--                                <label for="feature-wardrobes">С гардеробными</label>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="filter__el ">
                    <button class="filter__btn-apartment btn btn-green">Показать квартиры</button>
                </div>
            </div>
        </div>
    </div>
</form>