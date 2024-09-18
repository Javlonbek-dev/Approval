<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function store(CompanyRequest $request)
    {
        return new CompanyResource(Company::create($request->validated()));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }
}
