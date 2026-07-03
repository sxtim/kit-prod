<?php

namespace App\Orchid\Screens\JkConstructionProgress;

use App\Models\Jk;
use App\Models\JkConstructionProgress;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class JkConstructionProgressScreen extends Screen
{
    public $jk;

    public function query(Jk $jk): iterable
    {
        $this->jk = $jk;

        return [
            'items' => JkConstructionProgress::where('jk_id', $jk->id)
                ->filters()
                ->defaultSort('report_date', 'desc')
                ->paginate(10),
        ];
    }

    public function name(): ?string
    {
        return 'Ход строительства';
    }

    public function description(): ?string
    {
        return $this->jk()->admin_title;
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Добавить отчет')
                ->icon('pencil')
                ->route('platform.positions.construction-progress.create', $this->jk()),

            Link::make('Вернуться к позиции')
                ->icon('arrow-left')
                ->route('platform.positions.edit', $this->jk()),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::table('items', [
                TD::make('id', 'ID')->sort()->render(function (JkConstructionProgress $item) {
                    return Link::make((string) $item->id)
                        ->route('platform.positions.construction-progress.edit', [$this->jk(), $item]);
                }),
                TD::make('active', 'Активность')->sort()->render(function (JkConstructionProgress $item) {
                    return $item->active ? 'Да' : 'Нет';
                }),
                TD::make('title', 'Название')->filter(Input::make()),
                TD::make('report_date', 'Дата отчета')->sort()->render(function (JkConstructionProgress $item) {
                    return $item->report_date?->format('d.m.Y');
                }),
                TD::make('updated_at', 'Дата изменения')->sort(),
            ]),
        ];
    }

    private function jk(): Jk
    {
        if ($this->jk instanceof Jk) {
            return $this->jk;
        }

        $jk = request()->route('jk');

        if ($jk instanceof Jk) {
            return $jk;
        }

        return Jk::findOrFail($jk);
    }
}
