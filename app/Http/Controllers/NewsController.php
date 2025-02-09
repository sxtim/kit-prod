<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        return view('pages.news.list');
    }

    public function detail($id)
    {
        return view('pages.news.detail', ['id' => $id]);
    }
}
