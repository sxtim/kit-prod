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
        $item = Jk::with([
            'options' => function ($query) {
                $query->where('active', true)->orderBy('created_at');
            },
            'finishings' => function ($query) {
                $query->where('active', true)->orderBy('sort');
            },
            'constructionProgress' => function ($query) {
                $query->where('active', true)
                    ->orderByDesc('report_date')
                    ->orderBy('sort');
            },
            'constructionProgress.attachments',
            'attachments',
            'project.jks',
        ])->findOrFail($id);

        $platformGuard = auth(config('platform.guard', 'web'));
        $canPreviewInactive = $platformGuard->check()
            && method_exists($platformGuard->user(), 'hasAccess')
            && $platformGuard->user()->hasAccess('platform.index');

        if (!$item->active && !$canPreviewInactive) {
            abort(404);
        }

        $filter = Filter::getApartments(function(Builder $builder) use ($id) {
            $builder->where('jk_id', $id);
        });

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
