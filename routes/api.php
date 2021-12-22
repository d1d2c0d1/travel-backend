<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Testing route
 */
Route::get('/test', function(Request $request) {

    return response([
        'status' => true,
        'message' => 'API is successfull working'
    ]);

});

/**
 * Getting data
 */
Route::prefix('filter')->group(function() {

    Route::post('', [ItemsController::class, 'filter']);
    Route::get('single/{id}', [ItemsController::class, 'single']);

});

/**
 * Auth routes
 */
Route::middleware('api.static.auth')->prefix('auth')->group(function() {
    Route::post('', [AuthorizationController::class, 'create']);
});

/**
 * Posts routes
 */
Route::prefix('posts')->group(function() {

    Route::get('/news/last', [PostsController::class, 'news']);
    Route::get('/news/single/{slug}', [PostsController::class, 'singleNews']);

});

/**
 * Additional routes
 */
Route::middleware('api.static.auth')->prefix('additional')->group(function() {

    Route::get('weather', [AdditionalController::class, 'weather']);

});

/**
 * User routes
 */
Route::middleware('api.static.auth')->middleware('api.user.auth')->prefix('user')->group(function () {
    Route::get('', [UserController::class, 'index']);
});
