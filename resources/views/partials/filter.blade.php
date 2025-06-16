@if(!empty($filter))
    <form action="{{route('house_list')}}" method="get" class="filter__form">
    <div class="filter__wrap">
        <div class="filter__tab-row">
            <div class="filter__col filter-mobile-top">
                <div class="filter__el filter__hidden-elements active">
                    <h4 class="filter__row-title">Комнаты</h4>
                    <div class="filter__row-el-btns-container">
                        @foreach($filter['rooms'] as $val)
                            <button class="filter__el-btns btn-small @if(isset($appliedFilter['rooms']) && in_array($val, $appliedFilter['rooms'])) active @endif" type="button" data-room="{{$val}}">{{$val}}к</button>
                        @endforeach
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements active">
                    <div class='filter__dropdown' data-filter-key="project">
                        <label class="filter__dropdown-menu">Проект</label>
                        @if(isset($appliedFilter['project']))
                            <div class="filter__dropdown-menu-btn">
                                @foreach($appliedFilter['project'] as $i => $id)
                                    @foreach($filter['projects'] as $iProject => $item)
                                        @if($id == $item->id)
                                            {{$item->title . ' ' . $item->address}}
                                            @if($loop->iteration != $loop->count), @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @else
                            <div class="filter__dropdown-menu-btn">Любой</div>
                        @endif
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-project-mobile">
                                <label for="any-project-mobile">Любой</label>
                            </div>
                            @foreach($filter['projects'] as $item)
                                <div class="input_field" data-filter-group="project">
                                    <input type="checkbox" class="custom-checkbox" id="{{$item->id}}-project-mobile" data-value="{{$item->id}}" @if(isset($appliedFilter['project']) && in_array($item->id, $appliedFilter['project'])) checked @endif>
                                    <label for="{{$item->id}}-project-mobile">{{$item->title . ' ' . $item->address}}</label>
                                </div>
                            @endforeach
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
                            <button type="button" class="filter__el-btns btn-small @if(isset($appliedFilter['rooms']) && in_array($val, $appliedFilter['rooms'])) active @endif" data-room="{{$val}}">{{$val}}к</button>
                        @endforeach
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown' data-filter-key="project">
                        <label class="filter__dropdown-menu">Проект</label>
                        @if(isset($appliedFilter['project']))
                            <div class="filter__dropdown-menu-btn">
                                @foreach($appliedFilter['project'] as $i => $id)
                                    @foreach($filter['projects'] as $iProject => $item)
                                        @if($id == $item->id)
                                            {{$item->title . ' ' . $item->address}}
                                            @if($loop->iteration != $loop->count), @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @else
                            <div class="filter__dropdown-menu-btn">Любой</div>
                        @endif
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-project">
                                <label for="any-project">Любой</label>
                            </div>
                            @foreach($filter['projects'] as $item)
                                <div class="input_field" data-filter-group="project">
                                    <input type="checkbox" class="custom-checkbox" id="{{$item->id}}-project" data-value="{{$item->id}}" @if(isset($appliedFilter['project']) && in_array($item->id, $appliedFilter['project'])) checked @endif>
                                    <label for="{{$item->id}}-project">{{$item->title . ' ' . $item->address}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown' data-filter-key="deliveryDate">
                        <label class="filter__dropdown-menu">Сдача</label>
                        @if(isset($appliedFilter['deliveryDate']))
                            <div class="filter__dropdown-menu-btn">
                                @foreach($appliedFilter['deliveryDate'] as $val)
                                    {{$val}}
                                    @if($loop->iteration != $loop->count), @endif
                                @endforeach
                            </div>
                        @else
                            <div class="filter__dropdown-menu-btn">Все даты</div>
                        @endif
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="all-dates">
                                <label for="all-dates">Все даты</label>
                            </div>
                            @foreach($filter['time'] as $val)
                                <div class="input_field">
                                    <input type="checkbox" class="custom-checkbox" id="{{$val}}" data-value="{{$val}}" @if(isset($appliedFilter['deliveryDate']) && in_array($val, $appliedFilter['deliveryDate'])) checked @endif>
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
                            <input type="number" class="filter-slider__input" id="input-floor-min" 
                                @if(isset($appliedFilter['floor']) && isset($appliedFilter['floor']['min'])) value="{{$appliedFilter['floor']['min']}}" @endif>
                        </label>

                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="number" class="filter-slider__input" id="input-floor-max"
                                @if(isset($appliedFilter['floor']) && isset($appliedFilter['floor']['max'])) value="{{$appliedFilter['floor']['max']}}" @endif>
                        </label>
                    </div>
                    <div class="filter__range-slider" id="floor-slider" 
                        data-min="{{$filter['floor']['min']}}" 
                        data-max="{{$filter['floor']['max']}}" 
                        data-step="1"
                        @if(isset($appliedFilter['floor']) && isset($appliedFilter['floor']['min'])) data-start-min="{{$appliedFilter['floor']['min']}}" @endif
                        @if(isset($appliedFilter['floor']) && isset($appliedFilter['floor']['max'])) data-start-max="{{$appliedFilter['floor']['max']}}" @endif>
                    </div>
                </div>
            </div>
            <div class="filter__col">
                <div class="filter__el filter__hidden-elements">
                    <h4 class="filter__row-title">Площадь, м2</h4>
                    <div class="filter-slider__inputs">
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">от</span>
                            <input type="number" step="0.1" class="filter-slider__input" id="input-square-min"
                                @if(isset($appliedFilter['square']) && isset($appliedFilter['square']['min'])) value="{{$appliedFilter['square']['min']}}" @endif>
                        </label>

                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="number" step="0.1" class="filter-slider__input" id="input-square-max"
                                @if(isset($appliedFilter['square']) && isset($appliedFilter['square']['max'])) value="{{$appliedFilter['square']['max']}}" @endif>
                        </label>
                    </div>
                    <div class="filter__range-slider" id="square-slider" 
                        data-min="{{$filter['square']['min']}}" 
                        data-max="{{$filter['square']['max']}}" 
                        data-step="0.1"
                        @if(isset($appliedFilter['square']) && isset($appliedFilter['square']['min'])) data-start-min="{{$appliedFilter['square']['min']}}" @endif
                        @if(isset($appliedFilter['square']) && isset($appliedFilter['square']['max'])) data-start-max="{{$appliedFilter['square']['max']}}" @endif>
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown' data-filter-key="address">
                        <label class="filter__dropdown-menu">Адрес</label>
                        @if(isset($appliedFilter['address']))
                            <div class="filter__dropdown-menu-btn">
                                @foreach($appliedFilter['address'] as $val)
                                    {{$val}}
                                    @if($loop->iteration != $loop->count), @endif
                                @endforeach
                            </div>
                        @else
                            <div class="filter__dropdown-menu-btn">Любой</div>
                        @endif
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="any-address">
                                <label for="any-address">Любой</label>
                            </div>
                            @foreach($filter['address'] as $val)
                                <div class="input_field" data-filter-group="address">
                                    <input type="checkbox" class="custom-checkbox" id="{{$val}}" data-value="{{$val}}" @if(isset($appliedFilter['address']) && in_array($val, $appliedFilter['address'])) checked @endif>
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
                            <input type="text" class="filter-slider__input" id="input-price-min"
                                @if(isset($appliedFilter['price']) && isset($appliedFilter['price']['min'])) value="{{$appliedFilter['price']['min']}}" @endif>
                            <span class="filter-slider__text">₽</span>
                        </label>
                        <label class="filter-slider__label">
                            <span class="filter-slider__text">до</span>
                            <input type="text" class="filter-slider__input" id="input-price-max"
                                @if(isset($appliedFilter['price']) && isset($appliedFilter['price']['max'])) value="{{$appliedFilter['price']['max']}}" @endif>
                            <span class="filter-slider__text">₽</span>
                        </label>
                    </div>
                    <div class="filter__range-slider" id="price-slider" 
                        data-min="{{$filter['base_price']['min']}}" 
                        data-max="{{$filter['base_price']['max']}}" 
                        data-step="1"
                        @if(isset($appliedFilter['price']) && isset($appliedFilter['price']['min'])) data-start-min="{{$appliedFilter['price']['min']}}" @endif
                        @if(isset($appliedFilter['price']) && isset($appliedFilter['price']['max'])) data-start-max="{{$appliedFilter['price']['max']}}" @endif>
                    </div>
                </div>
                <div class="filter__el filter__hidden-elements">
                    <div class='filter__dropdown' data-filter-key="features">
                        <label class="filter__dropdown-menu">Особенности</label>
                        <div class="filter__dropdown-menu-btn">Все особенности</div>
                        <div class="filter__dropdown-content">
                            <div class="input_field all-input-field">
                                <input type="checkbox" class="custom-checkbox checked" id="all-features">
                                <label for="all-features">Все особенности</label>
                            </div>
                            <div class="input_field" data-filter-group="features">
                                <input type="checkbox" class="custom-checkbox" id="feature-keys" data-value="keys">
                                <label for="feature-keys">С ключами</label>
                            </div>
                            <div class="input_field" data-filter-group="features">
                                <input type="checkbox" class="custom-checkbox" id="feature-family" data-value="family">
                                <label for="feature-family">Для семей</label>
                            </div>
                            <div class="input_field" data-filter-group="features">
                                <input type="checkbox" class="custom-checkbox" id="feature-windows" data-value="windows">
                                <label for="feature-windows">Окна на 2 стороны</label>
                            </div>
                            <div class="input_field" data-filter-group="features">
                                <input type="checkbox" class="custom-checkbox" id="feature-wardrobes" data-value="wardrobes">
                                <label for="feature-wardrobes">С гардеробными</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__el ">
                    <button class="filter__btn-apartment btn btn-green filter__submit-button" type="button">Показать</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif