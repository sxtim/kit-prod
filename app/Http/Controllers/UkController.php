<?php

namespace App\Http\Controllers;

use App\Models\AboutCompany;
use App\Models\Questions;
use App\Models\UkObjects;
use Illuminate\Http\Request;

class UkController extends Controller
{
    public function index()
    {
        $ukObjects = UkObjects::where('active', 1)->get();
        $questions = Questions::where('entity', 'mc')->get();

        return view(
            'pages.uk',
            [
                'ukObjects' => $ukObjects,
                'questions' => $questions,
            ]
        );
    }
}
