<?php

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

//Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('auth/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::group(['middleware' => ['api', 'jwt.verify'], 'prefix' => 'auth'], function() {
//    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('me', [\App\Http\Controllers\Auth\UserController::class, 'me']);
    Route::post('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout']);

    Route::get('customers', [\App\Http\Controllers\Customer\ShowController::class, 'show']);
    Route::post('customer/store', [\App\Http\Controllers\Customer\StoreController::class, 'store']);
});

Route::get('get-code', [\App\Http\Controllers\Countries\CodeController::class, 'show']);
