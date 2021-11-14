<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PersonController;
use App\Http\Controllers\Api\SOController;

use App\Support\Facades\FwRoute;

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
Route::post('/upload', [\App\Http\Controllers\Api\FileController::class, 'upload']);
/*
Route::get('/user/search', [\App\Http\Controllers\Api\UserController::class, 'search']);
Route::get('/company/search', [\App\Http\Controllers\Api\CompanyController::class, 'search']);
Route::get('/person/search', [\App\Http\Controllers\Api\PersonController::class, 'search']);
Route::get('/project/search', [\App\Http\Controllers\Api\ProjectController::class, 'search']);
Route::get('/employee/search', [\App\Http\Controllers\Api\EmployeeController::class, 'search']);
Route::get('/productinfo/search', [\App\Http\Controllers\Api\ProductInfoController::class, 'search']);

Route::get('/contract/sid', [\App\Http\Controllers\Api\ContractController::class, 'sid']);
Route::get('/project/sid', [\App\Http\Controllers\Api\ProjectController::class, 'sid']);
Route::get('/employee/sid', [\App\Http\Controllers\Api\EmployeeController::class, 'sid']);
*/

FwRoute::fwResources([
 ['path'=>'sos', 'class'=> SOController::class, 'search'=>false, 'sid' => false],
 ['path'=>'people', 'class' => PersonController::class, 'search' => true, 'sid' => false],
 ['path'=>'companies', 'class' => CompanyController::class,'search' => true, 'sid' => false],
 ['path'=>'inventores', 'class' =>  \App\Http\Controllers\Api\InventoryController::class,'search' => true, 'sid' => false],
 ['path'=>'productinfos', 'class' => \App\Http\Controllers\Api\ProductInfoController::class,'search' => true, 'sid' => false],
 ['path'=>'users', 'class' => \App\Http\Controllers\Api\UserController::class,'search' => true, 'sid' => false],
 ['path'=>'contracts', 'class' => \App\Http\Controllers\Api\ContractController::class,'search'=>true, 'sid' => 'true'],
 ['path'=>'employees', 'class' => \App\Http\Controllers\Api\EmployeeController::class,'search'=>true, 'sid' => 'true'],
 ['path'=>'projects', 'class' => \App\Http\Controllers\Api\ProjectController::class,'search'=>true, 'sid' => 'true'],
]);
