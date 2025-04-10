<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function index()
    {
        return view('pages.about_company');
    }
}
