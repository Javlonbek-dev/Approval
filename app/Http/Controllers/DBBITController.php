<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortNameRequest;
use App\Http\Resources\ShortNameResource;
use App\Models\Dbit;

class DBBITController extends Controller
{
    public function index()
    {
        return DBIT::all();
    }

    public function show(Dbit $dbit)
    {
        return new  ShortNameResource($dbit);
    }

    public function store(ShortNameRequest $request)
    {
        return new ShortNameResource(Dbit::create($request->validated()));
    }

    public function update(DBIT $dbit, ShortNameRequest $request)
    {
        $dbit->update($request->validated());
        return new ShortNameResource($dbit);
    }

    public function destroy(Dbit $dbit)
    {
        $dbit->delete();
        return response()->json(null, 204);
    }
}
