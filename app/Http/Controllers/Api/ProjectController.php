<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Traits\WithReplaceList;
use App\Traits\WithSearch;
use App\Traits\WithSid;

class ProjectController extends Controller
{
    use WithSearch;
    use WithSid;
    use WithReplaceList;

    public function __construct() {
        $this->initSearch(
            Project::class,
            ['name', 'sid'],
            ProjectResource::class
        );

        $this->sidkey = 'project';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = config('paginate.per_page');
        return ProjectResource::collection(Project::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //
        $project = Project::create($request->validated());

        $roles = $request->input('roles');
        $this->replaceList($project, 'roles', $roles);
        $plans = $request->input('plans');
        $this->replaceList($project, 'plans', $plans);

        $this->setSid($project->sid);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        $roles = $request->input('roles');
        $this->replaceList($project, 'roles', $roles);
        $plans = $request->input('plans');
        $this->replaceList($project, 'plans', $plans);

        $this->setSid($project->sid);

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->noContent();
    }
}
