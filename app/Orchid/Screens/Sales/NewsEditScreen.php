<?php

namespace app\Orchid\Screens\Sales;

use App\Models\News;
use App\Models\Sales;
use App\Orchid\Screens\News\Link;
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

use function App\Orchid\Screens\News\redirect;

class SalesEditScreen extends Screen
{
    /**
     * @var News
     */
    public $sales;

    /**
     * Query data.
     *
     * @param Sales $sales
     *
     * @return array
     */
    public function query(Sales $sales): array
    {
        $sales->load('attachments');

        return [
            'sale' => $sales,
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return $this->news->exists ? 'Редактировать акцию' : 'Добавить акцию';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Акции";
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
                ->canSee(!$this->sales->exists),

            Button::make('Обновить')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->sales->exists),

            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->sales->exists),
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
                Input::make('sales.title')
                    ->title('Наименование')
                    ->placeholder('Наименование акции')
                    ->required(),

                Quill::make('sales.description')
                    ->title('Описание')
                    ->placeholder('Описание акции')
                    ->rows(3)
                    ->maxlength(1000),
                Attach::make('sales.attachments')->multiple()->maxCount(3),
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
        $this->sales->fill($request->get('sales'))->save();
        $this->sales->attachments()->syncWithoutDetaching(
            $request->input('sales.attachments', [])
        );

        Alert::info('Сохранено');

        return redirect()->route('platform.sales.list');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->sales->delete();

        Alert::info('Удалено');

        return redirect()->route('platform.news.list');
    }
}
