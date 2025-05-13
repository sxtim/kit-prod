<?php

namespace App\Http\Controllers;

use App\Helpers\Filter;
use App\Models\Banks;
use App\Models\House;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function list()
    {
        $filter = Filter::getApartments();
        $items = House::orderBy('created_at', 'desc')->where('active', 1)->get();

        return view(
            'pages.house.list',
            [
                'filter' => $filter,
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
