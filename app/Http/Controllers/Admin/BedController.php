<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Bed\CreateBedService;
use App\Services\Admin\Bed\UpdateBedService;
use App\Http\Requests\Admin\Bed\BedCreateRequest;
use App\Http\Requests\Admin\Bed\BedUpdateRequest;
use App\Models\BedType;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['beds'] = Bed::latest()->paginate(12);
        $data['bed_types'] = BedType::withCount('beds')->latest()->get(['id','name','slug']);
        $data['floors'] = Bed::Floor;

        return inertia('Admin/Bed/Index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  BedCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedCreateRequest $request)
    {
        (new CreateBedService())->execute($request);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bed $bed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BedUpdateRequest $request
     * @param  Bed $bed
     * @return \Illuminate\Http\Response
     */
    public function update(BedUpdateRequest $request, Bed $bed)
    {
        (new UpdateBedService())->execute($request, $bed);

        $this->flashSuccess('Bed updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bed $bed
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
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function bedTypeWiseBeds(Request $request){
        if ($request->type && $request->type != 'all') {
            $type = BedType::whereSlug($request->type)->firstOrFail();
            $beds = $type->beds()->latest()->paginate(12);
        } else {
            $beds = Bed::latest()->paginate(12);
        }

        return $beds;
    }
}
