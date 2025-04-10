<?php

namespace App\Orchid\Screens\AboutCompany;

use App\Models\AboutCompany;
use App\Orchid\Layouts\AboutCompanyListLayout;
use App\Orchid\Screens\Currency;
use App\Orchid\Screens\DateTimeSplit;
use App\Orchid\Screens\Repository;
use App\Orchid\Screens\Str;
use App\Orchid\Screens\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class AboutCompanyScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'item' => AboutCompany::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'О компании';
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
                ->route('platform.about_company.create')
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
            AboutCompanyListLayout::class,
        ];
    }
}
