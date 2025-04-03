<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use App\Orchid\Screens\Currency;
use App\Orchid\Screens\DateTimeSplit;
use App\Orchid\Screens\Repository;
use App\Orchid\Screens\Str;
use App\Orchid\Screens\TD;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\NewsListLayout;
use Orchid\Screen\Actions\Link;

class NewsScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'news' => News::filters()->defaultSort('updated_at', 'desc')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Новости';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Список новостей на странице';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать новость')
                ->icon('pencil')
                ->route('platform.news.create')
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
            NewsListLayout::class,
        ];
    }
}
