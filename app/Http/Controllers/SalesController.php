<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function list()
    {
        return view('pages.sales.list');
    }

    public function detail($id)
    {
        return view('pages.sales.detail', ['id' => $id]);
    }
}
