<?php

namespace App\Orchid\Screens\Jk;

use Illuminate\Http\Request;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\Relation;
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
use App\Models\JkFinishing;
use App\Models\JkProject;

class JkEditScreen extends Screen
{
    private const FINISHING_ROW_COUNT = 6;

    public $item;
    
    public function query(Jk $item): array
    {
        $item->loadMissing([
            'attachments',
            'finishings' => fn ($query) => $query->orderBy('sort'),
        ]);

        return [
            'item' => $item,
            'finishings' => $this->prepareFinishingRows($item),
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
                Relation::make('item.jk_project_id')
                    ->fromModel(JkProject::class, 'title')
                    ->title('Проект ЖК')
                    ->help('Общий проект: например ЖК Спутник. Может объединять несколько адресов или позиций.')
                    ->required(),
            ])->title('Структура'),

            Layout::rows([
                CheckBox::make('item.active')
                    ->placeholder('Активность')
                    ->sendTrueOrFalse(),

                Input::make('item.sort')
                    ->title('Сортировка'),

                Input::make('item.title')
                    ->title('Заголовок страницы')
                    ->help('Что увидит пользователь в заголовке страницы. Обычно совпадает с названием проекта.')
                    ->required(),

                Input::make('item.address')
                    ->title('Адрес')
                    ->help('Конкретный адрес или позиция внутри проекта: например Летчика Филипова д.4/1.')
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

                    'Галерея' => Layout::rows([
                        Attach::make('item.attachments')
                            ->multiple()
                            ->title('Фотогалерея ЖК')
                            ->help('Эта галерея выводится на странице ЖК и на страницах квартир, привязанных к этой позиции / адресу.'),
                    ]),

                    'Карта / инфраструктура' => Layout::rows([
                        Input::make('item.map')
                            ->title('Ссылка яндекс карт'),
                    ]),

                    'Особенности объекта' => Layout::rows([
                        Group::make([
                            Input::make('item.object_feature_1_title')
                                ->title('Вкладка 1: название'),

                            Cropper::make('item.object_feature_1_img')
                                ->title('Вкладка 1: изображение')
                                ->url($this->item->object_feature_1_img),
                        ]),

                        Quill::make('item.object_feature_1_text')
                            ->title('Вкладка 1: текст')
                            ->rows(3),

                        Group::make([
                            Input::make('item.object_feature_2_title')
                                ->title('Вкладка 2: название'),

                            Cropper::make('item.object_feature_2_img')
                                ->title('Вкладка 2: изображение')
                                ->url($this->item->object_feature_2_img),
                        ]),

                        Quill::make('item.object_feature_2_text')
                            ->title('Вкладка 2: текст')
                            ->rows(3),

                        Group::make([
                            Input::make('item.object_feature_3_title')
                                ->title('Вкладка 3: название'),

                            Cropper::make('item.object_feature_3_img')
                                ->title('Вкладка 3: изображение')
                                ->url($this->item->object_feature_3_img),
                        ]),

                        Quill::make('item.object_feature_3_text')
                            ->title('Вкладка 3: текст')
                            ->rows(3),

                        Group::make([
                            Input::make('item.object_feature_4_title')
                                ->title('Вкладка 4: название'),

                            Cropper::make('item.object_feature_4_img')
                                ->title('Вкладка 4: изображение')
                                ->url($this->item->object_feature_4_img),
                        ]),

                        Quill::make('item.object_feature_4_text')
                            ->title('Вкладка 4: текст')
                            ->rows(3),

                        Group::make([
                            Input::make('item.object_feature_5_title')
                                ->title('Вкладка 5: название'),

                            Cropper::make('item.object_feature_5_img')
                                ->title('Вкладка 5: изображение')
                                ->url($this->item->object_feature_5_img),
                        ]),

                        Quill::make('item.object_feature_5_text')
                            ->title('Вкладка 5: текст')
                            ->rows(3),
                    ]),

                    'Уникальность строительства' => Layout::rows([
                        Input::make('item.construction_feature_title')
                            ->title('Заголовок блока'),

                        Cropper::make('item.construction_feature_img')
                            ->title('Изображение в центре блока')
                            ->url($this->item->construction_feature_img),

                        Group::make([
                            Input::make('item.construction_feature_1_title')
                                ->title('Пункт 1: заголовок'),

                            Input::make('item.construction_feature_1_text')
                                ->title('Пункт 1: текст'),
                        ]),

                        Group::make([
                            Input::make('item.construction_feature_2_title')
                                ->title('Пункт 2: заголовок'),

                            Input::make('item.construction_feature_2_text')
                                ->title('Пункт 2: текст'),
                        ]),

                        Group::make([
                            Input::make('item.construction_feature_3_title')
                                ->title('Пункт 3: заголовок'),

                            Input::make('item.construction_feature_3_text')
                                ->title('Пункт 3: текст'),
                        ]),

                        Group::make([
                            Input::make('item.construction_feature_4_title')
                                ->title('Пункт 4: заголовок'),

                            Input::make('item.construction_feature_4_text')
                                ->title('Пункт 4: текст'),
                        ]),
                    ]),

                    'Отделка квартир' => Layout::rows($this->finishingFields()),

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
        $fields = $request->get('item', []);

        if (isset($fields['attachments'])) {
            unset($fields['attachments']);
        }

        $this->item->fill($fields)->save();
        $this->item->attachments()->detach();
        $this->item->attachments()->attach($request->input('item.attachments', []));
        $this->syncFinishings($request->get('finishings', []));

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

    private function prepareFinishingRows(Jk $item): array
    {
        $finishings = $item->finishings->values();
        $rows = [];

        for ($index = 0; $index < self::FINISHING_ROW_COUNT; $index++) {
            $finishing = $finishings->get($index);

            $rows[$index] = [
                'active' => $finishing?->active ?? true,
                'title' => $finishing?->title,
                'img' => $finishing?->img,
                'link' => $finishing?->link,
            ];
        }

        return $rows;
    }

    private function finishingUrl(int $index): ?string
    {
        return $this->item->finishings->values()->get($index)?->img;
    }

    private function finishingFields(): array
    {
        $fields = [];

        for ($index = 0; $index < self::FINISHING_ROW_COUNT; $index++) {
            $number = $index + 1;

            $fields[] = Group::make([
                CheckBox::make("finishings.$index.active")
                    ->placeholder('Показывать')
                    ->sendTrueOrFalse(),

                Input::make("finishings.$index.title")
                    ->title("Помещение $number: название"),
            ]);

            $fields[] = Cropper::make("finishings.$index.img")
                ->title("Помещение $number: изображение")
                ->url($this->finishingUrl($index));

            $fields[] = Input::make("finishings.$index.link")
                ->title("Помещение $number: 3D-Тур");
        }

        return $fields;
    }

    private function syncFinishings(array $finishings): void
    {
        $this->item->finishings()->delete();

        foreach ($finishings as $index => $finishing) {
            $title = trim((string) ($finishing['title'] ?? ''));
            $img = $finishing['img'] ?? null;
            $link = $finishing['link'] ?? null;

            if ($title === '' && blank($img) && blank($link)) {
                continue;
            }

            JkFinishing::create([
                'active' => (bool) ($finishing['active'] ?? false),
                'title' => $title ?: 'Отделка',
                'img' => $img,
                'link' => $link,
                'sort' => ((int) $index + 1) * 10,
                'jk_id' => $this->item->id,
            ]);
        }
    }
}
