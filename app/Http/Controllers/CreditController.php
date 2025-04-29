<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\Mortgage;
use App\Models\Questions;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index()
    {
        $mortgage = Mortgage::where('active', 1)->get();
        $questions = Questions::where('entity', 'credit')->where('active', 1)->get();
        $banks = Banks::where('active', 1)->get();

        return view(
            'pages.credit',
            [
                'banks' => $banks,
                'mortgage' => $mortgage,
                'questions' => $questions,
            ]
        );
    }
}
