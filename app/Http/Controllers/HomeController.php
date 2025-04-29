<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\Jk;
use App\Models\Mortgage;
use App\Models\News;
use App\Models\Sales;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jks = Jk::orderBy('created_at', 'desc')->where('active', 1)->limit(1)->get();
        $news = News::orderBy('created_at', 'desc')->where('active', 1)->limit(3)->get();
        $sales = Sales::orderBy('created_at', 'desc')->limit(3)->get();
        $mortgage = Mortgage::where('active', 1)->get();
        $banks = Banks::where('active', 1)->get();

        return view(
            'pages.index',
            [
                'banks' => $banks,
                'mortgage' => $mortgage,
                'jks' => $jks,
                'news' => $news,
                'sales' => $sales,
            ]
        );
    }
}
