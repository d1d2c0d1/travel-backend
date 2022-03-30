<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ItemTagController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PropertiesController;
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

});

/**
 * Items routes
 */
Route::prefix('items')->group(function() {
    Route::post('filter', [ItemsController::class, 'filter'])->name('items.filter');
    Route::get('types', [ItemTypeController::class, 'index'])->name('items.types');
    Route::get('categories', [ItemCategoryController::class, 'index'])->name('items.categories');
    Route::get('tags', [ItemTagController::class, 'index'])->name('items.tags');
    Route::get('properties', [PropertiesController::class, 'index'])->name('items.properties');
    Route::delete('{id}', [ItemsController::class, 'delete'])->name('items.delete');
});

/**
 * Items routes
 * @private
 */
Route::prefix('items')->middleware('api.static.auth')->middleware('api.user.auth')->group(function () {
    Route::post('', [ItemsController::class, 'create'])->name('items.create');
    Route::post('categories', [ItemCategoryController::class, 'create'])->name('items.categories.create');
    Route::post('tags', [ItemTagController::class, 'create'])->name('items.tags.create');
    Route::post('properties', [PropertiesController::class, 'create'])->name('items.properties.create');
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
Route::prefix('additional')->middleware('api.static.auth')->group(function() {
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
Route::prefix('user')->middleware('api.static.auth')->middleware('api.user.auth')->group(function () {
    Route::get('data', [UserController::class, 'index']);
    Route::post('filter', [UserController::class, 'filter']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::get('{id}', [UserController::class, 'single']);
});

/**
 * Location routes
 */
Route::prefix('location')->middleware('api.static.auth')->group(function() {
    Route::get('languages', [LocationController::class, 'languages'])->name('location.languages');
    Route::get('countries', [LocationController::class, 'countries'])->name('location.countries');
    Route::get('regions/{countryId?}', [LocationController::class, 'regions'])->whereNumber('countryId')->name('location.regions');
    Route::get('regions/search', [LocationController::class, 'searchRegions'])->name('location.search.regions');
    Route::get('cities', [LocationController::class, 'cities'])->name('location.cities');
    Route::get('cities/search', [LocationController::class, 'searchCity'])->name('location.search.cities');
    Route::get('areas', [LocationController::class, 'areas'])->name('location.areas');
});

/**
 * Location private routes
 * @private
 */
Route::prefix('location')->middleware('api.static.auth')->middleware('api.user.auth')->group(function() {
    Route::put('city/{id}', [LocationController::class, 'updateCity'])->name('location.city.update');
    Route::post('city', [LocationController::class, 'createCity'])->name('location.city.create');
});

/**
 * Roles routes
 */
Route::prefix('roles')->middleware('api.static.auth')->group(function() {
    Route::get('', [RolesController::class, 'index']);
});

/**
 * Subscribe routes
 */
Route::prefix('subscribe')->middleware('api.static.auth')->group(function () {
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
    Route::put('{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('{id}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::post('{position}/{id}', [BlogController::class, 'setPostPosition'])->name('blog.position.update');
    Route::post('category', [BlogController::class, 'createCategory'])->name('blog.create.category');
});

/**
 * Posts routes
 * @public
 */
Route::prefix('blog')->middleware('api.static.auth')->group(function() {
    Route::get('categories', [BlogController::class, 'categories'])->name('blog.categories');
    Route::get('{id}', [BlogController::class, 'single'])->name('blog.single');
    Route::get('', [BlogController::class, 'index'])->name('blog.index');
});

