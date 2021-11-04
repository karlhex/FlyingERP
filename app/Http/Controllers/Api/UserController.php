<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Traits\WithSearch;

class UserController extends Controller
{
    use WithSearch;

    public function __construct() {
        $this->initSearch(
            User::class,
            ['name', 'email'],
            UserResource::class
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
        return UserResource::collection(User::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SelectUser  $selectUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SelectUser  $selectUser
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SelectUser  $selectUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }

}
