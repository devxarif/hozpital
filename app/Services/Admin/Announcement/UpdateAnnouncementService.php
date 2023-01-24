<?php

namespace App\Services\Admin\Announcement;

use App\Models\Announcement;

class UpdateAnnouncementService
{
    public function execute(object $request, object $announcement): Announcement
    {
        $announcement->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return $announcement;
    }
}
