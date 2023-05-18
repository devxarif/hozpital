<?php

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(Request $request): array
    {
        // Authenticate user
        $data['authenticatedUser'] = currentUser();
        if (auth()->check() && currentUser()->role == 'employee') {
            $data['employeeOrganization'] = auth()->user()->employee->organization;
        }
        if (auth()->check() && currentUser()->role == 'owner') {
            $data['currentOrganization'] = currentOrganization();
            $data['ownerOrganization'] = auth()->user()->organization;
        }

        // Flash messages
        $data['flash'] = [
            'success' => session('success'),
            'error' => session('error'),
            'warning' => session('warning'),
        ];

        // Language
        $data['locale'] = session()->has('current_lang') ? session('current_lang') : app()->getLocale();
        $data['languageList'] = Language::all(['id', 'language_code', 'name','country_code']);
        // $data['language'] = include lang_path($data['locale'] . "/messages.php");
        $data['language'] = translations(resource_path('lang/'.$data['locale'].'.json'));

        // Notifications
        $data['notifications'] = auth()->check() ? auth()->user()->notifications->take(5) : [];
        $data['unreadNotificationsCount'] = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;

        // Env variables
        $data['app_version'] = config('app.app_version');

        // Settings
        $data['setting'] = Setting::first();

        return array_merge(parent::share($request), $data);
    }
}
