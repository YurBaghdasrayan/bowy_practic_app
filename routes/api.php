<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UnloggedUserController;
use App\Http\Controllers\ChatController;

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

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'homeApi'])->name('home');

Route::post('registration', [\App\Http\Controllers\RegisterController::class, 'storeApi'])->name('registration');

Route::post('/login', [LoginController::class, 'storeLogin'])->name('login');
Route::post('/code-sending', [\App\Http\Controllers\Api\v1\AuthController::class, 'send'])->name('code-sending');
Route::post('/restore-password', [\App\Http\Controllers\Api\v1\AuthController::class, 'CodeSend']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::middleware(['verify'])->group(function () {
        Route::post('/chat', [ChatController::class, 'storeApi'])->name('chat.send');
        Route::post('/send-file', [ChatController::class, 'sendFile'])->name('chat.send');
        Route::get('/rightsidechat', [ChatController::class, 'RightSiteUsers'])->name('chat.send');
        Route::get('/review/{id}/{receiver_id}/{sender_id}', [ChatController::class, 'review'])->name('chat.send');
        Route::get('/chat/{id}/{receiver_id}', [ChatController::class, 'getUsersData'])->name('chat');
        Route::get('city', [\App\Http\Controllers\Api\v1\ProductController::class, 'city']);
        Route::apiResource('products', \App\Http\Controllers\Api\v1\ProductController::class);
        Route::apiResource('categories', \App\Http\Controllers\Api\v1\ProductController::class);
        Route::apiResource('regions', \App\Http\Controllers\Api\v1\ProductController::class);
        Route::apiResource('cities', \App\Http\Controllers\Api\v1\ProductController::class);
        Route::get('allproducts', [\App\Http\Controllers\Api\v1\ProductController::class, 'allProducts']);
        Route::post('favourites', [\App\Http\Controllers\Api\v1\ProductController::class, 'storeFavourite']);
        Route::delete('favourites/{id}', [\App\Http\Controllers\Api\v1\ProductController::class, 'destroyFavourite']);
        Route::get('favourites', [\App\Http\Controllers\Api\v1\ProductController::class, 'indexFavourite']);
        Route::get('search-result', [\App\Http\Controllers\Api\v1\ProductController::class, 'searchResultIndex']);
        Route::get('city', [\App\Http\Controllers\Api\v1\ProductController::class, 'city']);
        Route::get('search-result/{id?}', [\App\Http\Controllers\Api\v1\ProductController::class, 'getCategories'])->name('search.results');
        Route::get('users/{id?}', [\App\Http\Controllers\Api\v1\UserController::class, 'index']);
        Route::post('users', [\App\Http\Controllers\Api\v1\UserController::class, 'update']);
        Route::post('update-products/{id?}', [\App\Http\Controllers\Api\v1\ProductUpdateController::class, 'update']);
        Route::get('delete-image/{id?}', [\App\Http\Controllers\Api\v1\ProductUpdateController::class, 'delete']);
//        Route::get('/image-destroy/{id}', [\App\Http\Controllers\Api\v1\ProductController::class, 'destroy'])->name('image-destroy');
        Route::group(['prefix' => 'profile'], function () {
        });
    });
    Route::middleware(['unverify'])->group(function () {

    });
});

Route::post('/coderepeat', [\App\Http\Controllers\RegisterController::class, 'CodeRepeat'])->name('coderepeat');
Route::post('/verifycode', [\App\Http\Controllers\RegisterController::class, 'verifycodeapi'])->name('verifycode');

Route::get('auth/google', [\App\Http\Controllers\Api\v1\ApiSocaliteController::class, 'googleRedirect'])->name('auth.google');
Route::post('auth/google/callback', [\App\Http\Controllers\Api\v1\ApiSocaliteController::class, 'loginWithGoogle']);

Route::get('auth/vk', [\App\Http\Controllers\Api\v1\ApiSocaliteController::class, 'vkRedirect'])->name('auth.vk');
Route::get('auth/vk/callback', [\App\Http\Controllers\Api\v1\ApiSocaliteController::class, 'loginWithVk']);

Route::get('/announcement-unlogged/{id?}', [\App\Http\Controllers\Api\v1\UnloggedUserController::class, 'index']);




