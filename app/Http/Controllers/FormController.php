<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\House;
use App\Support\ContactFormAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $tgToken = env('TG_TOKEN');
        $tgChatId = env('TG_CHAT_ID');

        $tgMessage = '';

        switch ($request->form_entity) {
            case 'feedback':
                $tgMessage .= "\nНаименование формы: <b>Форма обратной связи</b>";
                break;
            case 'apartment':
                $tgMessage .= "\nНаименование формы: <b>Забронировать квартиру</b>";
                $house = House::find($request->integer('apartment_entity'));
                if ($house !== null) {
                    $tgMessage .= "\n<a href='" . route('house_detail', $house) . "'>Квартира</a>";
                }
                break;
            case 'mortgage':
                $tgMessage .= "\nНаименование формы: <b>Консультация по ипотеке</b>";
                break;
            case 'commerce':
                $tgMessage .= "\nНаименование формы: <b>Забронировать коммерческое помещение</b>";
                $item = Commerce::find($request->integer('entity'));
                if ($item !== null) {
                    $tgMessage .= "\n<a href='" . route('commerce_detail', $item) . "'>Коммерческое помещение</a>";
                }
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
            ContactFormAudit::log('accepted', $request, [
                'delivery' => 'telegram',
            ]);

            return [
                'success' => true,
            ];
        }

        ContactFormAudit::log('delivery_failed', $request, [
            'delivery' => 'telegram',
            'telegram_status' => $response->status(),
        ]);

        return [
            'success' => false,
        ];
    }
}
