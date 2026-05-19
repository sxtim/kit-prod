<?php

namespace App\Orchid\Screens\CityCenter;

use App\Services\CityCenterFeedGenerator;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CityCenterFeedScreen extends Screen
{
    public function query(): iterable
    {
        return [];
    }

    public function name(): ?string
    {
        return 'Фид Сити-центр';
    }

    public function description(): ?string
    {
        return 'XML-фид для каталога новостроек Сити-центра на основе активных квартир сайта.';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Скачать XML')
                ->icon('bs.download')
                ->route('platform.citycenter.feed.download'),

            Button::make('Сформировать и опубликовать')
                ->icon('bs.cloud-upload')
                ->method('publish'),
        ];
    }

    public function layout(): iterable
    {
        return [
            Layout::view('admin.citycenter_feed_help'),
        ];
    }

    public function publish(CityCenterFeedGenerator $generator)
    {
        $xml = $generator->generate();

        if ($xml === '') {
            Alert::error('Не удалось сформировать XML: генератор вернул пустой результат.');

            return redirect()->route('platform.citycenter.feed');
        }

        $relativePath = 'feeds/citycenter_feed.xml';
        $path = public_path($relativePath);

        try {
            @mkdir(dirname($path), 0775, true);
            $written = file_put_contents($path, $xml);
        } catch (\Throwable $e) {
            Alert::error('Не удалось сохранить файл feeds/citycenter_feed.xml в public/. Проверьте права на запись.');

            return redirect()->route('platform.citycenter.feed');
        }

        if ($written === false) {
            Alert::error('Не удалось сохранить файл feeds/citycenter_feed.xml в public/. Проверьте права на запись.');

            return redirect()->route('platform.citycenter.feed');
        }

        $url = url('/'.$relativePath);

        Alert::info('Фид сформирован и опубликован: '.$url);

        return redirect()->route('platform.citycenter.feed');
    }
}
