<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use Illuminate\Http\Request;

class BanksController extends Controller
{
    public function detail(Banks $bank): Banks
    {
        return $bank;
    }
}
