<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ItemTagController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteOptionController;
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
Route::get('/test', function (Request $request) {
    return response([
        'status' => true,
        'message' => 'API is successfull working',
    ]);
});

/**
 * Items routes
 */
Route::prefix('items')->middleware('api.static.auth')->group(function () {
    Route::post('filter', [ItemsController::class, 'filter'])->name('items.filter');
    Route::get('types', [ItemTypeController::class, 'index'])->name('items.types');
    Route::get('categories', [ItemCategoryController::class, 'index'])->name('items.categories');
    Route::get('tags', [ItemTagController::class, 'index'])->name('items.tags');
    Route::get('properties', [PropertiesController::class, 'index'])->name('items.properties');
    Route::delete('{id}', [ItemsController::class, 'delete'])->name('items.delete');

    /**
     * Items routes
     * @private (only for authorized users)
     */
    Route::middleware('api.user.auth')->group(function () {
        Route::get('favorites', [FavoritesController::class, 'index'])->name('items.favorites.list');
        Route::post('favorite/{id}', [FavoritesController::class, 'toggle'])->name('items.favorites.toggle');
        Route::patch('waited/{id}', [ItemsController::class, 'waited'])->name('items.waited');

        Route::middleware('api.is.guide')->group(function () {
            Route::patch('{id}', [ItemsController::class, 'update'])->name('items.update');
            Route::post('tags', [ItemTagController::class, 'create'])->name('items.tags.create');
            Route::post('', [ItemsController::class, 'create'])->name('items.create');
        });

        /**
         * Items routes
         * @private (admin or moder)
         */
        Route::middleware('api.is.moder')->group(function () {
            Route::patch('accepted/{id}', [ItemsController::class, 'accepted'])->name('items.accepted');
            Route::patch('canceled/{id}', [ItemsController::class, 'canceled'])->name('items.canceled');
            Route::post('categories', [ItemCategoryController::class, 'create'])->name('items.categories.create');
            Route::patch('category/{id}', [ItemCategoryController::class, 'update'])->name('items.categories.update');
            Route::delete('category/{id}', [ItemCategoryController::class, 'delete'])->name('items.categories.delete');
            Route::post('properties', [PropertiesController::class, 'create'])->name('items.properties.create');
            Route::patch('remarks/{id}', [ItemsController::class, 'remarks'])->name('items.remarks.edit');
            Route::get('{type}/{action}/{itemId}/{attachmentId}', [ItemsController::class, 'connector'])->name('items.relations');
        });
    });
});

/**
 * Promotions routes
 * @private
 * @guide
 */
Route::prefix('promotion')->middleware('api.static.auth')->middleware('api.user.auth')->middleware('api.is.guide')->group(function () {
    Route::post('', [PromotionsController::class, 'store'])->name('promotions.store');
    Route::get('{id}', [PromotionsController::class, 'single'])->where('id', '[0-9]')->name('promotions.single');

    Route::get('positions', [PromotionsController::class, 'positions']);
    Route::get('sub-positions', [PromotionsController::class, 'subPositions']);
});

/**
 * Reviews routes
 * @private
 */
Route::prefix('reviews')->middleware('api.static.auth')->group(function () {

    Route::get('', [ReviewsController::class, 'index'])->name('reviews.index');

    Route::middleware('api.user.auth')->group(function () {

        Route::post('', [ReviewsController::class, 'create'])->name('reviews.create');
        Route::patch('{id}', [ReviewsController::class, 'update'])->name('reviews.update');

        Route::middleware('api.user.auth')->middleware('api.is.moder')->group(function () {
            Route::delete('{id}', [ReviewsController::class, 'destroy'])->name('review.delete');
            Route::patch('status/{id}/{status}', [ReviewsController::class, 'setStatus'])->name('review.set.status');
        });
    });
});

/**
 * Posts routes
 */
Route::prefix('posts')->group(function () {
    Route::get('/news/last', [PostsController::class, 'news']);
    Route::get('/news/single/{slug}', [PostsController::class, 'singleNews']);
});

/**
 * Additional routes
 */
Route::prefix('additional')->middleware('api.static.auth')->group(function () {
    Route::get('weather', [AdditionalController::class, 'weather']);
});

/**
 * User routes
 */
Route::prefix('user')->middleware('api.static.auth')->group(function () {
    Route::post('is-auth', [AuthorizationController::class, 'test']);
    Route::post('auth', [AuthorizationController::class, 'auth']);
    Route::post('registration', [AuthorizationController::class, 'registration']);
    Route::get('guides', [UserController::class, 'guides'])->name('user.guides');

    /**
     * @private
     */
    Route::middleware('api.user.auth')->group(function () {
        Route::get('data', [UserController::class, 'index']);
        Route::post('filter', [UserController::class, 'filter']);
        Route::post('update/{id}', [UserController::class, 'update']);
        Route::patch('confirm', [UserController::class, 'confirmedRules'])->name('user.confirmed');
    });

    Route::get('{id}', [UserController::class, 'single']);
});

/**
 * Location routes
 */
Route::prefix('location')->middleware('api.static.auth')->group(function () {
    Route::get('languages', [LocationController::class, 'languages'])->name('location.languages');
    Route::get('countries', [LocationController::class, 'countries'])->name('location.countries');
    Route::get('regions/{countryId?}', [LocationController::class, 'regions'])->whereNumber('countryId')->name('location.regions');
    Route::get('regions/search', [LocationController::class, 'searchRegions'])->name('location.search.regions');
    Route::get('cities', [LocationController::class, 'cities'])->name('location.cities');
    Route::get('cities/search', [LocationController::class, 'searchCity'])->name('location.search.cities');
    Route::get('areas', [LocationController::class, 'areas'])->name('location.areas');

    /**
     * Location private routes
     * @private
     */
    Route::middleware('api.user.auth')->middleware('api.is.moder')->group(function () {
        Route::put('city/{id}', [LocationController::class, 'updateCity'])->name('location.city.update');
        Route::post('city', [LocationController::class, 'createCity'])->name('location.city.create');
    });
});

/**
 * Roles routes
 */
Route::prefix('roles')->middleware('api.static.auth')->group(function () {
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
Route::prefix('attachment')->middleware('api.static.auth')->middleware('api.user.auth')->group(function () {
    Route::post('upload', [MediaController::class, 'upload'])->name('attachment.upload');
});

/**
 * Posts routes
 * @private2
 */
Route::prefix('blog')->middleware('api.static.auth')->middleware('api.user.auth')->middleware('api.is.moder')->group(function () {
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
Route::prefix('blog')->middleware('api.static.auth')->group(function () {
    Route::post('filter', [BlogController::class, 'filter'])->name('blog.filter');
    Route::get('categories', [BlogController::class, 'categories'])->name('blog.categories');
    Route::get('{id}', [BlogController::class, 'single'])->name('blog.single');
    Route::get('{code}', [BlogController::class, 'single'])->name('blog.single');
    Route::get('', [BlogController::class, 'index'])->name('blog.index');
});

/**
 * Orders routes
 * @public
 */
Route::prefix('orders')->middleware('api.static.auth')->group(function () {
    Route::post('', [OrderController::class, 'store'])->name('order.store');
    Route::get('types', [OrderTypeController::class, 'index'])->name('order.types');
    Route::get('type', [OrderTypeController::class, 'single'])->name('order.type');

    /**
     * @private (only for authorized users)
     */
    Route::middleware('api.user.auth')->group(function () {
        Route::get('', [OrderController::class, 'index'])->name('order.list');
        Route::get('guide/{id}', [OrderController::class, 'guides'])->name('order.guides.list');
        Route::patch('canceled/{id}', [OrderController::class, 'canceled'])->name('order.canceled');
        Route::get('my', [OrderController::class, 'selfOrders'])->name('order.my');

        /**
         * @private (only for guide)
         */
        Route::middleware('api.is.guide')->group(function () {
            Route::patch('accepted/{id}', [OrderController::class, 'accepted'])->name('order.accepted');
        });
    });
});

/**
 * Guide routes
 * @public
 */
Route::prefix('guides')->middleware('api.static.auth')->group(function () {

    /**
     * @private (only for authorized users)
     */
    Route::middleware('api.user.auth')->group(function () {
        Route::get('orders', [GuideController::class, 'orders'])->name('guide.orders.list');
        Route::post('orders', [GuideController::class, 'order'])->name('guide.orders.create');
        Route::patch('order/accepted/{id}', [GuideController::class, 'accepted'])->name('guide.orders.accepted');
        Route::patch('order/canceled/{id}', [GuideController::class, 'canceled'])->name('guide.orders.canceled');
        Route::patch('order/waiting/{id}', [GuideController::class, 'waiting'])->name('guide.orders.waiting');
        Route::patch('order/comment/{id}', [GuideController::class, 'changeComment'])->name('guide.orders.comment');
    });

});

/**
 * Guide routes
 * @public
 */
Route::prefix('payment')->middleware('api.payment.auth')->group(function () {

    Route::post('check', [PaymentController::class, 'check'])->name('payments.check');
    Route::post('pay', [PaymentController::class, 'pay'])->name('payments.pay');
    Route::post('fail', [PaymentController::class, 'fail'])->name('payments.fail');
    Route::post('confirm', [PaymentController::class, 'confirm'])->name('payments.confirm');
    Route::post('refund', [PaymentController::class, 'refund'])->name('payments.refund');
    Route::post('cancel', [PaymentController::class, 'cancel'])->name('payments.cancel');

});

/**
 * SEO Routes
 * @public
 */
Route::prefix('seo')->middleware('api.static.auth')->group(function () {
    Route::post('filter', [SEOController::class, 'filterData'])->name('seo.filter');
});

Route::middleware('api.is.admin')->group(function () {
    Route::post('site/options', [SiteOptionController::class, 'create']);

    Route::prefix('option')->group(function () {
        Route::get('', [SiteOptionController::class, 'index']);
        Route::get('{id}', [SiteOptionController::class, 'singleId'])->where('id', '[0-9]+');
        Route::get('{code}', [SiteOptionController::class, 'singleCode'])->where('code', '[A-Za-z]+');
        Route::patch('{id}', [SiteOptionController::class, 'update']);
        Route::delete('{id}', [SiteOptionController::class, 'delete']);
    });
});
