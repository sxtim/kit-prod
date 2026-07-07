<?php

namespace App\Providers;

use App\Services\ResponsiveImageService;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Events\UploadedFileEvent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(UploadedFileEvent::class, function (UploadedFileEvent $event): void {
            app(ResponsiveImageService::class)->safelyGenerateCopiesForAttachment($event->attachment);
        });

        if (Schema::hasTable('site_settings')) {
            $settings = SiteSetting::query()->first();

            View::share('siteSettings', $settings);
        }
    }
}
