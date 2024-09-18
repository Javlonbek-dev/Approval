<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortNameRequest;
use App\Http\Resources\ShortNameResource;
use App\Models\Thsht;

class THSHTController extends Controller
{
    public function index()
    {
        return THSHT::all();
    }

    public function show(Thsht $thsht)
    {
        return new ShortNameResource($thsht);
    }

    public function store(ShortNameRequest $request)
    {
        return new ShortNameResource(Thsht::create($request->validated()));
    }

    public function update(ShortNameRequest $request, Thsht $thsht)
    {
        $thsht->update($request->validated());

        return new ShortNameResource($thsht);
    }

    public function destroy(Thsht $thsht)
    {
        $thsht->delete();

        return response()->noContent();
    }
}
