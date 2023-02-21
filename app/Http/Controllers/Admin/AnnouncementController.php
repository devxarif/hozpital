<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementSaveRequest;
use App\Models\Announcement;
use App\Services\Admin\Announcement\CreateAnnouncementService;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Announcement::query();

        if($request->has('type') && $request->filled('type') && $request->type != 'all') {
            $query->whereType($request->type);
        }

        $data['announcements'] = $query->latest()->paginate(20)->withQueryString();
        $data['filter'] = $request;

        $announcements = Announcement::all();
        $data['public_announcements_count'] = $announcements->where('type', 'public')->count();
        $data['private_announcements_count'] = $announcements->where('type', 'private')->count();
        $data['total_announcements_count'] = $announcements->count();

        return inertia('Admin/Announcement/Index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementSaveRequest $request)
    {
        (new CreateAnnouncementService)->execute($request);

        $this->flashSuccess('success', 'Announcement created successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementSaveRequest $request, Announcement $announcement)
    {
        (new CreateAnnouncementService)->execute($request, $announcement);

        $this->flashSuccess('success', 'Announcement updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        $this->flashSuccess('success', 'Announcement deleted successfully!');

        return back();
    }
}
