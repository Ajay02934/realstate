<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealStateController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/store', [RealStateController::class, 'store']);

Route::get('/index', [RealStateController::class, 'index']);

Route::delete('/destroy/{id}', [RealStateController::class, 'destroy']);

Route::post('/update/{id}', [RealStateController::class, 'update']);
Route::get('/deletedlist', [RealStateController::class, 'deletedlist']);
Route::get('/show/{id}', [RealStateController::class, 'show']);