<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use App\Models\House;

class HouseListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'house';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id','ID')->sort()->render(function(House $house) {
                return Link::make($house->id)
                    ->route('platform.house.edit', $house);
            }),
            TD::make('active', 'Активность')->sort()->filter(Input::make())->render(function(House $house) {
                return $house->active ? 'Да' : 'Нет';
            }),
            TD::make('jk_id', 'ЖК')->sort()->filter(Input::make())->render(function(House $house) {
                return $house->jk()->first()->title . ', ' . $house->jk()->first()->address;
            }),
            TD::make('square', 'Площадь')->sort()->filter(Input::make()),
            TD::make('rooms', 'Количество комнат')->sort()->filter(Input::make()),
            TD::make('number', 'Номер квартиры')->sort()->filter(Input::make()),
            TD::make('address', 'Адрес')->filter(Input::make()),
            TD::make('created_at', 'Дата публикации')->sort(),
            TD::make('updated_at', 'Дата изменения')->sort(),
        ];
    }
}
