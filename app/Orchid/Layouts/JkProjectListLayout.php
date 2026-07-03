<?php

namespace App\Orchid\Layouts;

use App\Models\JkProject;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class JkProjectListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    protected $target = 'items';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->sort()->render(function (JkProject $item) {
                return Link::make($item->id)
                    ->route('platform.jk.edit', $item);
            }),
            TD::make('active', 'Активность')->sort()->filter(Input::make())->render(function (JkProject $item) {
                return $item->active ? 'Да' : 'Нет';
            }),
            TD::make('sort', 'Сортировка')->sort()->filter(Input::make()),
            TD::make('title', 'Наименование ЖК')->sort()->filter(Input::make()),
            TD::make('created_at', 'Дата публикации')->sort(),
            TD::make('updated_at', 'Дата изменения')->sort(),
        ];
    }
}
