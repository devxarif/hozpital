<?php

namespace App\Services\Admin\Setting;

use App\Models\Service;

class FetchWebsiteContentService
{
    public function fetch($provider)
    {
        switch ($provider) {
            case 'website_sections':
                $this->website_sections();
                break;
            case 'service':
                $content = $this->service();
                break;
            case 'testimonial':
                $this->testimonial();
                break;
            case 'partners':
                $this->partners();
                break;
            case 'news':
                $this->news();
                break;
            default:
                $content = [];
                break;
        }

        return $content;
    }

    protected function website_sections(){

    }

    protected function service(){
        return Service::all();
    }

    protected function testimonial(){

    }

    protected function partners(){

    }

    protected function news(){

    }
}
