<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Http\Requests\ContractRequest;
use App\Http\Resources\ContractResource;
use App\Traits\WithReplaceList;

class ContractController extends Controller
{
    use WithReplaceList;

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

        $work_experiences = $request->input('work_experiences');
        $this->replaceList($contract, 'work_experiences', $work_experiences);
        $educations = $request->input('educations');
        $this->replaceList($contract, 'educations', $educations);
        $project_experiences = $request->input('project_experiences');
        $this->replaceList($contract, 'project_experiences', $project_experiences);
        $certificates = $request->input('certificates');
        $this->replaceList($contract, 'certificates', $certificates);

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
