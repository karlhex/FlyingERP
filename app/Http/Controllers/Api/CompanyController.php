<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Traits\WithSearch;

class CompanyController extends Controller
{
    use WithSearch;

    public function __construct() {
        $this->initSearch(
            Company::class,
            ['name', 'address'],
            CompanyResource::class
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = config('paginate.per_page');
        return CompanyResource::collection(Company::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->validated());

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SelectCompany  $selectCompany
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectCompany  $selectCompany
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectCompany  $selectCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->noContent();
    }

}
