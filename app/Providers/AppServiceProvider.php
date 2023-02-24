<?php

namespace App\Providers;

use App\Models\Cms;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        Model::preventLazyLoading(! app()->isProduction());

        Paginator::useTailwind();

        if (! app()->runningInConsole()) {
            // Setting
            $setting = Setting::first();
            view()->share('setting', $setting);

            // Cms
            $cms = Cms::first();
            view()->share('cms', $cms);

            // Language
            $default_language = config('kodebazar.default_language');
            $header_languages = Language::where('status', 1)->get(['id', 'name', 'code']);
            view()->share('header_languages', $header_languages);
            view()->share('defaultLanguage', $default_language);
        }
    }
}
