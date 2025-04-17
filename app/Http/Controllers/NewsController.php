<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::orderBy('created_at', 'desc')->where('active', 1)->get();

        return view(
            'pages.news.list',
            [
                'news' => $news
            ]
        );
    }

    public function detail($id)
    {
        $item = News::find($id);
        $attachments = $item->attachments()->get();

        if (isset($attachments[1])) {
            $img = $attachments[1]->url();
        } else {
            $img = $attachments[0]->url();
        }

        return view(
            'pages.news.detail',
            [
                'id' => $id,
                'item' => $item,
                'img' => $img
            ]
        );
    }
}
