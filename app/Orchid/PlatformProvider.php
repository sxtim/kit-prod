<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make(__('Пользователи'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make('Квартиры')
                ->icon('bs.house')
                ->route('platform.house.list'),

            Menu::make('Новости')
                ->icon('bs.list')
                ->route('platform.news.list'),

            Menu::make('Акции')
                ->icon('bs.currency-dollar')
                ->route('platform.sales.list'),

            Menu::make('О компании')
                ->icon('bs.buildings')
                ->route('platform.about_company.list'),

//            Menu::make(__('Roles'))
//                ->icon('bs.shield')
//                ->route('platform.systems.roles')
//                ->permission('platform.systems.roles')
//                ->divider(),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
