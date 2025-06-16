<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Models\Jk;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

class JkController extends Controller
{
    public function list()
    {
        $items = Jk::orderBy('sort', 'desc')->where('active', 1)->get();

        return view(
            'pages.jk.list',
            [
                'items' => $items
            ]
        );
    }

    public function detail($id)
    {
        $filter = Filter::getApartments(function(Builder $builder) use ($id) {
            $builder->where('jk_id', $id);
        });

        $item = Jk::find($id);

        return view(
            'pages.jk.detail',
            [
                'filter' => $filter,
                'id' => $id,
                'item' => $item,
            ]
        );
    }
}
