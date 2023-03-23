<?php

namespace App\Services\Admin\Setting;

use App\Models\Seo;

class SeoContentUpdateService
{
    public function execute(object $request, object $seo): Seo
    {
        $seo->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            deleteImage($seo->image);
            $url = uploadFileToPublic('seo/image', $request->image);
            $seo->update(['image' => $url]);
        }

        return $seo;
    }
}
