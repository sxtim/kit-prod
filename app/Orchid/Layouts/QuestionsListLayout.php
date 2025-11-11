<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use App\Models\Jk;

class QuestionsListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'item';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id','ID')->sort()->render(function(Jk $item) {
                return Link::make($item->id)
                    ->route('platform.jk.edit', $item);
            }),
            TD::make('title', 'Наименование')->sort()->filter(Input::make()),
            TD::make('question', 'Вопрос')->sort()->filter(Input::make()),
            TD::make('description', 'Вопрос')->sort()->filter(Input::make()),
            TD::make('created_at', 'Дата публикации')->sort(),
            TD::make('updated_at', 'Дата изменения')->sort(),
        ];
    }
}
