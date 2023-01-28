<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrudTodoController;
use App\Http\Controllers\Api\StandarResponseController;

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

Route::controller(StandarResponseController::class)->group(function () {
    Route::get('/list', 'list');
    Route::get('/success', 'success');
    Route::get('/bad-request', 'requestBad');
    Route::get('/401', 'requestUnathorized');
});

Route::group(['prefix' => 'todo', 'controller' => CrudTodoController::class], function () {
    Route::get('/list', 'list');
    Route::get('/detail/{id}', 'detail');
    Route::post('/create', 'create');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});
