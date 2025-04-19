<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function list()
    {
        $items = House::orderBy('created_at', 'desc')->where('active', 1)->get();

        return view(
            'pages.house.list',
            [
                'items' => $items
            ]
        );
    }

    public function detail($id)
    {
        $item = House::find($id);

        return view(
            'pages.house.detail',
            [
                'id' => $id,
                'item' => $item,
            ]
        );
    }
}
