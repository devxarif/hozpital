<?php

namespace App\Providers;

use App\Models\Cms;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Language;
use App\Models\Department;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
        Model::preventSilentlyDiscardingAttributes(! app()->isProduction());

        Paginator::useTailwind();

        if (! app()->runningInConsole()) {
            // Setting
            $setting = Setting::first();

            // Cms
            $cms = Cms::first();

            // Language
            $default_language = config('kodebazar.default_language');
            $header_languages = Language::where('status', 1)->get(['id', 'name', 'language_code', 'country_code']);

            // Services
            $services = Service::where('show_in_header',true)->get(['id','name', 'slug']);

            // Departments
            $departments = Department::all(['id','name', 'slug', 'show_in_header', 'show_in_footer']);
            // $departments = Department::where('show_in_header',true)->get(['id','name', 'slug']);

            // View Share
            view()->share('setting', $setting);
            view()->share('cms', $cms);
            view()->share('header_languages', $header_languages);
            view()->share('defaultLanguage', $default_language);
            view()->share('services', $services);
            view()->share('header_departments', $departments->where('show_in_header',true));
            view()->share('footer_departments', $departments->where('show_in_footer',true));
        }
    }
}
