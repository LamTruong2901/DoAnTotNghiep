<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//cart
Route::get('/', [HomeController::class, 'index']);

Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index')->name('main');
Route::get('/search-product', 'App\Http\Controllers\HomeController@search_product');
Route::get('/show-category/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category');
Route::get('/show-brand/{brand_id}', 'App\Http\Controllers\BrandProduct@show_brand');
Route::get('/show-detail/{product_id}', 'App\Http\Controllers\Product@show_detail');
Route::get('/404', 'App\Http\Controllers\HomeController@show_404');
Route::get('/contact-us', 'App\Http\Controllers\HomeController@contact_us');
Route::get('/shop', 'App\Http\Controllers\HomeController@shop');
Route::get('/blog', 'App\Http\Controllers\HomeController@blog');
Route::get('/blog-detail/{blog_id}', 'App\Http\Controllers\HomeController@blog_detail');

//Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//category Product
Route::get(
    '/add-category-product',
    'App\Http\Controllers\CategoryProduct@add_category_product'
);
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');
Route::get('/unactive-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');
//brand Product

Route::get(
    '/add-brand-product',
    'App\Http\Controllers\brandProduct@add_brand_product'
);
Route::get('/all-brand-product', 'App\Http\Controllers\BrandProduct@all_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@active_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@delete_brand_product');
Route::post('/save-brand-product', 'App\Http\Controllers\BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'App\Http\Controllers\BrandProduct@update_brand_product');

//Banner 
Route::get('/add-banner', 'App\Http\Controllers\BannerController@add_banner');
Route::get('/all-banner', 'App\Http\Controllers\BannerController@all_banner');
Route::post('/save-banner', 'App\Http\Controllers\BannerController@save_banner');
Route::get('/delete-banner/{banner_id}', 'App\Http\Controllers\BannerController@delete_banner');
Route::get('/unactive-banner/{banner_id}', 'App\Http\Controllers\BannerController@unactive_banner');
Route::get('/active-banner/{banner_id}', 'App\Http\Controllers\BannerController@active_banner');
//Product
Route::get(
    '/add-product',
    'App\Http\Controllers\Product@add_product'
);
Route::get('/all-product', 'App\Http\Controllers\Product@all_product');
Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\Product@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\Product@active_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\Product@edit_product');
Route::get('/delete-product/{product_id}', 'App\Http\Controllers\Product@delete_product');
Route::post('/save-product', 'App\Http\Controllers\Product@save_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\Product@update_product');
//cart
Route::get('/show-cart', 'App\Http\Controllers\CartController@show_cart');
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::post('/save-to-cart', 'App\Http\Controllers\CartController@save_to_cart');
Route::get('/delete-cart/{rowId}', 'App\Http\Controllers\CartController@delete_cart');
Route::post('/update-quantity-cart', 'App\Http\Controllers\CartController@update_quantity_cart');
Route::post('/add-cart-ajax', 'App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/gio-hang', 'App\Http\Controllers\CartController@gio_hang');
Route::get('/count-cart', 'App\Http\Controllers\CartController@count_carts');
Route::get('/del-cart/{session_id}', 'App\Http\Controllers\CartController@del_cart');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');
//checkout
Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/login-customer', 'App\Http\Controllers\CheckoutController@login_customer');
Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');
Route::post('/order-place', 'App\Http\Controllers\CheckoutController@order_place');
Route::post('/select-delivery-home', 'App\Http\Controllers\CheckoutController@select_delivery_home');
Route::get('/del-fee', 'App\Http\Controllers\CheckoutController@del_fee');
Route::post('/comfirm-order', 'App\Http\Controllers\CheckoutController@comfirm_order');

Route::post('/calculate-delivery', 'App\Http\Controllers\CheckoutController@calculate_delivery');
Route::get('/show-delivery', 'App\Http\Controllers\CheckoutController@show_delivery');
//order
Route::get('/all-order', 'App\Http\Controllers\OrderController@show_order');
Route::get('/print-order/{checkout_code}', 'App\Http\Controllers\OrderController@print_order');
Route::get('/view-order/{order_code}', 'App\Http\Controllers\OrderController@view_order');
Route::get('/show-ordered', 'App\Http\Controllers\OrderController@show_ordered')->middleware(['auth', 'verified']);
Route::get('/unactive-order/{order_code}', 'App\Http\Controllers\OrderController@unactive_order');
Route::get('/active-order/{order_code}', 'App\Http\Controllers\OrderController@active_order');
Route::post('/update-order/{order_code}', 'App\Http\Controllers\OrderController@update_order');
Route::get('/delete-order/{order_id}', 'App\Http\Controllers\OrderController@delete_order');
//Login facebook
Route::get('/login-facebook', 'App\Http\Controllers\AdminController@login_facebook');
Route::get('/admin/callback', 'App\Http\Controllers\AdminController@callback_facebook');
//Voucher
Route::get('/add-voucher', 'App\Http\Controllers\VoucherController@add_voucher');
Route::post('/save-voucher', 'App\Http\Controllers\VoucherController@save_voucher');
Route::get('/all-voucher', 'App\Http\Controllers\VoucherController@all_voucher');
Route::get('/delete-voucher/{voucher_id}', 'App\Http\Controllers\VoucherController@delete_voucher');
Route::post('/check-voucher', 'App\Http\Controllers\VoucherController@check_voucher')->middleware(['auth', 'verified']);
Route::get('/del-vou', 'App\Http\Controllers\VoucherController@del_vou');
//Delivery
Route::get('/add-delivery', 'App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery', 'App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery', 'App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship', 'App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery', 'App\Http\Controllers\DeliveryController@update_delivery');
// Blog
Route::get('/add-blog', 'App\Http\Controllers\BlogController@add_blog');
Route::post('/save-blog', 'App\Http\Controllers\BlogController@save_blog');
Route::get('/all-blog', 'App\Http\Controllers\BlogController@all_blog');
Route::get('/delete-blog/{blog_id}', 'App\Http\Controllers\BlogController@delete_blog');
Route::get('/edit-blog/{blog_id}', 'App\Http\Controllers\BlogController@edit_blog');
Route::post('/update-blog/{blog_id}', 'App\Http\Controllers\BlogController@update_blog');
//wishlist
Route::get('/show-wishlist', 'App\Http\Controllers\WishlistController@show_wishlist');
Route::post('/add-to-wishlist', 'App\Http\Controllers\WishlistController@add_to_wishlist');

//User
Route::get('/all-account', 'App\Http\Controllers\AdminController@all_account');
Route::get('/delete-account/{account_id}', 'App\Http\Controllers\AdminController@delete_account');
//send mail
Route::get('/send-mail', 'App\Http\Controllers\HomeController@send_mail');

Route::get('/login2', function () {
    return view('auth2.login');
})->name('login2');

Route::get('/register2', function () {
    return view('auth2.register');
})->name('register2');

Route::get('/forgot-password2', function () {
    return view('auth2.forgot-password');
})->name('forgot-password2');


Route::get('/dash', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware(['auth', 'verified']);

// Xử lý trang "not found"
Route::fallback(function () {
    return view('pages.404');
});
require __DIR__ . '/auth.php';
