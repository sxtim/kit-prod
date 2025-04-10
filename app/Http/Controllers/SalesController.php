<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function list()
    {
        $items = Sales::orderBy('sale_end', 'desc')->get();

        return view(
            'pages.sales.list',
            [
                'items' => $items,
            ]
        );
    }

    public function detail($id)
    {
        $item = Sales::find($id);
        $attachments = $item->attachments()->get();

        if (isset($attachments[1])) {
            $img = $attachments[1]->url();
        } else {
            $img = $attachments[0]->url();
        }

        return view(
            'pages.sales.detail',
            [
                'id' => $id,
                'item' => $item,
                'img' => $img
            ]
        );
    }
}
