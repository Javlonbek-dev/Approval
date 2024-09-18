<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortNameRequest;
use App\Http\Resources\ShortNameResource;
use App\Models\Ifut;

class IFUTController extends Controller
{
    public function index()
    {
        return IFUT::all();
    }

    public function show(Ifut $ifut)
    {
        return new ShortNameResource($ifut);
    }

    public function store(ShortNameRequest $request)
    {
        return new ShortNameResource(Ifut::create($request->validated()));
    }

    public function update(ShortNameRequest $request, Ifut $ifut)
    {
        $ifut->update($request->validated());
        return new ShortNameResource($ifut);
    }

    public function destroy(Ifut $ifut)
    {
        $ifut->delete();
        return response()->json(null, 204);
    }
}
