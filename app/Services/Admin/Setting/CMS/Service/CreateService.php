<?php

namespace App\Services\Admin\Setting\CMS\Service;

use App\Models\Service;

class CreateService
{
    public function execute(object $request): Service
    {
        $service = Service::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'show_in_header' => $request->show_in_header ?? false,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('setting/cms/service', $request->image);
            $service->update(['image' => $url]);
        }

        return $service;
    }
}
 