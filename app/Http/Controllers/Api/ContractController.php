<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Traits\WithReplaceList;
use App\Traits\WithSid;

class ContractController extends Controller
{
    use WithReplaceList;
    use WithSid;

    public function __construct() {
        $this->sidkey = 'contract';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = config('paginate.per_page');

        return ContractResource::collection(Contract::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->validated());

        $this->setSid($contract->sid);

        return new ContractResource($contract);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SelectContract  $selectContract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {

        return new ContractResource($contract);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectContract  $selectContract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());

        $sops = $request->input('sops');
        $this->replaceList($contract, 'sops', $sops);
        $products = $request->input('products');
        $this->replaceList($contract, 'products', $products);

        return new ContractResource($contract);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectContract  $selectContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();

        return response()->noContent();
    }
}
