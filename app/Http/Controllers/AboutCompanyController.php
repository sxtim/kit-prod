<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;

class AboutCompanyController extends Controller
{
    public function index()
    {
        $items = AboutCompany::orderBy('sort')->get();
        return view(
            'pages.about_company',
            [
                'items' => $items
            ]
        );
    }
}
