<?php

use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordRestLinkController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\CancelledOrder\CancelledOrderController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Currency\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExchangedOrder\ExchangedOrderController;
use App\Http\Controllers\Admin\Filter\FilterController;
use App\Http\Controllers\Admin\FilterValue\FilterValueController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Order\OrderInvoiceController;
use App\Http\Controllers\Admin\Page\ContactUsController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\Product\Attachment\ProductAttachmentController;
use App\Http\Controllers\Admin\Product\Attachment\DestroyAttachment;
use App\Http\Controllers\Admin\Product\Attachment\DownloadAttachmentController;
use App\Http\Controllers\Admin\Product\Attribute\ProductAttributeController;
use App\Http\Controllers\Admin\Product\Color\ProductColorController;
use App\Http\Controllers\Admin\Product\Filter\ProductFilterController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\ProductRating\ProductRatingController;
use App\Http\Controllers\Admin\ReturnedOrder\ReturnedOrderController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Section\SectionController;
use App\Http\Controllers\Admin\Setting\AdminChangePasswordController;
use App\Http\Controllers\Admin\Setting\AdminProfileController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\ShippingCharge\ShippingChargeController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

define('CUSTOMPAGINATION', 10);

Route::group(
    [
        'prefix'        => LaravelLocalization::setLocale(),
        'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/login',                                    [LoginController::class, 'show'])->name('login.show');
            Route::post('/login',                                   [LoginController::class, 'login'])->name('login');
            Route::get('/password/forget',                          [PasswordRestLinkController::class, 'create'])->name('forget.password.form');
            Route::post('/password/forget',                         [PasswordRestLinkController::class, 'store'])->name('forget.password.store');
            Route::get('/reset/password/{token}',                   [NewPasswordController::class, 'create'])->name('password.reset.link');
            Route::post('reset-password',                           [NewPasswordController::class, 'store'])->name('password.reset');

            Route::group(['middleware' => 'admin'], function () {
                Route::get('/setting',                                      SettingController::class)->name('setting.index');
                Route::get('/profile',                                      AdminProfileController::class)->name('setting.profile');
                Route::get('/change-password',                              AdminChangePasswordController::class)->name('setting.change-password');
                Route::get('/logout',                                       LogoutController::class)->name('logout');
                Route::get('/dashboard',                                    DashboardController::class)->name('dashboard');

                Route::group(['middleware' => ['role:supervisor', 'role:general_manager', 'auth:admin']], function () {
                    Route::resource('roles',                                    RoleController::class)->only(['index', 'show']);
                    Route::resource('admins',                                   AdminController::class)->only(['index', 'show']);
                    Route::get('permissions',                                   PermissionController::class)->name('permissions.index');
                });

                Route::group(['middleware' => ['role:supervisor', 'role:general_manager', 'auth:admin']], function () {
                    Route::resource('sections',                                 SectionController::class)->only(['index', 'create', 'edit']);
                    Route::resource('categories',                               CategoryController::class)->only(['index', 'create', 'edit']);
                    Route::resource('brands',                                   BrandController::class)->only(['index', 'create', 'edit']);
                    Route::resource('banners',                                  BannerController::class)->only(['index', 'create', 'edit']);
                    Route::resource('coupons',                                  CouponController::class)->only(['index', 'create', 'edit']);
                    Route::get('/contact',                                      ContactUsController::class)->name('pages.contact');
                });

                Route::group(['middleware' => ['role:supervisor', 'role:product_manager', 'auth:admin']], function () {
                    Route::resource('products',                                 ProductController::class)->only(['index', 'create', 'edit']);
                    Route::resource('product.attachments',                      ProductAttachmentController::class)->only(['create', 'store']);
                    Route::get('attachment/{attachment}/destroy',               DestroyAttachment::class)->name('products.attachments.destroy');
                    Route::get('attachment/{attachment}/download',              DownloadAttachmentController::class)->name('products.attachments.download');
                    Route::resource('product.attributes',                       ProductAttributeController::class)->only('create');
                    Route::get('product/{product}/colors',                      ProductColorController::class)->name('products.colors');
                    Route::resource('product.filters',                          ProductFilterController::class)->only('create');
                    Route::get('products-ratings',                              ProductRatingController::class)->name('products_rating');
                    Route::get('colors',                                        ColorController::class)->name('colors.index');
                    Route::resource('filters',                                  FilterController::class)->only(['index', 'create', 'edit', 'destroy']);
                    Route::resource('filter-values',                            FilterValueController::class)->only(['index', 'create', 'edit']);
                });

                Route::group(['middleware' => ['role:supervisor', 'role:order_manager', 'auth:admin']], function () {
                    Route::resource('shipping-charges',                         ShippingChargeController::class)->only(['index', 'edit']);
                    Route::resource('currencies',                               CurrencyController::class)->only(['index', 'create', 'edit']);
                    Route::get('users',                                         UserController::class)->name('users.index');
                    Route::resource('orders',                                   OrderController::class)->only('index', 'show');
                    Route::get('order-invoice/{order}',                         OrderInvoiceController::class)->name('orders.invoice');
                    Route::resource('cancelled-orders',                         CancelledOrderController::class)->only('index', 'show');
                    Route::get('returned-orders',                               ReturnedOrderController::class)->name('returned-orders.index');
                    Route::get('exchanged-orders',                              ExchangedOrderController::class)->name('exchanged-orders.index');
                });
            });
        });
    }
);
