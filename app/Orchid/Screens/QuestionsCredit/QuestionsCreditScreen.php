<?php

namespace App\Orchid\Screens\QuestionsCredit;

use App\Models\Questions;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;

class QuestionsCreditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'items' => Questions::filters()->defaultSort('updated_at', 'desc')->where('entity', 'credit')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Вопрос ответ УК';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Создать')
                ->icon('pencil')
                ->route('platform.questions_credit.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('items', [
                TD::make('id')->sort()->render(function(Questions $item) {
                    return Link::make($item->id)
                        ->route('platform.questions_credit.edit', $item);
                }),
                TD::make('question', 'Вопрос')->filter(Input::make()),
                TD::make('answer', 'Ответ')->filter(Input::make()),
                TD::make('sort', 'Сортировка')->filter(Input::make())->sort(),
                TD::make('created_at', 'Дата публикации')->sort(),
                TD::make('updated_at', 'Дата изменения')->sort(),
            ]),
        ];
    }
}
