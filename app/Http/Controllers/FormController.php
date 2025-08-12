<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\House;
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

        $tgToken = env('TG_TOKEN');
        $tgChatId = env('TG_CHAT_ID');

        $tgMessage = '';

        switch ($request->form_entity) {
            case 'feedback':
                $tgMessage .= "\nНаименование формы: <b>Форма обратной связи</b>";
                break;
            case 'apartment':
                $tgMessage .= "\nНаименование формы: <b>Забронировать квартиру</b>";
                $house = House::where('id', $request->get('apartment_entity'))->get();
                $route = route('house_detail', $house);
                $tgMessage .= "\n<a href='" . $route . "'>Квартира</a>";
                break;
            case 'mortgage':
                $tgMessage .= "\nНаименование формы: <b>Консультация по ипотеке</b>";
                break;
            case 'commerce':
                $tgMessage .= "\nНаименование формы: <b>Забронировать коммерческое помещение</b>";
                $item = Commerce::where('id', $request->get('entity'))->get();
                $route = route('commerce_detail', $item);
                $tgMessage .= "\n<a href='" . $route . "'>Коммерческое помещение</a>";
                break;
            case 'layout':
                $tgMessage .= "\nНаименование формы: <b>Получите персональную подборку планировок</b>";
                break;
        }

        $phone = preg_replace('/[^0-9]/', '', $request->phone);

        $tgMessage .= "\nИмя: <b>" . $request->name . '</b>';
        $tgMessage .= "\nТелефон: <a href='+$phone'>" . '+' . $phone . '</a>';
        $tgMessage = urlencode($tgMessage);

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
