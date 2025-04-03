<?php

namespace App\Orchid\Screens\House;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\Cropper;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Models\House;

class HouseEditScreen extends Screen
{
    /**
     * @var House
     */
    public $house;

    /**
     * Query data.
     *
     * @param House $house
     *
     * @return array
     */
    public function query(House $house): array
    {
        $house->load('attachments');

        return [
            'house' => $house
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return $this->house->exists ? 'Редактировать квартиру' : 'Добавить квартиру';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Квартиры";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Cоздать')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->house->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->house->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->house->exists),
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
                Input::make('house.rooms')
                    ->title('Количество комнат')
                    ->mask([
                        'mask' => '9',
                        'numericInput' => true
                    ])
                    ->required(),

                Input::make('house.number')
                    ->title('Номер квартиры')
                    ->required(),

                Input::make('house.address')
                    ->title('Адрес')
                    ->required(),

                Input::make('house.square')
                    ->title('Площадь')
                    ->required(),

                Input::make('house.houseroom')
                    ->title('Жилая площадь')
                    ->required(),

                Input::make('house.position')
                    ->title('Позиция')
                    ->required(),

                Input::make('house.floor')
                    ->title('Этаж')
                    ->required(),

                Input::make('house.ceiling_height')
                    ->title('Высота потолков')
                    ->required(),

                Input::make('house.view_window')
                    ->title('Вид из окна'),

                Input::make('house.description_small')
                    ->title('Описание')
                    ->placeholder('Маленькое описание в карточке'),

                Input::make('house.base_price')
                    ->title('Цена')
                    ->required(),

                Input::make('house.sale_price')
                    ->title('Цена по акции'),

                Input::make('house.price_square')
                    ->title('Цена за квадратный метр'),

                Cropper::make('house.layout_img')
                    ->title('Планировка'),

                Cropper::make('house.size_img')
                    ->title('С размерами'),

                Cropper::make('house.floor_img')
                    ->title('На этаже'),

                Cropper::make('house.gen_plan_img')
                    ->title('На генплане'),

                Attach::make('house.attachments')->multiple()->title('Фотогалерея комплекса'),
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
        $fields = $request->get('house');

        if (isset($fields['attachments'])) {
            unset($fields['attachments']);
        }

        $this->house->fill($fields)->save();
        $this->house->attachments()->detach();
        $this->house->attachments()->attach($request->input('house.attachments', []));

        Alert::info('Сохранено');

        return redirect()->route('platform.house.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->house->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.house.list');
    }
}
