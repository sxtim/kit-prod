<?php

namespace App\Http\Controllers;

use App\Models\Jk;
use Illuminate\Http\Request;

class JkController extends Controller
{
    public function list()
    {
        $items = Jk::orderBy('created_at', 'desc')->where('active', 1)->get();

        return view(
            'pages.jk.list',
            [
                'items' => $items
            ]
        );
    }

    public function detail($id)
    {
        $item = Jk::find($id);

        return view(
            'pages.jk.detail',
            [
                'id' => $id,
                'item' => $item,
            ]
        );
    }
}
