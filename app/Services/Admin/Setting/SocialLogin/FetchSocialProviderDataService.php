<?php

namespace App\Services\Admin\Setting\SocialLogin;

class FetchSocialProviderDataService
{
    public function execute(string $provider): array
    {
        switch ($provider) {
            case 'google':
                return [
                    'google_active' => config('services.google.active') ? true : false,
                    'google_id' => config('services.google.client_id'),
                    'google_secret' => config('services.google.client_secret'),
                ];
                break;
            case 'facebook':
                return [
                    'facebook_active' => config('services.facebook.active'),
                    'facebook_id' => config('services.facebook.client_id'),
                    'facebook_secret' => config('services.facebook.client_secret'),
                ];
                break;
            case 'twitter':
                return [
                    'twitter_active' => config('services.twitter.active'),
                    'twitter_id' => config('services.twitter.client_id'),
                    'twitter_secret' => config('services.twitter.client_secret'),
                ];
                break;
            case 'linkedin':
                return [
                    'linkedin_active' => config('services.linkedin.active'),
                    'linkedin_id' => config('services.linkedin.client_id'),
                    'linkedin_secret' => config('services.linkedin.client_secret'),
                ];
                break;
        }

        return true;
    }
}
