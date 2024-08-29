<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortName;
use App\Http\Resources\IFUTResource;
use App\Models\Ifut;
use Illuminate\Http\Request;

class IFUTController extends Controller
{
    public function index()
    {
        return IFUT::all();
    }

    public function show(Ifut $ifut)
    {
        return new IFUTResource($ifut);
    }

    public function store(ShortName $request)
    {
        return new IFUTResource(Ifut::create($request->validated()));
    }

    public function update(ShortName $request, Ifut $ifut)
    {
        $ifut->update($request->validated());
        return new IFUTResource($ifut);
    }

    public function destroy(Ifut $ifut)
    {
        $ifut->delete();
        return response()->json(null, 204);
    }
}
