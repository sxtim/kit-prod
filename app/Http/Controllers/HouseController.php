<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Helpers\FilterBuilder;
use App\Helpers\Order;
use App\Models\Banks;
use App\Models\House;
use App\Models\Jk;
use App\Models\Mortgage;
use App\Support\SlugGenerator;
use Illuminate\Http\Request;
use App\Helpers\Apartments;
use Illuminate\Support\Collection;

class HouseController extends Controller
{
    public function list()
    {
        $requestFilter = json_decode((string) request()->get('data'), true);
        $projectIds = collect($requestFilter['project'] ?? [])
            ->reject(fn ($value) => $value === 'any')
            ->filter(fn ($value) => is_numeric($value))
            ->map(fn ($value) => (int) $value)
            ->values();

        $filter = Filter::getApartments(function ($builder) use ($projectIds) {
            if ($projectIds->isEmpty()) {
                return;
            }

            $builder->whereIn('jk_id', Jk::whereIn('jk_project_id', $projectIds)->select('id'));
        });
        $order = Order::getApartments();
        $items = House::with('jk')->where('active', 1);
        Order::setOrderToBuilderApartments($items);
        FilterBuilder::setApartments($items);
        $items = $items->get();
        $clickFilter = Apartments::getInstance();
        $appliedFilter = $clickFilter->get();

        return view(
            'pages.house.list',
            [
                'appliedFilter' => $appliedFilter,
                'filter' => $filter,
                'order' => $order,
                'items' => $items
            ]
        );
    }

    public function detail(string $house)
    {
        $item = House::where('slug', $house)->first();

        if (! $item) {
            $legacyItem = $this->findByLegacySlug($house);

            if ($legacyItem) {
                return redirect()->route('house_detail', ['house' => $legacyItem->slug], 301);
            }

            abort(404);
        }

        return $this->renderDetail($item);
    }

    private function renderDetail(House $house)
    {
        $mortgage = Mortgage::where('active', 1)->get();
        $banks = Banks::where('active', 1)->get();
        $house->loadMissing([
            'jk.attachments',
            'jk.finishings' => fn ($query) => $query->where('active', 1)->orderBy('sort'),
        ]);
        $finishing = $house->jk?->finishings ?? new Collection();
        $gallery = $house->jk?->attachments ?? new Collection();
        
        return view(
            'pages.house.detail',
            [
                'id' => $house->id,
                'item' => $house,
                'similar' => $house->getSimilar(),
                'finishing' => $finishing,
                'gallery' => $gallery,
                'mortgage' => $mortgage,
                'banks' => $banks,
            ]
        );
    }

    public function legacyDetail(House $house)
    {
        return redirect()->route('house_detail', ['house' => $house->slug], 301);
    }

    private function findByLegacySlug(string $slug): ?House
    {
        return House::query()
            ->get()
            ->first(fn (House $house) => SlugGenerator::normalize(trim($house->address . ' ' . $house->number)) === $slug);
    }
}
