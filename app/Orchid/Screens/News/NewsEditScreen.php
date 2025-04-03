<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\Attach;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class NewsEditScreen extends Screen
{
    /**
     * @var News
     */
    public $news;

    /**
     * Query data.
     *
     * @param News $news
     *
     * @return array
     */
    public function query(News $news): array
    {
        $news->load('attachments');

        return [
            'news' => $news
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return $this->news->exists ? 'Редактировать новость' : 'Добавить новость';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Новости";
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
                ->canSee(!$this->news->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->news->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->news->exists),
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
                Input::make('news.title')
                    ->title('Наименование')
                    ->placeholder('Наименование новости')
                    ->required(),

                Quill::make('news.description')
                    ->title('Описание')
                    ->placeholder('Описание новости')
                    ->rows(3)
                    ->maxlength(1000),
                Attach::make('news.attachments')->multiple()->maxCount(3),
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
        $this->news->fill($request->get('news'))->save();
        $this->news->attachments()->detach();
        $this->news->attachments()->attach($request->input('news.attachments', []));

        Alert::info('Сохранено');

        return redirect()->route('platform.news.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->news->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.news.list');
    }
}
