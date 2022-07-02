<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\User\Checkout\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//all frontend controller from here
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/product/{slug}', [FrontendController::class, 'product_details'])->name('product.detail');
Route::get('/shop', [FrontendController::class, 'shopView'])->name('frontend.shop');
//product comtroller ended

//Cart controller route are here
Route::get('/cart', [CartController::class, 'getCart'])->name('cart.index');
Route::get('/add-to-cart/{slug}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/remove-cart/{rowId}', [CartController::class, 'removeCart'])->name('view.removeCart');
Route::patch('/cart-update/{rowId}', [CartController::class, 'cartUpdate'])->name('cart.update');
//Cart controller route ended

//CheckoutController Route are here
Route::group(['middleware' => ['auth']], function(){
    Route::get('/pre-checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/pre-checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});




//Blog controller are here
// Route::get('/blog/{slug}', [FrontendController::class, 'getSingleBlog'])->name('blog.get-single');
// Route::get('/about', [FrontendController::class, 'about'])->name('about.about');
// Route::get('/contact', [FrontendController::class, 'contact'])->name('contact.contact');
// Route::post('/send-mail', [FrontendController::class, 'sendMail'])->name('mail.send');


Auth::routes();

Route::group(['prefix' => 'admin',  'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('banner', BannerController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);




    // Route::resource('product', ProductBackController::class);
});

Route::get('/user/home', [FrontendContoller::class, 'index'])->name('user.home');





// Route::prefix('admin')->middleware('auth')->group(function(){

// });