<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Traits\WithReplaceList;

class EmployeeController extends Controller
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

        return EmployeeResource::collection(Employee::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SelectEmployee  $selectEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        return new EmployeeResource($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectEmployee  $selectEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        $work_experiences = $request->input('work_experiences');
        $this->replaceList($employee, 'work_experiences', $work_experiences);
        $educations = $request->input('educations');
        $this->replaceList($employee, 'educations', $educations);
        $project_experiences = $request->input('project_experiences');
        $this->replaceList($employee, 'project_experiences', $project_experiences);
        $certificates = $request->input('certificates');
        $this->replaceList($employee, 'certificates', $certificates);

        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectEmployee  $selectEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->noContent();
    }
}
