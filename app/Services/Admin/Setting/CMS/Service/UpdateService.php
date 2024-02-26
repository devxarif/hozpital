<?php

namespace App\Services\Admin\Setting\CMS\Service;

use App\Models\Service;

class UpdateService
{
    public function execute(object $request, object $service): Service
    {
        $service->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'show_in_header' => $request->show_in_header ?? false,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            deleteImage($service->image);
            $url = uploadFileToPublic('setting/cms/service', $request->image);
            $service->update(['image' => $url]);
        }

        return $service;
    }
}
