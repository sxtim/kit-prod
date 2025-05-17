<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Helpers\FilterBuilder;
use App\Helpers\Order;
use App\Models\Banks;
use App\Models\House;
use App\Models\Mortgage;
use Illuminate\Http\Request;
use App\Helpers\Apartments;

class HouseController extends Controller
{
    public function list()
    {
        $filter = Filter::getApartments();
        $order = Order::getApartments();
        $items = House::where('active', 1);
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

    public function detail(House $house)
    {
        $mortgage = Mortgage::where('active', 1)->get();
        $banks = Banks::where('active', 1)->get();
        
        return view(
            'pages.house.detail',
            [
                'id' => $house->id,
                'item' => $house,
                'similar' => $house->getSimilar(),
                'finishing' => $house->finishing()->where('active', 1)->orderBy('sort')->get(),
                'mortgage' => $mortgage,
                'banks' => $banks,
            ]
        );
    }
}
