<?php

namespace App\Orchid\Screens\Jk;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Models\Jk;

class JkEditScreen extends Screen
{
    public $item;
    
    public function query(Jk $item): array
    {
        return [
            'item' => $item
        ];
    }

    public function name(): ?string
    {
        return $this->item->exists ? 'Редактировать' : 'Добавить';
    }

    public function description(): ?string
    {
        return "ЖК";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Cоздать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->item->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->item->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->item->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                CheckBox::make('item.active')
                    ->placeholder('Активность')
                    ->sendTrueOrFalse(),

                Input::make('item.title')
                    ->title('Наименование')
                    ->required(),

                Input::make('item.lease')
                    ->title('Сдача')
                    ->required(),

                Input::make('item.layout')
                    ->title('Планировка')
                    ->required(),

                Input::make('item.price')
                    ->title('Цена от')
                    ->required(),

                Input::make('item.credit_price')
                    ->title('Ипотека от')
                    ->required(),

                Quill::make('item.description')
                    ->title('Описание')
                    ->rows(3)
                    ->maxlength(1000),

                Input::make('item.video')
                    ->title('Ссылка на видео'),

                Cropper::make('item.preview_img')
                    ->title('Изображение в листинге'),
            ])
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $this->item->fill($request->get('item'))->save();

        Alert::info('Сохранено');

        return redirect()->route('platform.jk.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.jk.list');
    }
}
