<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Ecommerce\FrontController;
use App\Http\Controllers\Ecommerce\LoginController;
use App\Http\Controllers\Ecommerce\OrderController;
use App\Http\Controllers\Ecommerce\RegisterController;

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

Route::get('test', function () {
    return view('ecommerce.address');
});

Route::get('/home', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/product', [\App\Http\Controllers\Ecommerce\FrontController::class, 'product'])->name('front.product');
Route::get('/category/{slug}', [\App\Http\Controllers\Ecommerce\FrontController::class, 'categoryProduct'])->name('front.category');
Route::get('/product/{slug}', [\App\Http\Controllers\Ecommerce\FrontController::class, 'show'])->name('front.show');

Route::post('cart', [\App\Http\Controllers\Ecommerce\CartController::class, 'addToCart'])->name('front.cart');
Route::get('/cart', [\App\Http\Controllers\Ecommerce\CartController::class, 'listCart'])->name('front.list_cart');
Route::post('/cart/update', [\App\Http\Controllers\Ecommerce\CartController::class, 'updateCart'])->name('front.update_cart');
Route::delete('/cart/delete', [\App\Http\Controllers\Ecommerce\CartController::class, 'deleteCart'])->name('front.delete_cart');

Route::get('/checkout', [\App\Http\Controllers\Ecommerce\CartController::class, 'checkout'])->name('front.checkout');
Route::post('/checkout/processCheckout', [\App\Http\Controllers\Ecommerce\CartController::class, 'processCheckout'])->name('front.store_checkout');
Route::get('/checkout/{invoice}', [\App\Http\Controllers\Ecommerce\CartController::class, 'checkoutFinish'])->name('front.finish_checkout');

Route::get('/product/ref/{user}/{product}', [\App\Http\Controllers\Ecommerce\FrontController::class, 'checkreferalProductoutFinish'])->name('front.afiliasi');

Route::group(['prefix' => 'member', 'namespace' => 'Ecommerce'], function() {
    Route::get('login', [LoginController::class, 'loginForm'])->name('customer.login');
    Route::post('login', [LoginController::class, 'login'])->name('customer.post_login');

    Route::get('register', [RegisterController::class, 'registerForm'])->name('customer.register');
    Route::post('register', [RegisterController::class, 'register'])->name('customer.post_register');
    Route::get('verify/{token}', [FrontController::class, 'verifyCustomerRegistration'])->name('customer.verify');
});

Route::prefix('customer')->middleware(['customer'])->group(function ()
{
    Route::get('account', [LoginController::class, 'account'])->name('customer.account');
    Route::get('logout', [LoginController::class, 'logout'])->name('customer.logout');

    Route::get('orders', [OrderController::class, 'index'])->name('customer.orders');
    Route::post('orders/accept', [OrderController::class, 'acceptOrder'])->name('customer.order_accept');
    Route::get('orders/{invoice}', [OrderController::class, 'view'])->name('customer.view_order');
    Route::get('orders/pdf/{invoice}', [OrderController::class, 'pdf'])->name('customer.order_pdf');

    Route::get('payment', [OrderController::class, 'paymentForm'])->name('customer.paymentForm');
    Route::post('payment', [OrderController::class, 'storePayment'])->name('customer.savePayment');

    Route::get('address', [FrontController::class, 'addressForm'])->name('customer.addressForm');
    Route::get('setting', [FrontController::class, 'customerSettingForm'])->name('customer.settingForm');
    Route::post('setting', [FrontController::class, 'customerUpdateProfile'])->name('customer.setting');

    Route::get('orders/return/{invoice}', [OrderController::class, 'returnForm'])->name('customer.order_return');
    Route::put('orders/return/{invoice}', [OrderController::class, 'processReturn'])->name('customer.return');

    Route::get('afiliasi', [FrontController::class, 'listCommission'])->name('customer.affiliate');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{invoice}', [OrdersController::class, 'view'])->name('orders.view');
    Route::get('/orders/payment/{invoice}', [OrdersController::class, 'acceptPayment'])->name('orders.approve_payment');

    Route::post('/orders/shipping', [OrdersController::class, 'shippingOrder'])->name('orders.shipping');
    Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/reports/order', [DashboardController::class, 'orderReport'])->name('report.order');
    Route::get('/reports/order/pdf/{daterange}', [DashboardController::class, 'orderReportPdf'])->name('report.order_pdf');

    Route::get('/reports/return', [DashboardController::class, 'returnReport'])->name('report.return');
    Route::get('/reports/return/pdf/{daterange}', [DashboardController::class, 'returnReportPdf'])->name('report.return_pdf');

    Route::get('/reports/product', [DashboardController::class, 'productReport'])->name('report.product');
    Route::get('/reports/product/pdf/{daterange}', [DashboardController::class, 'productReportPdf'])->name('report.product_pdf');
});

Route::prefix('admin')->middleware(['auth'])->group(function ()
{
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('profile', [DashboardController::class, 'profileForm'])->name('dashboard.profile');
    Route::patch('/profile/{id}', [DashboardController::class, 'profile'])->name('dashboard.profile_update');

    Route::resource('category', CategoryController::class)->except(['create', 'show']);
    Route::resource('product', ProductController::class)->except(['create', 'show']);

    Route::resource('user', UserController::class)->except(['create', 'show']);
});


Route::get('tes', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a997b23f080c2603d7c03e78015c9283"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $responseData = json_decode($response);
    $rajaOngkir = $responseData->rajaongkir;
    $results  = $rajaOngkir->results;
    foreach ($results as $item) {
        dd($rajaOngkir);
    }
});


