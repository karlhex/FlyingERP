<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Traits\WithReplaceList;
use App\Traits\WithSearch;
use App\Traits\WithSid;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    use WithReplaceList;
    use WithSearch;
    use WithSid;

    public function __construct() {
        $this->initSearch(
            Employee::class,
            ['employee_sid', 'fullname'],
            EmployeeResource::class
        );
        $this->sidkey="employee";
    }

    protected function updateData(EmployeeRequest $request, $employee) {
        $work_experiences = $request->input('work_experiences');
        $this->replaceList($employee, 'work_experiences', $work_experiences);
        $educations = $request->input('educations');
        $this->replaceList($employee, 'educations', $educations);
        $project_experiences = $request->input('project_experiences');
        $this->replaceList($employee, 'project_experiences', $project_experiences);
        $certificates = $request->input('certificates');
        $this->replaceList($employee, 'certificates', $certificates);

        $this->setSid($employee->employee_sid);
    }

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

        $this->updateData($request, $employee);

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

        $this->updateData($request, $employee);

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
        $employee->certificates()->delete();
        $employee->work_experiences()->delete();
        $employee->project_experiences()->delete();
        $employee->educations()->delete();
        $employee->delete();

        Log::debug('destroyed');

        return response()->noContent();
    }
}
