<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SelectOption;
use App\Http\Requests\SORequest;
use App\Http\Resources\SOResource;

class SOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = config('paginate.per_page');

        return SOResource::collection(SelectOption::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SORequest $request)
    {
        $so = SelectOption::create($request->validated());

        return new SOResource($so);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SelectOption  $so
     * @return \Illuminate\Http\Response
     */
    public function show(SelectOption $so)
    {
        return new SOResource($so);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectOption  $so
     * @return \Illuminate\Http\Response
     */
    public function update(SORequest $request, SelectOption $so)
    {
        $so->update($request->validated());

        return new SOResource($so);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectOption  $so
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectOption $so)
    {
        $so->delete();

        return response()->noContent();
    }
}
