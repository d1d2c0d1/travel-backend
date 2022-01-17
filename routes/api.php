<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SubscribeController;
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
Route::prefix('user')->middleware('api.static.auth')->group(function() {
    Route::post('auth', [AuthorizationController::class, 'auth']);
    Route::post('registration', [AuthorizationController::class, 'registration']);
});

/**
 * User routes
 * @private
 */
Route::middleware('api.static.auth')->middleware('api.user.auth')->prefix('user')->group(function () {
    Route::get('data', [UserController::class, 'index']);
});

/**
 * Location routes
 */
Route::middleware('api.static.auth')->prefix('location')->group(function() {

    Route::get('languages', [LocationController::class, 'languages'])->name('location.languages');
    Route::get('countries', [LocationController::class, 'countries'])->name('location.countries');
    Route::get('regions/{countryId?}', [LocationController::class, 'regions'])->name('location.regions');
    Route::get('cities', [LocationController::class, 'cities'])->name('location.cities');
    Route::get('areas', [LocationController::class, 'areas'])->name('location.areas');

});

/**
 * Roles routes
 */
Route::middleware('api.static.auth')->prefix('roles')->group(function() {

    Route::get('', [RolesController::class, 'index']);

});

/**
 * Subscribe routes
 */
Route::middleware('api.static.auth')->prefix('subscribe')->group(function () {
    Route::post('', [SubscribeController::class, 'index'])->name('subscribe');
});

/**
 * Attachments routes
 * @private
 */
Route::prefix('attachment')->middleware('api.static.auth')->middleware('api.user.auth')->group(function() {

    Route::post('upload', [MediaController::class, 'upload'])->name('attachment.upload');

});

/**
 * Posts routes
 * @private
 */
Route::prefix('blog')->middleware('api.static.auth')->middleware('api.user.auth')->group(function() {
    Route::post('', [BlogController::class, 'create'])->name('blog.create');
});
