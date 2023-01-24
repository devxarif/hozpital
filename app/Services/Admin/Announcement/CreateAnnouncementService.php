<?php

namespace App\Services\Admin\Announcement;

use App\Models\Announcement;

class CreateAnnouncementService
{
    public function execute(object $request): Announcement
    {
        $announcement = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ]);

        return $announcement;
    }
}
