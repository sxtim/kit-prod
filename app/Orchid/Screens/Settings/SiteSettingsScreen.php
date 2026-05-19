<?php

namespace App\Orchid\Screens\Settings;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class SiteSettingsScreen extends Screen
{
    /**
     * @var SiteSetting
     */
    public $settings;

    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(SiteSetting $settings): iterable
    {
        if (Schema::hasTable('site_settings')) {
            $settings = SiteSetting::query()->first() ?? $settings;
        }

        $this->settings = $settings;

        return [
            'settings' => $settings,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Настройки сайта';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Общие настройки сайта';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Сохранить')
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Switcher::make('settings.snowfall_enabled')
                    ->title('Снегопад на сайте')
                    ->placeholder('Включить снегопад на сайте')
                    ->sendTrueOrFalse(),
            ]),
        ];
    }

    /**
     * Save settings.
     */
    public function save(Request $request)
    {
        if (!Schema::hasTable('site_settings')) {
            Alert::warning('Таблица настроек ещё не создана. Выполните миграции.');

            return redirect()->route('platform.settings');
        }

        $data = $request->get('settings', []);

        $settings = SiteSetting::query()->first() ?? new SiteSetting();
        $settings->fill($data);
        $settings->save();

        Alert::info('Настройки сохранены');

        return redirect()->route('platform.settings');
    }
}
