<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Models\Banks;
use App\Models\Jk;
use App\Models\Mortgage;
use App\Models\News;
use App\Models\Sales;
use App\Models\SliderMainPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $filter = Filter::getApartments();
        $jks = Jk::orderBy('created_at', 'desc')->where('active', 1)->limit(3)->get();
        $news = News::orderBy('created_at', 'desc')->where('active', 1)->limit(3)->get();
        $sales = Sales::orderBy('sort', 'asc')->limit(3)->get();
        $mortgage = Mortgage::where('active', 1)->get();
        $banks = Banks::where('active', 1)->get();
        $slider = SliderMainPage::where('active', 1)->orderBy('sort')->get();

        return view(
            'pages.index',
            [
                'slider' => $slider,
                'filter' => $filter,
                'banks' => $banks,
                'mortgage' => $mortgage,
                'jks' => $jks,
                'news' => $news,
                'sales' => $sales,
            ]
        );
    }
}
