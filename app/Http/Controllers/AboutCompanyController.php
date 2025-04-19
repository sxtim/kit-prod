<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index()
    {
        $items = AboutCompany::all();
        return view(
            'pages.about_company',
            [
                'items' => $items
            ]
        );
    }
}
