<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionRequest;
use App\Http\Resources\RegionResource;
use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::all();
    }

    public function show(Region $region)
    {
        return new RegionResource($region);
    }

    public function store(RegionRequest $request)
    {
        return new RegionResource(Region::create($request->validated()));
    }

    public function update(RegionRequest $request, Region $region)
    {
        $region->update($request->validated());

        return new RegionResource($region);
    }

    public function destroy(Region $region)
    {
        $region->delete();
        
        return response()->json(null, 204);
    }

}
