<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\SOController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/allsos', [SOController::class, 'all']);
Route::get('/user/search', [\App\Http\Controllers\Api\UserController::class, 'search']);
Route::get('/company/search', [\App\Http\Controllers\Api\CompanyController::class, 'search']);
Route::get('/person/search', [\App\Http\Controllers\Api\PersonController::class, 'search']);
Route::get('/project/search', [\App\Http\Controllers\Api\ProjectController::class, 'search']);
Route::get('/productinfo/search', [\App\Http\Controllers\Api\ProductInfoController::class, 'search']);

Route::get('/contract/sid', [\App\Http\Controllers\Api\ContractController::class, 'sid']);

Route::apiResources([
 'companies' => CompanyController::class,
 'users' => \App\Http\Controllers\Api\UserController::class,
 'people' => PersonController::class,
 'sos' => SOController::class,
 'employees' =>  \App\Http\Controllers\Api\EmployeeController::class,
 'contracts' =>  \App\Http\Controllers\Api\ContractController::class,
 'projects' =>  \App\Http\Controllers\Api\ProjectController::class,
 'productinfos' =>  \App\Http\Controllers\Api\ProductInfoController::class,
]);
