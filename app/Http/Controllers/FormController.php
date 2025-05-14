<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function index(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required',
                'phone' => 'required',
            ]);
        } catch (ValidationException $e) {
            return [
                'success' => false,
                'errors' => $e->errors(),
            ];
        }

        $formName = match ($request->form_entity) {
            'feedback' => 'Форма обратной связи',
            'mortgage' => 'Консультация по ипотеке',
            default => null,
        };

        $tgToken = env('TG_TOKEN');
        $tgChatId = env('TG_CHAT_ID');

        $tgMessage = '';

        if ($formName) {
            $tgMessage .= "\nНаименование формы: <b>" . $formName . '</b>';
        }

        $tgMessage .= "\nИмя: <b>" . $request->name . '</b>';
        $tgMessage .= "\nТелефон: <b>" . $request->phone . '</b>';

        $response = Http::get("https://api.telegram.org/bot$tgToken/sendMessage?chat_id=$tgChatId&parse_mode=html&text=$tgMessage");

        if ($response->ok()) {
            return [
                'success' => true,
            ];
        }

        return [
            'success' => false,
        ];
    }
}
