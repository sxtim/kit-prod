<section class="filter section">
    <form action="{{route('commerce_list')}}" class="filter__form">
        <div class="filter__wrap">
            <!-- <div class="filter__search">
              <h3 class="filter__search-title">Поиск квартир</h3>
            </div> -->
            <div class="filter__tab-row">
                <div class="filter__col filter-mobile-top">
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
                    <div class="filter__el filter__hidden-elements active">
                        <div class='filter__dropdown' data-filter-key="transactionType">
                            <label class="filter__dropdown-menu">Тип сделки</label>
                            @if(isset($appliedFilter['transactionType']))
                                <div class="filter__dropdown-menu-btn">
                                    @foreach($appliedFilter['transactionType'] as $val)
                                        {{$val}}
                                        @if($loop->iteration != $loop->count), @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="filter__dropdown-menu-btn">Любой</div>
                            @endif
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-transaction-type-mobile">
                                    <label for="any-transaction-type-mobile">Любой</label>
                                </div>
                                @foreach($filter['type'] as $value)
                                    <div class="input_field" data-filter-group="transactionType">
                                        <input type="checkbox" class="custom-checkbox" id="mobile-{{$value}}" data-value="{{$value}}" @if(isset($appliedFilter['transactionType']) && in_array($value, $appliedFilter['transactionType'])) checked @endif>
                                        <label for="mobile-{{$value}}">{{$value}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button class="filter__show-all-btn btn btn-green">Все фильтры</button>
                </div>
                <div class="filter__col">
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
                    <div class="filter__el filter__hidden-elements">
                        <div class='filter__dropdown' data-filter-key="transactionType">
                            <label class="filter__dropdown-menu">Тип сделки</label>
                            @if(isset($appliedFilter['transactionType']))
                                <div class="filter__dropdown-menu-btn">
                                    @foreach($appliedFilter['transactionType'] as $val)
                                        {{$val}}
                                        @if($loop->iteration != $loop->count), @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="filter__dropdown-menu-btn">Любой</div>
                            @endif
                            <div class="filter__dropdown-content">
                                <div class="input_field all-input-field">
                                    <input type="checkbox" class="custom-checkbox checked" id="any-transaction-type">
                                    <label for="any-transaction-type">Любой</label>
                                </div>
                                @foreach($filter['type'] as $value)
                                    <div class="input_field" data-filter-group="transactionType">
                                        <input type="checkbox" class="custom-checkbox" id="{{$value}}" data-value="{{$value}}" @if(isset($appliedFilter['transactionType']) && in_array($value, $appliedFilter['transactionType'])) checked @endif>
                                        <label for="{{$value}}">{{$value}}</label>
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
                        <div class="filter__range-slider" id="commerce-square-slider" data-min="{{$filter['square']['min']}}" data-max="{{$filter['square']['max']}}" data-step="0.1"
                             @if(isset($appliedFilter['commerceSquare']) && isset($appliedFilter['commerceSquare']['min'])) data-start-min="{{$appliedFilter['commerceSquare']['min']}}" @endif
                             @if(isset($appliedFilter['commerceSquare']) && isset($appliedFilter['commerceSquare']['max'])) data-start-max="{{$appliedFilter['commerceSquare']['max']}}" @endif
                        >
                        </div>
                    </div>
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
                                    <input type="checkbox" class="custom-checkbox checked" id="commerce-all-dates">
                                    <label for="commerce-all-dates">Все даты</label>
                                </div>
                                @foreach($filter['lease'] as $val)
                                    <div class="input_field" data-filter-group="deliveryDate">
                                        <input type="checkbox" class="custom-checkbox" id="{{$val}}" data-value="{{$val}}" @if(isset($appliedFilter['deliveryDate']) && in_array($val, $appliedFilter['deliveryDate'])) checked @endif>
                                        <label for="{{$val}}">{{$val}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__col">
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
                                    <input type="checkbox" class="custom-checkbox checked" id="commerce-any-address">
                                    <label for="commerce-any-address">Любой</label>
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
                             data-step="1"
                             @if(isset($appliedFilter['commercePrice']) && isset($appliedFilter['commercePrice']['min'])) data-start-min="{{$appliedFilter['commercePrice']['min']}}" @endif
                             @if(isset($appliedFilter['commercePrice']) && isset($appliedFilter['commercePrice']['max'])) data-start-max="{{$appliedFilter['commercePrice']['max']}}" @endif
                        >
                        </div>
                    </div>
                </div>
                <div class="filter__col">
                    <div class="filter__el">
                        <button class="filter__btn-commerce btn btn-green filter__submit-button" type="button">Показать</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>