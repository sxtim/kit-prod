<?php

namespace App\Orchid\Screens\House;

use App\Models\House;
use App\Orchid\Screens\Currency;
use App\Orchid\Screens\DateTimeSplit;
use App\Orchid\Screens\Repository;
use App\Orchid\Screens\Str;
use App\Orchid\Screens\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\HouseListLayout;
use Orchid\Screen\Actions\Link;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout as OrchidLayout;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\ViewField;

class HouseScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'house' => House::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Квартиры';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Список квартир на странице';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать квартиру')
                ->icon('pencil')
                ->route('platform.house.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            HouseListLayout::class,

            // Модальное окно подтверждения удаления
            OrchidLayout::modal('confirmDelete', [
                OrchidLayout::rows([
                    ViewField::make('preview')->view('admin.house.confirm_delete'),
                ]),
            ])
                ->title('Подтверждение удаления')
                ->applyButton('Удалить выбранные')
                ->closeButton('Отмена')
                ->rawClick(false)
                ->method('removeSelected'),

            // Скрипт для сбора ids и логов — вне таблицы, гарантированно выполнится
            OrchidLayout::view('admin.house.bulk_script'),
        ];
    }

    /**
     * Bulk delete selected houses.
     */
    public function removeSelected(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            Alert::warning('Не выбраны записи для удаления.');
            return back();
        }

        $count = House::whereIn('id', $ids)->count();
        House::whereIn('id', $ids)->delete();

        Alert::info('Удалено записей: ' . $count);

        return back();
    }

    // Без async: список номеров и скрытые поля добавляет клиентский скрипт перед отправкой
}
