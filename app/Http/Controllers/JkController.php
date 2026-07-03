<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Models\Commerce;
use App\Models\House;
use App\Models\Jk;
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
            'project.documentGroups' => function ($query) {
                $query->where('active', true)->orderBy('sort')->orderBy('id');
            },
            'project.documentGroups.documents' => function ($query) {
                $query->where('active', true)->orderBy('sort')->orderByDesc('document_date')->orderBy('id');
            },
            'project.documentGroups.documents.attachments',
        ])->findOrFail($id);

        $platformGuard = auth(config('platform.guard', 'web'));
        $canPreviewInactive = $platformGuard->check()
            && method_exists($platformGuard->user(), 'hasAccess')
            && $platformGuard->user()->hasAccess('platform.index');

        if (!$item->active && !$canPreviewInactive) {
            abort(404);
        }

        $filterJkIds = $item->project
            ? $item->project->jks
                ->filter(fn (Jk $jk) => $jk->active || $jk->id === $item->id)
                ->pluck('id')
                ->push($item->id)
                ->unique()
                ->values()
            : collect([$item->id]);

        $filter = Filter::getApartments(function(Builder $builder) use ($filterJkIds) {
            $builder->whereIn('jk_id', $filterJkIds);
        });

        $apartmentPreviewItems = House::with('jk')
            ->where('active', 1)
            ->where('jk_id', $id)
            ->orderBy('base_price')
            ->limit(8)
            ->get();

        $appliedFilter = [];

        if (!empty($filter)) {
            $appliedFilter['address'] = [$item->id];

            if ($item->jk_project_id) {
                $appliedFilter['project'] = [$item->jk_project_id];
            }
        }

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
                'appliedFilter' => $appliedFilter,
                'apartmentPreviewItems' => $apartmentPreviewItems,
                'id' => $id,
                'item' => $item,
                'brandContacts' => $this->brandContacts($item),
                'commerceJkIds' => $commerceJkIds,
                'commerceCount' => $commerceCount,
            ]
        );
    }

    private function brandContacts(Jk $item): array
    {
        return [
            'logo' => filled($item->brand_logo) ? $item->brand_logo : null,
            'phone' => filled($item->brand_phone) ? $item->brand_phone : null,
            'email' => filled($item->brand_email) ? $item->brand_email : null,
        ];
    }
}
