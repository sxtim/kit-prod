<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
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
        $selectAllId = 'select-all-houses';
        $selectAllTitle = "<input type=\"checkbox\" class=\"form-check-input\" id=\"{$selectAllId}\" onclick=\"document.querySelectorAll('input[name=\\'ids[]\\']').forEach(function(cb){cb.checked=this.checked;}.bind(this));\">";

        return [
            // Checkbox selection column
            TD::make('select', $selectAllTitle)
                ->width(35)
                ->align(TD::ALIGN_CENTER)
                ->cantHide()
                ->render(function (House $house) {
                    return CheckBox::make('ids[]')
                        ->value($house->id)
                        ->checked(false)
                        ->form('post-form');
                }),
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

    /**
     * Bottom row with bulk actions.
     */
    protected function total(): array
    {
        $colspan = count($this->columns());

        return [
            TD::make('bulk-actions')
                ->colspan($colspan)
                ->align(TD::ALIGN_LEFT)
                ->render(function () {
                    // Кнопка открывает модалку подтверждения; ids поддерживаем в data-атрибуте кнопки и обновляем при изменении чекбоксов
                    $button = (string) ModalToggle::make('Удалить выбранные')
                        ->icon('trash')
                        ->class('btn btn-sm btn-danger')
                        ->modal('confirmDelete')
                        ->attributes(['id' => 'bulk-delete-toggle']);

                    return $button;
                }),
        ];
    }
}
