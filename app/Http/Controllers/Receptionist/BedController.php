<?php

namespace App\Http\Controllers\Receptionist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedCreateRequest;
use App\Http\Requests\Admin\Bed\BedUpdateRequest;
use App\Models\Bed;
use App\Models\BedType;
use App\Services\Admin\Bed\CreateBedService;
use App\Services\Admin\Bed\UpdateBedService;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Bed::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['number', 'charge'], $request->keyword);
        }

        if($request->has('status') && $request->filled('status')) {
            $query->whereLike(['status'], $request->status);
        }

        if($request->has('bed_type') && $request->filled('bed_type')) {
            $query->whereHas('bedType', function ($q) use ($request) {
                $q->where('id', $request->bed_type);
            });
        }

        if($request->has('bed_floor') && $request->filled('bed_floor')) {
            $query->whereHas('floor', function ($q) use ($request) {
                $q->where('id', $request->bed_floor);
            });
        }

        $data['beds'] = $query->with('bedType:id,name', 'floor:id,name')->latest()->paginate(20)->withQueryString();
        $data['bed_types'] = BedType::withCount('beds')->latest()->get(['id', 'name', 'slug']);
        $data['filter'] = $request;
        $data['total_bed_count'] = Bed::count();

        return inertia('Receptionist/Bed/Index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BedCreateRequest $request)
    {
        (new CreateBedService)->execute($request);

        $this->flashSuccess('Bed created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BedUpdateRequest $request, Bed $bed)
    {
        (new UpdateBedService)->execute($request, $bed);

        $this->flashSuccess('Bed updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();

        $this->flashSuccess('Bed deleted successfully');

        return back();
    }

    /**
     * Fetch bedtype wise beds collection
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function bedTypeWiseBeds(Request $request)
    {
        if ($request->type && $request->type != 'all') {
            $type = BedType::whereSlug($request->type)->firstOrFail();
            $beds = $type->beds()->with('bedType:id,name')->latest()->paginate(20)->withQueryString();
        } else {
            $beds = Bed::with('bedType:id,name')->latest()->paginate(20)->withQueryString();
        }

        return $beds;
    }
}
