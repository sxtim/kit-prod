<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use App\Models\Sales;

class SalesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'sales';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id','ID')->sort()->render(function(Sales $sales) {
                return Link::make($sales->id)
                    ->route('platform.sales.edit', $sales);
            }),
            TD::make('title', 'Наименование')->filter(Input::make()),
            TD::make('description', 'Описание'),
            TD::make('sale_end', 'Дата окончания акции')->sort(),
            TD::make('created_at', 'Дата публикации')->sort(),
            TD::make('updated_at', 'Дата изменения')->sort(),
        ];
    }
}
