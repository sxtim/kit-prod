<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Helpers\FilterBuilder;
use App\Models\Commerce;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function list()
    {
        $filter = Filter::getCommerce();
        $items = Commerce::orderBy('created_at', 'desc')->where('active', 1);
        FilterBuilder::setCommerce($items);
        $items = $items->get();

        return view(
            'pages.commerce.list',
            [
                'filter' => $filter,
                'items' => $items
            ]
        );
    }

    public function detail(Commerce $item)
    {
        return view(
            'pages.commerce.detail',
            [
                'item' => $item,
                'similar' => $item->getSimilar(),
            ]
        );
    }
}
