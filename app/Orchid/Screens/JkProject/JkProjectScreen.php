<?php

namespace App\Orchid\Screens\JkProject;

use App\Models\JkProject;
use App\Orchid\Layouts\JkProjectListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class JkProjectScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'items' => JkProject::filters()->defaultSort('sort')->paginate(10),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'ЖК';
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
                ->route('platform.jk.create'),
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
            JkProjectListLayout::class,
        ];
    }
}
