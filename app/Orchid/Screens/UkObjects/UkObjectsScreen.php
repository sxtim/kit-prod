<?php

namespace App\Orchid\Screens\UkObjects;

use App\Models\UkObjects;
use Orchid\Screen\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;

class UkObjectsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'items' => UkObjects::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Объекты УК';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать')
                ->icon('pencil')
                ->route('platform.objects_uk.create')
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
            Layout::table('items', [
                TD::make('id')->sort()->render(function(UkObjects $item) {
                    return Link::make($item->id)
                        ->route('platform.objects_uk.edit', $item);
                }),
                TD::make('title', 'Наименование')->filter(Input::make()),
                TD::make('created_at', 'Дата публикации')->sort(),
                TD::make('updated_at', 'Дата изменения')->sort(),
            ]),
        ];
    }
}
