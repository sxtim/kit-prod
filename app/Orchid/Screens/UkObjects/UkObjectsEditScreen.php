<?php

namespace App\Orchid\Screens\UkObjects;

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
use App\Models\UkObjects;

class UkObjectsEditScreen extends Screen
{
    public $item;
    
    public function query(UkObjects $item): array
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
        return "Объекты УК";
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

                Input::make('item.address')
                    ->title('Адрес')
                    ->required(),

                Input::make('item.phone')
                    ->title('Телефон')
                    ->mask('(999) 999-99-99'),

                Input::make('item.email')
                    ->title('E-mail'),

                Cropper::make('item.img')
                    ->title('Изображение'),
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

        return redirect()->route('platform.objects_uk.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.objects_uk.list');
    }
}
