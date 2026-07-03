<?php

namespace App\Orchid\Screens\JkProject;

use App\Models\JkProject;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class JkProjectEditScreen extends Screen
{
    public $item;

    public function query(JkProject $item): array
    {
        $item->loadMissing('documentGroups.documents.attachments');

        return [
            'item' => $item,
        ];
    }

    public function name(): ?string
    {
        return $this->item->exists ? 'Редактировать' : 'Добавить';
    }

    public function description(): ?string
    {
        return 'ЖК';
    }

    public function commandBar(): array
    {
        return [
            Button::make('Cоздать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->item->exists),

            Button::make('Обновить')
                ->icon('pencil')
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                CheckBox::make('item.active')
                    ->placeholder('Активность')
                    ->sendTrueOrFalse(),

                Input::make('item.sort')
                    ->title('Сортировка'),

                Input::make('item.title')
                    ->title('Наименование ЖК')
                    ->help('Например: ЖК Спутник или ЖК Новый Кит.')
                    ->required(),
            ]),
            Layout::accordion([
                'Документы проекта' => Layout::view('admin.jk.project_documents_link'),
            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->item->fill($request->get('item'))->save();

        Alert::info('Сохранено');

        return redirect()->route('platform.jk.list');
    }

    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.jk.list');
    }
}
