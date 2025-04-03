<?php

namespace App\Orchid\Screens\Sales;

use App\Models\Sales;
use App\Orchid\Layouts\SalesListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class SalesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'sales' => Sales::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Акции';
    }

    public function description(): ?string
    {
        return 'Список акций на странице';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать акцию')
                ->icon('pencil')
                ->route('platform.sales.create')
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
            SalesListLayout::class,
        ];
    }
}
