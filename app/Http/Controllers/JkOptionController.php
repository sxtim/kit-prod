<?php

namespace App\Http\Controllers;

use App\Models\JkOptions;
use Illuminate\Http\Response;

class JkOptionController extends Controller
{
    public function detail(JkOptions $option)
    {
        abort_unless($option->active, Response::HTTP_NOT_FOUND);

        $option->loadMissing('jk');

        return view('pages.parking', [
            'option' => $option,
        ]);
    }
}
