<?php

namespace App\Orchid\Screens\SliderMainPage;

use App\Models\SliderMainPage;
use Orchid\Screen\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;

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
            'items' => SliderMainPage::filters()->defaultSort('updated_at', 'desc')->paginate(10),
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
                        ->route('platform.slider_main_page.edit', $item);
                }),
                TD::make('heading', 'Заголовок')->filter(Input::make()),
                TD::make('description', 'Описание')->filter(Input::make()),
                TD::make('created_at', 'Дата публикации')->sort(),
                TD::make('updated_at', 'Дата изменения')->sort(),
            ]),
        ];
    }
}
