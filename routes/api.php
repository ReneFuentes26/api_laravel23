<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\PostController as v1;
use App\Http\Controllers\API\v2\PostController as v2;
use App\Http\Controllers\API\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::apiResource('v1/posts', v1::class)
    -> only(['index','show'])
    ->middleware('auth:sanctum');//habilita el index y el show

Route::apiResource('v2/posts', v2::class)
    -> only(['index','show'])
    -> middleware('auth:sanctum');

Route::post('login',[LoginController::class, 'login']);