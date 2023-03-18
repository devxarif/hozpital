<?php

namespace App\Services\Admin\Setting\SocialLogin;

class UpdateSocialProviderDataService
{
    public function execute(object $data): bool
    {
        switch ($data->provider) {
            case 'google':
                $data->validate([
                    'google_id' => 'required',
                    'google_secret' => 'required',
                ]);

                checkSetConfig('services.google.client_id', $data->google_id);
                checkSetConfig('services.google.client_secret', $data->google_secret);
                setConfig('services.google.active', $data->google_active ? true : false);
                break;
            case 'facebook':
                $data->validate([
                    'facebook_id' => 'required',
                    'facebook_secret' => 'required',
                ]);

                checkSetConfig('services.facebook.client_id', $data->facebook_id);
                checkSetConfig('services.facebook.client_secret', $data->facebook_secret);
                setConfig('services.facebook.active', $data->facebook_active ? true : false);
                break;
            case 'twitter':
                $data->validate([
                    'twitter_id' => 'required',
                    'twitter_secret' => 'required',
                ]);

                checkSetConfig('services.twitter.client_id', $data->twitter_id);
                checkSetConfig('services.twitter.client_secret', $data->twitter_secret);
                setConfig('services.twitter.active', $data->twitter_active ? true : false);
                break;
            case 'linkedin':
                $data->validate([
                    'linkedin_id' => 'required',
                    'linkedin_secret' => 'required',
                ]);

                checkSetConfig('services.linkedin.client_id', $data->linkedin_id);
                checkSetConfig('services.linkedin.client_secret', $data->linkedin_secret);
                setConfig('services.linkedin.active', $data->linkedin_active ? true : false);
                break;
        }

        return true;
    }
}
