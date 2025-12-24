<?php

namespace App\Orchid\Screens\Domclick;

use App\Services\DomclickFeedGenerator;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
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

            Button::make('Сформировать и опубликовать')
                ->icon('bs.cloud-upload')
                ->method('publish'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::view('admin.domclick_feed_help'),
        ];
    }

    public function publish(DomclickFeedGenerator $generator)
    {
        $xml = $generator->generate();

        if ($xml === '') {
            Alert::error('Не удалось сформировать XML: генератор вернул пустой результат.');

            return redirect()->route('platform.domclick.feed');
        }

        $relativePath = 'feeds/domclick_feed.xml';
        $path = public_path($relativePath);

        try {
            @mkdir(dirname($path), 0775, true);
            $written = file_put_contents($path, $xml);
        } catch (\Throwable $e) {
            Alert::error('Не удалось сохранить файл feeds/domclick_feed.xml в public/. Проверьте права на запись.');

            return redirect()->route('platform.domclick.feed');
        }

        if ($written === false) {
            Alert::error('Не удалось сохранить файл feeds/domclick_feed.xml в public/. Проверьте права на запись.');

            return redirect()->route('platform.domclick.feed');
        }

        $url = url('/'.$relativePath);

        Alert::info('Фид сформирован и опубликован: '.$url);

        return redirect()->route('platform.domclick.feed');
    }
}
