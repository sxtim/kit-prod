<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sales;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->where('active', 1)->limit(3)->get();
        $sales = Sales::orderBy('created_at', 'desc')->limit(3)->get();

        return view(
            'pages.index',
            [
                'news' => $news,
                'sales' => $sales,
            ]
        );
    }
}
