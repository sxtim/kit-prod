<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use App\Models\News;
use Orchid\Screen\Fields\Input;

class NewsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id','ID')->sort()->render(function(News $news) {
                return Link::make($news->id)
                    ->route('platform.news.edit', $news);
            }),
            TD::make('title', 'Наименование')->filter(Input::make()),
            TD::make('description','Описание'),
            TD::make('created_at', 'Дата публикации')->sort(),
            TD::make('updated_at', 'Дата изменения')->sort(),
        ];
    }
}
