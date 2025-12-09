<?php

namespace App\Orchid\Screens\Domclick;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class DomclickFeedScreen extends Screen
{
    public function query(): iterable
    {
        return [];
    }

    public function name(): ?string
    {
        return 'Фид DomClick';
    }

    public function description(): ?string
    {
        return 'Черновой XML-фид для сервиса Домклик на основе текущих данных сайта.';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Скачать XML')
                ->icon('bs.download')
                ->route('platform.domclick.feed.download'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::view('admin.domclick_feed_help'),
        ];
    }
}
