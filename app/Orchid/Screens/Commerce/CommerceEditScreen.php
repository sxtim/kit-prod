<?php

namespace App\Orchid\Screens\Commerce;

use App\Models\Commerce;
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
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Orchid\Fields\SelectJson;

class CommerceEditScreen extends Screen
{
    public $item;
    
    public function query(Commerce $item): array
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
        return "Коммерческое помещение";
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

                Input::make('item.number')
                    ->title('Номер'),

                Input::make('item.title')
                    ->title('Наименование')
                    ->required(),

                Input::make('item.address')
                    ->title('Адрес')
                    ->required(),

                SelectJson::make('item.type')
                    ->setValues([
                        'Аренда'  => 'Аренда',
                        'Продажа' => 'Продажа',
                    ])
                    ->multiple()
                    ->title('Вид сделки'),

                Input::make('item.square')
                    ->title('Площадь, м2')
                    ->required(),

                Input::make('item.lease')
                    ->title('Срок сдачи'),

                Input::make('item.floor')
                    ->title('Этаж'),

                Input::make('item.base_price')
                    ->title('Цена ₽/мес'),

                SelectJson::make('item.similar')
                    ->fromModel(Commerce::class, 'title')
                    ->multiple()
                    ->title('Похожие помещения'),

                Attach::make('item.attachments')->multiple()->title('Фотогалерея'),
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
        $fields = $request->get('item');

        if (isset($fields['attachments'])) {
            unset($fields['attachments']);
        }

        if (!isset($fields['similar'])) {
            $fields['similar'] = null;
        } else {
            $fields['similar'] = json_encode($fields['similar']);
        }

        if (!isset($fields['type'])) {
            $fields['type'] = null;
        } else {
            $fields['type'] = json_encode($fields['type'], JSON_UNESCAPED_UNICODE);
        }

        $this->item->fill($fields)->save();
        $this->item->attachments()->detach();
        $this->item->attachments()->attach($request->input('item.attachments', []));

        Alert::info('Сохранено');

        return redirect()->route('platform.commerce.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->item->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.commerce.list');
    }
}
