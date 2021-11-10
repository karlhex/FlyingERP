<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductInfo;
use App\Http\Requests\ProductInfoRequest;
use App\Http\Resources\ProductInfoResource;
use App\Traits\WithSearch;

class ProductInfoController extends Controller
{
    use WithSearch;


    public function __construct() {
        $this->initSearch(
            ProductInfo::class,
            ['name', 'company_name'],
            ProductInfoResource::class
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
        return ProductInfoResource::collection(ProductInfo::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductInfoRequest $request)
    {
        //
        $productinfo = ProductInfo::create($request->validated());

        return new ProductInfoResource($productinfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductInfo  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function show(ProductInfo $productinfo)
    {
        return new ProductInfoResource($productinfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductInfo  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function update(ProductInfoRequest $request, ProductInfo $productinfo)
    {
        $productinfo->update($request->validated());

        return new ProductInfoResource($productinfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductInfo  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductInfo $productinfo)
    {
        $productinfo->delete();

        return response()->noContent();
    }
}
