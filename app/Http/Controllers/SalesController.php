<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function list()
    {
        $items = Sales::orderBy('sort')->get();

        return view(
            'pages.sales.list',
            [
                'items' => $items,
            ]
        );
    }

    public function detail(Sales $item)
    {
        $attachments = $item->attachments()->get();

        $img = null;

        if (isset($attachments[1])) {
            $img = $attachments[1]->url();
        } elseif (isset($attachments[0])) {
            $img = $attachments[0]->url();
        }

        return view(
            'pages.sales.detail',
            [
                'id' => $item->id,
                'item' => $item,
                'img' => $img
            ]
        );
    }
}
