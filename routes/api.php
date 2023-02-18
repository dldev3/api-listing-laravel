<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//48.04

//public routes

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokersController::class, 'index']);
Route::get('/brokers/{broker}', [BrokersController::class, 'show']);
Route::get('/brokers/{broker}', [BrokersController::class, 'show']);
Route::get('/brokers/{broker}', [BrokersController::class, 'show']);



//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/brokers', BrokersController::class)->only(['store', 'update', 'destroy']);
});
