<?php

namespace App\Http\Controllers;

use App\Models\JkOptions;
use Illuminate\Http\Response;

class JkOptionController extends Controller
{
    public function detail(string $option)
    {
        if (ctype_digit($option)) {
            $legacyOption = JkOptions::findOrFail((int) $option);

            return redirect()->route('jk_option_detail', ['option' => $legacyOption->slug], 301);
        }

        $option = JkOptions::where('slug', $option)->firstOrFail();

        abort_unless($option->active, Response::HTTP_NOT_FOUND);

        $option->loadMissing('jk');

        return view('pages.parking', [
            'option' => $option,
        ]);
    }
}
