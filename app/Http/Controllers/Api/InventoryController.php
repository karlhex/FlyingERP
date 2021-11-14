<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Http\Requests\InventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Traits\WithSearch;

class InventoryController extends Controller
{
    use WithSearch;

    public function __construct() {
        $this->initSearch(
            Inventory::class,
            ['name', 'company_name'],
            InventoryResource::class
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
        return InventoryResource::collection(Inventory::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryRequest $request)
    {
        //
        $productinfo = Inventory::create($request->validated());

        return new InventoryResource($productinfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $productinfo)
    {
        return new InventoryResource($productinfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryRequest $request, Inventory $productinfo)
    {
        $productinfo->update($request->validated());

        return new InventoryResource($productinfo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $productinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $productinfo)
    {
        $productinfo->delete();

        return response()->noContent();
    }
}
