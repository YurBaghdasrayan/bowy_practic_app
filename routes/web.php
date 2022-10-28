 <?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AnnounController;
use App\Http\Controllers\CallsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EditAnnouncementController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaidServicesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileActiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePlaceController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestorPasswordController;
use App\Http\Controllers\SearchResultsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UnloggedUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ChatBetweenUsersController;
 use App\Http\Controllers\RightSideChatController;
use App\Http\Controllers\ChatController;
 use App\Http\Controllers\UsersChatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/*GET METHODS*/
Route::get('/readJson', [ProductController::class, 'index'])->name('readJson');
Route::get('/', [HomeController::class, 'index'])->name('home.index');


//MIDDLEWARE METHODS

Route::middleware(['guest'])->group(function () {
        Route::post('/restore-password', [RestorPasswordController::class, 'CodeSend'])->name('restore-password');
        Route::post('/code-sending', [ForgotController::class, 'send'])->name('code.sending');
        Route::post('/registration', [RegisterController::class, 'postSignup'])->name('create_user');
        Route::post('/login', [LoginController::class, 'postLogin'])->name('create_login');

        //  MIDDLEWARE GET METHODS

        Route::get('/registration', [RegisterController::class, 'index'])->name('registration');
        Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
        Route::get('/forgot-password', [ForgotController::class, 'index'])->name('forgot-password');
        Route::get('/restore-password', [RestorPasswordController::class, 'index'])->name('restore-password');


    /*  MIDDLEWARE POST METHODS*/
});


Route::get('/chat/{id}', [ChatController::class, 'getChat'])->name('chat.get');


//MIDDLEWARE METHODS
Route::middleware(['auth'])->group(function () {
    Route::get('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::middleware(['verify'])->group(function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
            Route::get('/services', [PaidServicesController::class, 'index'])->name('paid-services');
            Route::get('/settings', [ProfileSettingsController::class, 'index'])->name('profile-settings');
            Route::put('/settings', [ProfileSettingsController::class, 'update']);
            Route::get('/active-ads', [ProfileActiveController::class, 'index'])->name('profile-active-ads');
            Route::get('/place-anad', [ProfilePlaceController::class, 'index'])->name('profile-place-anad');
            Route::post('/create-products', [ProductController::class, 'store']);
            Route::post('/favourites', [FavouritesController::class, 'store'])->name('favourites');
            Route::get('/favourites-destroy/{id}', [FavouritesController::class, 'destroy'])->name('favourites');
            Route::get('/favourites-delete/{id}', [FavouritesController::class, 'destroyFavourite'])->name('favourites');
        });
    });

    Route::middleware(['unverify'])->group(function () {
        Route::post('/verifycode', [RegisterController::class, 'verifycode'])->name('verifycode');
        Route::get('/verify', [RegisterController::class, 'view'])->name('verify');
        Route::post('/coderepeat', [RegisterController::class, 'CodeRepeatWeb'])->name('coderepeat');
    });
});

    /*MIDDLEWARE GET METHODS*/

    Route::get('/logout', [LoginController::class, 'logout'])->name('user-logout');
    Route::get('/announcement/{status?}/{id?}', [AnnounController::class, 'index'])->name('announcement');
    Route::get('/announcement/{id?}', [AnnounController::class, 'indexCalls']);
    Route::get('/favourites', [FavouritesController::class, 'index'])->name('favourites');

    Route::get('edit-announcement', [EditAnnouncementController::class, 'index'])->name('edit-announcement');
    Route::post('/announcement_update', [AnnounController::class, 'update'])->name('announcement_update');
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
//});

//ADMIN MIDDLEWARE METHODS

Route::get('/admin-login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin-login', [AdminLoginController::class, 'store'])->name('admin.auth');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/users', [AdminController::class, 'index'])->name('admin');
        Route::post('/users', [AdminController::class, 'store'])->name('admin-users');
        Route::get('/users-destroy/{id?}', [AdminController::class, 'destroy'])->name('users');
        Route::get('/update-users/{id?}', [AdminController::class, 'getUpdate'])->name('users.update');
        Route::post('/update-users', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/products-users', [AdminController::class, 'getProductsPage'])->name('products');
        Route::get('/products-destroy/{id?}', [AdminController::class, 'productsDestroy'])->name('delete-products');
        Route::get('/update-products/{id?}', [AdminController::class, 'getProducts'])->name('admin.update');
        Route::post('/update-product', [AdminController::class, 'updateProducts'])->name('admin.update.asd');
    });
});

Route::post('/getCityByRegionId', [RegionController::class, 'getCityByRegionId'])->name('getCityByRegionId');
Route::get('/search-results', [SearchResultsController::class, 'index'])->name('search.results');
Route::get('/search-results/{id?}', [SearchResultsController::class, 'getCategories'])->name('search.results');
Route::get('/announcement-unlogged-user/{status?}/{id?}', [UnloggedUserController::class, 'index'])->name('announcement-unlogged-user');
Route::get('/announcement-unlogged/{id?}', [UnloggedUserController::class, 'indexCalls']);

Route::get('auth/google', [SocialController::class, 'googleRedirect'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::get('auth/vk', [SocialController::class, 'vkRedirect'])->name('auth.vk');
Route::get('auth/vk/callback', [SocialController::class, 'loginWithVk']);

Route::get('auth/ok', [SocialController::class, 'okRedirect'])->name('auth.ok');
Route::get('auth/ok/callback', [SocialController::class, 'loginWithOk']);
Route::get('/image-destroy/{id}', [AnnounController::class, 'destroy'])->name('image-destroy');

Route::get('/chat/{id?}', [ChatController::class, 'index'])->name('chat');
Route::post('/chat', [ChatController::class, 'store'])->name('chat.send');
Route::get('/chatforusers', [RightSideChatController::class, 'index'])->name('chat.for.users');
//
Route::get('/chatfortwousers/{product_id?}/{receiver_id?}', [ChatBetweenUsersController::class, 'index'])->name('chat.for.userss');




