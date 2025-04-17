<?php

namespace App\Orchid\Screens\JkOptions;

use App\Models\Jk;
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
use App\Models\JkOptions;

class JkOptionsEditScreen extends Screen
{
    public $item;
    
    public function query(JkOptions $item): array
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
        return "Опции ЖК";
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

                Relation::make('item.jk_id')
                    ->fromModel(Jk::class, 'title')
                    ->title('ЖК')->required(),

                Input::make('item.title')
                    ->title('Наименование')
                    ->required(),

                Quill::make('item.description')
                    ->title('Описание')
                    ->rows(3)
                    ->maxlength(1000),

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

        return redirect()->route('platform.jk.options.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.jk.options.list');
    }
}
