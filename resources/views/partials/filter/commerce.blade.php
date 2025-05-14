<section class="filter section">
    <form action="">
        <div class="filter__wrap">
            <!-- <div class="filter__search">
              <h3 class="filter__search-title">Поиск квартир</h3>
            </div> -->
            <div class="filter__tab-row">
                <div class="filter__col filter-mobile-top">
                    <div class="filter__el filter__hidden-elements active">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Проект</label>
                            <div class="filter__dropdown-menu-btn">Любой</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-commerce-project-mobile">
                                    <label for="any-commerce-project-mobile">Любой</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-2-mobile">
                                    <label for="commerce-project-2-mobile">Проект 2</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-3-mobile">
                                    <label for="commerce-project-3-mobile">Проект 3</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-4-mobile">
                                    <label for="commerce-project-4-mobile">Проект 4</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-5-mobile">
                                    <label for="commerce-project-5-mobile">Проект 5</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-6-mobile">
                                    <label for="commerce-project-6-mobile">Проект 6</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__el filter__hidden-elements active">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Тип сделки</label>
                            <div class="filter__dropdown-menu-btn">Любой</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-transaction-type-mobile">
                                    <label for="any-transaction-type-mobile">Любой</label>
                                </div>
                                @foreach($filter['type'] as $value)
                                    <div class="input_field">
                                        <input type="checkbox" class="custom-checkbox" id="transaction-sale-mobile">
                                        <label for="transaction-sale-mobile">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button class="filter__show-all-btn btn btn-green">Все фильтры</button>
                </div>
                <div class="filter__col">
                    <div class="filter__el filter__hidden-elements">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Проект</label>
                            <div class="filter__dropdown-menu-btn">Любой</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-commerce-project">
                                    <label for="any-commerce-project">Любой</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-2">
                                    <label for="commerce-project-2">Проект 2</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-3">
                                    <label for="commerce-project-3">Проект 3</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-4">
                                    <label for="commerce-project-4">Проект 4</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-5">
                                    <label for="commerce-project-5">Проект 5</label>
                                </div>
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="commerce-project-6">
                                    <label for="commerce-project-6">Проект 6</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__el filter__hidden-elements">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Тип сделки</label>
                            <div class="filter__dropdown-menu-btn">Любой</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-transaction-type">
                                    <label for="any-transaction-type">Любой</label>
                                </div>
                                @foreach($filter['type'] as $value)
                                    <div class="input_field">
                                        <input type="checkbox" class="custom-checkbox" id="transaction-sale">
                                        <label for="transaction-sale">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__col">
                    <div class="filter__el filter__hidden-elements">
                        <h4 class="filter__row-title">Площадь, м2</h4>
                        <div class="filter-slider__inputs">
                            <label class="filter-slider__label">
                                <span class="filter-slider__text">от</span>
                                <input type="number" step="0.1" class="filter-slider__input" id="commerce-input-square-min">
                            </label>

                            <label class="filter-slider__label">
                                <span class="filter-slider__text">до</span>
                                <input type="number" step="0.1" class="filter-slider__input" id="commerce-input-square-max">
                            </label>
                        </div>
                        <div class="filter__range-slider" id="commerce-square-slider" data-min="{{$filter['square']['min']}}" data-max="{{$filter['square']['max']}}" data-step="0.1">
                        </div>
                    </div>
                    <div class="filter__el filter__hidden-elements">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Сдача</label>
                            <div class="filter__dropdown-menu-btn">Все даты</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="commerce-all-dates">
                                    <label for="commerce-all-dates">Все даты</label>
                                </div>
                                @foreach($filter['lease'] as $val)
                                    <div class="input_field">
                                        <input type="checkbox" class="custom-checkbox" id="commerce-date-2">
                                        <label for="commerce-date-2">{{$val}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__col">
                    <div class="filter__el filter__hidden-elements">
                        <div class='filter__dropdown'>
                            <label class="filter__dropdown-menu">Адрес</label>
                            <div class="filter__dropdown-menu-btn">Любой</div>
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="commerce-any-address">
                                    <label for="commerce-any-address">Любой</label>
                                </div>
                                @foreach($filter['address'] as $val)
                                    <div class="input_field">
                                        <input type="checkbox" class="custom-checkbox" id="commerce-address-2">
                                        <label for="commerce-address-2">{{$val}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__el filter__hidden-elements">
                        <h4 class="filter__row-title">Цена, руб.</h4>
                        <div class="filter-slider__inputs">
                            <label class="filter-slider__label">
                                <span class="filter-slider__text">от</span>
                                <input type="text" class="filter-slider__input" id="commerce-input-price-min">
                                <span class="filter-slider__text">₽</span>
                            </label>
                            <label class="filter-slider__label">
                                <span class="filter-slider__text">до</span>
                                <input type="text" class="filter-slider__input" id="commerce-input-price-max">
                                <span class="filter-slider__text">₽</span>
                            </label>
                        </div>
                        <div class="filter__range-slider"
                             id="commerce-price-slider"
                             data-min="{{$filter['base_price']['min']}}"
                             data-max="{{$filter['base_price']['max']}}"
                             data-step="1">
                        </div>
                    </div>
                </div>
                <div class="filter__col">


                    <div class="filter__el">
                        <button class="filter__btn-commerce btn btn-green" type="submit">Показать</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>