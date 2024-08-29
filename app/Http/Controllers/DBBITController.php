<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortName;
use App\Http\Resources\DBITResource;
use App\Models\Dbit;

class DBBITController extends Controller
{
    public function index()
    {
        return DBIT::all();
    }

    public function show(Dbit $dbit)
    {
        return new  DBITResource($dbit);
    }

    public function store(ShortName $request)
    {
        return new DBITResource(Dbit::create($request->validated()));
    }

    public function update(DBIT $dbit, ShortName $request)
    {
        $dbit->update($request->validated());
        return new DBITResource($dbit);
    }

    public function destroy(Dbit $dbit)
    {
        $dbit->delete();
        return response()->json(null, 204);
    }
}
