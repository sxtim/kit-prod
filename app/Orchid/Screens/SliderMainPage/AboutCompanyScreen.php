<?php

namespace App\Orchid\Screens\SliderMainPage;

use App\Models\AboutCompany;
use App\Models\SliderMainPage;
use App\Models\UkObjects;
use App\Orchid\Layouts\AboutCompanyListLayout;
use App\Orchid\Screens\Currency;
use App\Orchid\Screens\DateTimeSplit;
use App\Orchid\Screens\Repository;
use App\Orchid\Screens\Str;
use App\Orchid\Screens\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;

class SliderMainPageScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'item' => SliderMainPage::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Слайдер на главной странице';
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
                ->route('platform.slider_main_page.create')
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
                TD::make('id')->sort()->render(function(SliderMainPage $item) {
                    return Link::make($item->id)
                        ->route('platform.objects_uk.edit', $item);
                }),
                TD::make('title', 'Заголовок')->filter(Input::make()),
                TD::make('description', 'Описание')->filter(Input::make()),
                TD::make('created_at', 'Дата публикации')->sort(),
                TD::make('updated_at', 'Дата изменения')->sort(),
            ]),
        ];
    }
}
