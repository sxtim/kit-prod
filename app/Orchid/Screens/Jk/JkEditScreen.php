<?php

namespace App\Orchid\Screens\Jk;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
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

                Input::make('item.sort')
                    ->title('Сортировка'),

                Input::make('item.title')
                    ->title('Наименование')
                    ->required(),

                Input::make('item.address')
                    ->title('Адрес')
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

                Input::make('item.preview_label')
                    ->title('Лейбл в листинге у карточки'),

                Cropper::make('item.preview_img')
                    ->title('Изображение в карточке ЖК')
                    ->url($this->item->preview_img)
                    ->required(),
            ])->title('Карточка ЖК'),

            Layout::block(
                Layout::accordion([
                    'Первый экран' => Layout::rows([
                        Cropper::make('item.detail_img')
                            ->title('Изображение первого экрана деталки ЖК')
                            ->url($this->item->detail_img)
                            ->required(),

                        Group::make([
                            Input::make('item.hero_feature_1_title')
                                ->title('Плашка 1: заголовок')
                                ->required(),

                            Input::make('item.hero_feature_1_text')
                                ->title('Плашка 1: текст')
                                ->required(),
                        ]),

                        Group::make([
                            Input::make('item.hero_feature_2_title')
                                ->title('Плашка 2: заголовок')
                                ->required(),

                            Input::make('item.hero_feature_2_text')
                                ->title('Плашка 2: текст')
                                ->required(),
                        ]),

                        Group::make([
                            Input::make('item.hero_feature_3_title')
                                ->title('Плашка 3: заголовок')
                                ->required(),

                            Input::make('item.hero_feature_3_text')
                                ->title('Плашка 3: текст')
                                ->required(),

                        ]),

                        Group::make([
                            Input::make('item.hero_feature_4_title')
                                ->title('Плашка 4: заголовок')
                                ->required(),

                            Input::make('item.hero_feature_4_text')
                                ->title('Плашка 4: текст')
                                ->required(),
                        ]),
                    ]),

                    'О проекте' => Layout::rows([
                        Quill::make('item.description')
                            ->title('Описание')
                            ->rows(3)
                            ->maxlength(1000),

                        Input::make('item.video')
                            ->title('Ссылка на видео')
                            ->help('Если заполнено видео, справа в блоке будет показано видео.'),

                        Cropper::make('item.about_media_img')
                            ->title('Изображение справа в блоке описания')
                            ->url($this->item->about_media_img)
                            ->help('Используется, если ссылка на видео не заполнена.'),
                    ]),

                    'Карта / инфраструктура' => Layout::rows([
                        Input::make('item.map')
                            ->title('Ссылка яндекс карт'),
                    ]),
                ])->stayOpen()
            )->title('Контент страницы')
                ->vertical(),
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
