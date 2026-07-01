<?php

namespace App\Orchid\Screens\JkConstructionProgress;

use App\Models\Jk;
use App\Models\JkConstructionProgress;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class JkConstructionProgressEditScreen extends Screen
{
    public Jk $jk;

    public JkConstructionProgress $item;

    public function query(Jk $jk, JkConstructionProgress $item): array
    {
        abort_if($item->exists && $item->jk_id !== $jk->id, 404);

        $this->jk = $jk;
        $this->item = $item;
        $item->loadMissing('attachments');

        return [
            'item' => $item,
        ];
    }

    public function name(): ?string
    {
        return $this->item->exists ? 'Редактировать отчет' : 'Добавить отчет';
    }

    public function description(): ?string
    {
        return $this->jk->admin_title;
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Создать')
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

            Link::make('К списку отчетов')
                ->icon('arrow-left')
                ->route('platform.jk.construction-progress.list', $this->jk),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                CheckBox::make('item.active')
                    ->placeholder('Активность')
                    ->sendTrueOrFalse(),

                Input::make('item.sort')
                    ->title('Сортировка'),

                Select::make('item.type')
                    ->title('Тип отчета')
                    ->options([
                        'photo' => 'Фото',
                        'video' => 'Видео',
                    ])
                    ->value($this->item->type ?: 'photo')
                    ->required(),

                DateTimer::make('item.report_date')
                    ->title('Дата отчета')
                    ->allowInput()
                    ->format('Y-m-d')
                    ->required(),

                Input::make('item.title')
                    ->title('Название')
                    ->help('Например: Июнь 2026 или Позиция 5.')
                    ->required(),

                Quill::make('item.description')
                    ->title('Описание для просмотрщика')
                    ->rows(5),

                Attach::make('item.attachments')
                    ->multiple()
                    ->title('Фотоальбом')
                    ->help('Первое фото в списке будет превью на странице. Остальные фото показываются только в попапе.'),

                Input::make('item.video_url')
                    ->title('Ссылка на видео')
                    ->help('Пока вкладка видео скрыта, если видео-отчетов нет.'),
            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $fields = $request->get('item', []);

        if (isset($fields['attachments'])) {
            unset($fields['attachments']);
        }

        $this->item->fill($fields);
        $this->item->jk_id = $this->jk->id;
        $this->item->save();

        $this->item->attachments()->detach();
        $this->item->attachments()->attach($request->input('item.attachments', []));

        Alert::info('Сохранено');

        return redirect()->route('platform.jk.construction-progress.list', $this->jk);
    }

    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.jk.construction-progress.list', $this->jk);
    }
}
