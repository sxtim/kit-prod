<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::orderBy('date', 'desc')->where('active', 1)->get();

        return view(
            'pages.news.list',
            [
                'news' => $news
            ]
        );
    }

    public function detail(News $item)
    {
        $attachments = $item->attachments()->get();
        $img = null;

        if (isset($attachments[1])) {
            $img = $attachments[1]->url();
        } elseif (isset($attachments[0])) {
            $img = $attachments[0]->url();
        }

        return view(
            'pages.news.detail',
            [
                'id' => $item->id,
                'item' => $item,
                'img' => $img
            ]
        );
    }

    public function legacyDetail(News $item)
    {
        return redirect()->route('news_detail', ['item' => $item->slug], 301);
    }
}
