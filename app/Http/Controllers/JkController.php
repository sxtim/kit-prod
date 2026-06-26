<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Models\Commerce;
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

        $item = Jk::with([
            'options' => function ($query) {
                $query->where('active', true)->orderBy('created_at');
            },
            'finishings' => function ($query) {
                $query->where('active', true)->orderBy('sort');
            },
            'project.jks',
        ])->findOrFail($id);

        $commerceJkIds = $item->project
            ? $item->project->jks->pluck('id')->push($item->id)->unique()->values()
            : collect([$item->id]);

        $commerceCount = Commerce::where('active', true)
            ->whereIn('jk_id', $commerceJkIds)
            ->count();

        return view(
            'pages.jk.detail',
            [
                'filter' => $filter,
                'id' => $id,
                'item' => $item,
                'commerceJkIds' => $commerceJkIds,
                'commerceCount' => $commerceCount,
            ]
        );
    }
}
