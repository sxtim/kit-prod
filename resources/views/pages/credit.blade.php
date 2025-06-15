@extends('layouts.main')
@section('title', 'Ипотека')
@section('content')
    <section class="mortgage section">
        <div class="container">
            <div class="mortgage__header">
                <h1 class="mortgage__title title">Ипотека</h1>
                <p class="mortgage__subtitle">Реальная возможность приобрести качественное жильё напрямую от застройщика и
                    улучшить жилищные условия</p>
            </div>

            <div class="mortgage__advantages">
                <div class="mortgage__advantage">
                    <div class="mortgage__advantage-number">1</div>
                    <div class="mortgage__advantage-text">Ставка от 6%</div>
                </div>
                <div class="mortgage__advantage">
                    <div class="mortgage__advantage-number">2</div>
                    <div class="mortgage__advantage-text">Первоначальный взнос от 20.1%</div>
                </div>
                <div class="mortgage__advantage">
                    <div class="mortgage__advantage-number">3</div>
                    <div class="mortgage__advantage-text">5 банков партнеров</div>
                </div>
                <div class="mortgage__advantage">
                    <div class="mortgage__advantage-number">4</div>
                    <div class="mortgage__advantage-text">Работаем с ведущими банками страны</div>
                </div>
            </div>
        </div>
    </section>
    @include('partials.mortgage')
    <section class="section mortgage-types">
        <div class="container">
            <h2 class="title title-no-line">Варианты приобретения жилья</h2>

            <div class="mortgage-types__tabs tabs">
                <div class="mortgage-types__tabs-nav tabs__nav">
                    <button class="mortgage-types__tab-btn tabs__nav-btn tabs__nav-btn--active" data-tab="base">Ипотека</button>
                    <button class="mortgage-types__tab-btn tabs__nav-btn" data-tab="military">Военная ипотека</button>
                    <button class="mortgage-types__tab-btn tabs__nav-btn" data-tab="family">Семейная ипотека</button>
                    <button class="mortgage-types__tab-btn tabs__nav-btn" data-tab="maternal">Материнский капитал</button>
                    <button class="mortgage-types__tab-btn tabs__nav-btn" data-tab="it">Ипотека IT</button>
                </div>

                <div class="mortgage-types__content tabs__content">
                    <div class="mortgage-types__tab-content tabs__content-item tabs__content-item--active"
                         data-tab-content="base">
                        <h3 class="mortgage-types__subtitle">Условия кредитования</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">валюта кредита - Рубли РФ;</li>
                            <li class="mortgage-types__list-item">сумма кредита - 500 тыс. – 30 млн ₽;</li>
                            <li class="mortgage-types__list-item">срок кредита - от 3 до 30 лет;</li>
                            <li class="mortgage-types__list-item">первоначальный взнос - от 19.8%;</li>
                            <li class="mortgage-types__list-item">можно использовать материнский капитал.</li>
                        </ul>

                        <h3 class="mortgage-types__subtitle">Субсидированная ипотека от застройщика</h3>
                        <p class="mortgage-types__text">Мы активно работаем с банками по любым ипотечным программам. На отдельные
                            объекты застройщик субсидирует <strong>снижение</strong> ипотечной ставки для покупателя.</p>

                        <h3 class="mortgage-types__subtitle">Обеспечение по кредиту</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">залог кредитуемого или иного жилого помещения;</li>
                            <li class="mortgage-types__list-item">до оформления залога нужно оформить залог имущественных прав или
                                поручительство физлиц.</li>
                        </ul>

                        <div class="mortgage-types__info">
                            <div class="mortgage-types__info-title">Требования к заёмщикам</div>
                            <div class="mortgage-types__info-text">возраст на момент предоставления кредита - от 21 до 60 лет
                                включительно на дату подачи заявки;</div>
                            <div class="mortgage-types__info-text">возраст на момент погашения кредита - 75 лет;</div>
                            <div class="mortgage-types__info-text">стаж работы - не менее 3 месяцев на текущем месте работы;</div>
                            <div class="mortgage-types__info-text">гражданство - Российская Федерация.</div>
                        </div>
                    </div>

                    <div class="mortgage-types__tab-content tabs__content-item" data-tab-content="military">
                        <h3 class="mortgage-types__subtitle">Для военнослужащих</h3>
                        <ul class="mortgage-types__list">

                            <li class="mortgage-types__list-item">валюта кредита - Рубли РФ;</li>
                            <li class="mortgage-types__list-item">мин. сумма кредита - 300 000 ₽;</li>
                            <li class="mortgage-types__list-item">макс. сумма кредита - в зависимости от банка кредитора;</li>
                            <li class="mortgage-types__list-item">срок кредита - до 25 лет;</li>
                            <li class="mortgage-types__list-item">первоначальный взнос - от 15,1%;</li>
                            <li class="mortgage-types__list-item">обеспечение по кредиту - залог кредитуемого жилого помещения;</li>
                            <li class="mortgage-types__list-item">страхование - обязательно для залогового имущества.</li>
                        </ul>

                        <div class="mortgage-types__info">
                            <div class="mortgage-types__info-title">Требования к заёмщикам</div>
                            <div class="mortgage-types__info-text">возраст на момент предоставления кредита - не менее 21 года;
                            </div>
                            <div class="mortgage-types__info-text">возраст на момент погашения кредита - 75 лет;</div>
                            <div class="mortgage-types__info-text">военнослужащий со свидетельством участника НИС;</div>
                            <div class="mortgage-types__info-text">гражданство - Российская Федерация.</div>
                        </div>
                    </div>

                    <div class="mortgage-types__tab-content tabs__content-item" data-tab-content="family">
                        <h3 class="mortgage-types__subtitle">Семейная ипотека</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">первоначальный взнос - от 20,1%;</li>
                            <li class="mortgage-types__list-item">двалюта кредита - Рубли РФ;</li>
                            <li class="mortgage-types__list-item">мин. сумма кредита - 300 000 ₽;</li>
                            <li class="mortgage-types__list-item">срок кредита - до 30 лет.</li>
                        </ul>

                        <div class="mortgage-types__info">
                            <div class="mortgage-types__info-title">Требования к заёмщикам</div>
                            <div class="mortgage-types__info-text">от 21 до 60 лет включительно на дату подачи заявки и
                                предоставления кредита;</div>
                            <div class="mortgage-types__info-text">до 75 лет включительно на дату погашения кредита;</div>
                            <div class="mortgage-types__info-text">стаж работы - не менее 3 месяцев на текущем месте работы;</div>
                            <div class="mortgage-types__info-text">ребенок, гражданин РФ, не достигший возраста 7 лет на дату
                                кредитного договора;</div>
                            <div class="mortgage-types__info-text">ребенок с категорией «ребенок-инвалид», являющийся гражданином
                                РФ.</div>
                        </div>
                    </div>

                    <div class="mortgage-types__tab-content tabs__content-item" data-tab-content="maternal">
                        <h3 class="mortgage-types__subtitle">Материнский (семейный) капитал – мера государственной поддержки
                            семей.</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">в период с 1 января 2007 года по 31 декабря 2030 года родился или
                                был усыновлен второй (третий и последующий) ребенок;</li>
                            <li class="mortgage-types__list-item">либо начиная с 1 января 2020 года родился (был усыновлен) первый
                                ребенок.</li>
                            <li class="mortgage-types__list-item">сочетание с программой "Семейная ипотека";</li>
                            <li class="mortgage-types__list-item">Программа материнского капитала действует по 31 декабря 2026 года
                                (ч. 1 ст. 13 Федерального закона от 29 декабря 2006 г. № 256-ФЗ "О дополнительных мерах
                                государственной поддержки семей, имеющих детей"</li>
                        </ul>

                        <h3 class="mortgage-types__subtitle">Маткапитал в 2025 году</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">690 266,95 рубля на первого ребенка, рожденного или усыновленного
                                с 2020 года, или на второго ребенка, если он появился раньше 2020 года;</li>
                            <li class="mortgage-types__list-item">912 162,09 рубля получат семьи, где второй ребенок родился или
                                усыновлен с 2020 года, а до его появления права на маткапитал у семьи не было;</li>
                            <li class="mortgage-types__list-item">221 895,14 рубля - при рождении второго ребенка, если и первый, и
                                второй появились с 2020 года.</li>
                            <li class="mortgage-types__list-item">Программа материнского капитала действует по 31 декабря 2026 года
                                (ч. 1 ст. 13 Федерального закона от 29 декабря 2006 г. № 256-ФЗ "О дополнительных мерах
                                государственной поддержки семей, имеющих детей"</li>
                        </ul>

                        <h3 class="mortgage-types__subtitle">Получить выплату могут:</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">женщины, которые родили или усыновили первого ребенка после 1
                                января 2020 года;</li>
                            <li class="mortgage-types__list-item">женщины, которые родили или усыновили второго или последующего
                                ребенка после 1 января 2007 года;</li>
                            <li class="mortgage-types__list-item">мужчины, которые являются единственными усыновителями первого
                                ребенка, если решение суда вступило в силу после 1 января 2020 года;</li>
                            <li class="mortgage-types__list-item">мужчинам, которые являются единственными усыновителями второго или
                                последующего ребенка, если решение суда вступило в силу после 1 января 2007 года.</li>
                        </ul>

                        <div class="mortgage-types__info">
                            <div class="mortgage-types__info-title">На что можно направить средства</div>
                            <div class="mortgage-types__info-text">на улучшение жилищных условий;</div>
                            <div class="mortgage-types__info-text">на образование детей;</div>
                            <div class="mortgage-types__info-text">на формирование накопительной пенсии мамы;</div>
                            <div class="mortgage-types__info-text">на приобретение товаров и услуг, предназначенных для социальной
                                адаптации и интеграции в общество детей с инвалидностью;</div>

                        </div>

                    </div>

                    <div class="mortgage-types__tab-content tabs__content-item" data-tab-content="it">
                        <h3 class="mortgage-types__subtitle">Условия кредитования</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">валюта кредита - Рубли РФ;</li>
                            <li class="mortgage-types__list-item">первоначальный взнос - от 20,1%;</li>
                            <li class="mortgage-types__list-item">мин. сумма кредита - 300 000 ₽;</li>
                            <li class="mortgage-types__list-item">макс. сумма кредита: <br> до 9 000 000 рублей — Можно оформить
                                ипотечный кредит и до 18 млн рублей. Но, в таком случае, в части кредита выше установленного
                                госпрограммой лимита (9 млн рублей) будет действовать рыночная процентная ставка. </li>
                            <li class="mortgage-types__list-item">срок кредита - до 30 лет;</li>
                        </ul>

                        <h3 class="mortgage-types__subtitle">Условия кредитования</h3>
                        <ul class="mortgage-types__list">
                            <li class="mortgage-types__list-item">залог кредитуемой квартиры</li>
                            <li class="mortgage-types__list-item">обязательно нужно застраховать недвижимость. Исключение, если у
                                вас участок.</li>

                        </ul>

                        <div class="mortgage-types__info">
                            <div class="mortgage-types__info-title">Требования к заемщику</div>
                            <div class="mortgage-types__info-text">Возраст от 22 до 45 лет, стаж работы в IT-компании не менее 3
                                месяцев</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mortgage-types__requirements">
                <div class="mortgage-types__note">
                    * Ипотека предоставляется Банками, согласно Законодательству РФ. Вся информация носит справочный характер.
                    Итоговые условия уточняйте непосредственно у кредитных организаций.
                </div>
            </div>
        </div>
    </section>
    <section class="section mortgage-process">
        <div class="container">
            <h2 class="title">Как купить квартиру в ипотеку?</h2>
            <div class="mortgage-process__steps">
                <div class="mortgage-process__step">

                    <div class="mortgage-process__step-title">Расчет условий ипотеки</div>
                    <div class="mortgage-process__step-description">Внесите необходимые данные и наш калькулятор автоматически
                        подсчитает сумму ежемесячного платежа, процентную ставку, срок кредита по самым выгодным ипотечным
                        предложениям от банков.</div>
                </div>
                <div class="mortgage-process__step">

                    <div class="mortgage-process__step-title">Отправка заявки</div>
                    <div class="mortgage-process__step-description">Мы передаем ваш запрос во множество банков. Это повышает
                        ваши шансы на получение одобрения по наиболее выгодным условиям.</div>
                </div>
                <div class="mortgage-process__step">

                    <div class="mortgage-process__step-title">Заключение сделки</div>
                    <div class="mortgage-process__step-description">Когда все документы будут подписаны, а заявка одобрена, вы
                        официально станете владельцем своей собственной квартиры!</div>
                </div>
                <div class="mortgage-process__step">

                    <div class="mortgage-process__step-title">Получение ключей и заселение</div>
                    <div class="mortgage-process__step-description">Теперь перед вами открыты двери в новую главу вашей жизни,
                        где вы сможете воплотить свои мечты и наслаждаться независимостью и комфортом.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mortgage-documents">
        <div class="container">
            <h2 class="title">Какие документы нужны для подачи заявки на ипотеку?</h2>
            <div class="mortgage-documents__items">
                <div class="mortgage-documents__item">
                    <div class="mortgage-documents__item-icon">
                        <img src="/assets/img/icons/passport.svg" alt="Паспорт">
                    </div>
                    <div class="mortgage-documents__item-text">
                        <p>Паспорт. Оригинал паспорта заемщика вместе с ксерокопиями всех страниц документа</p>
                    </div>
                </div>
                <div class="mortgage-documents__item">
                    <div class="mortgage-documents__item-icon">
                        <img src="/assets/img/icons/snils.svg" alt="СНИЛС">
                    </div>
                    <div class="mortgage-documents__item-text">
                        <p>СНИЛС. Страховой номер индивидуального лицевого счета гражданина</p>
                    </div>
                </div>
                <div class="mortgage-documents__item">
                    <div class="mortgage-documents__item-icon">
                        <img src="/assets/img/icons/inn.svg" alt="ИНН">
                    </div>
                    <div class="mortgage-documents__item-text">
                        <p>ИНН. Идентификационный номер налогоплательщика</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mortgage-faq details-group section">
        <div class="container">
            <h2 class="title">Вопросы и ответы</h2>
            @foreach($questions as $item)
                <details class="details">
                    <summary class="details__summary">
                        {{$item->question}}
                    </summary>
                    <div class="details__content">
                        {!! $item->answer !!}
                    </div>
                </details>
            @endforeach
        </div>
    </section>
    @include('partials.forms.questions')
@endsection