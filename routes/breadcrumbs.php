<?php

use App\Models\Commerce;
use App\Models\House;
use App\Models\Jk;
use App\Models\News;
use App\Models\Sales;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('about_company', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about_company'));
});

Breadcrumbs::for('uk', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('УК', route('uk'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts'));
});

Breadcrumbs::for('favorites', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Избранное', route('favorites'));
});

Breadcrumbs::for('house_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Выбрать квартиру', route('house_list'));
});

Breadcrumbs::for('house_detail', function (BreadcrumbTrail $trail, House $house) {
    $trail->parent('house_list');
    $trail->push('Квартира №' . $house->number, route('house_detail', $house));
});

Breadcrumbs::for('jk_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Жилые комплексы', route('jk_list'));
});

Breadcrumbs::for('sales_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Акции', route('sales_list'));
});

Breadcrumbs::for('sales_detail', function (BreadcrumbTrail $trail, Sales $item) {
    $trail->parent('sales_list');
    $trail->push($item->title, route('sales_detail', $item));
});

Breadcrumbs::for('news_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news_list'));
});

Breadcrumbs::for('news_detail', function (BreadcrumbTrail $trail, News $item) {
    $trail->parent('news_list');
    $trail->push($item->title, route('news_detail', $item));
});

Breadcrumbs::for('commerce_list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Коммерция', route('commerce_list'));
});

Breadcrumbs::for('commerce_detail', function (BreadcrumbTrail $trail, Commerce $item) {
    $trail->parent('commerce_list');
    $trail->push($item->title, route('commerce_detail', $item));
});

Breadcrumbs::for('agreement_opd', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Согласие на обработку персональных данных', route('agreement_opd'));
});

Breadcrumbs::for('agreement_ym', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Согласие на обработку персональных данных с помощью сервиса «Яндекс.Метрика»', route('agreement_ym'));
});

Breadcrumbs::for('agreement_personal', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Политика персональных данных', route('agreement_personal'));
});


