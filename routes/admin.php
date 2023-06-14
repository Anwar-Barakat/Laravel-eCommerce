<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordRestLinkController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Currency\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Filter\FilterController;
use App\Http\Controllers\Admin\FilterValue\FilterValueController;
use App\Http\Controllers\Admin\Product\Attachment\ProductAttachmentController;
use App\Http\Controllers\Admin\Product\Attachment\DestroyAttachment;
use App\Http\Controllers\Admin\Product\Attachment\DownloadAttachmentController;
use App\Http\Controllers\Admin\Product\Attribute\ProductAttributeController;
use App\Http\Controllers\Admin\Product\Filter\ProductFilterController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Section\SectionController;
use App\Http\Controllers\Admin\Setting\AdminChangePasswordController;
use App\Http\Controllers\Admin\Setting\AdminProfileController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\ShippingCharge\ShippingChargeController;
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
                Route::get('/logout',                                       LogoutController::class)->name('logout');
                Route::get('/dashboard',                                    DashboardController::class)->name('dashboard');

                //_______________________
                // setting
                //_______________________
                Route::resource('/setting',                                 SettingController::class)->only(['index']);
                Route::get('/profile',                                      AdminProfileController::class)->name('setting.profile');
                Route::get('/change-password',                              AdminChangePasswordController::class)->name('setting.change-password');


                // _________________________________________________________________________________________
                // _________________________________________________________________________________________
                //_______________________
                // sections
                //_______________________
                Route::resource('sections',                                 SectionController::class)->only(['index', 'create', 'edit']);

                //_______________________
                // categories
                //_______________________
                Route::resource('categories',                               CategoryController::class)->only(['index', 'create', 'edit']);

                //_______________________
                // brands
                //_______________________
                Route::resource('brands',                                   BrandController::class)->only(['index', 'create', 'edit']);

                //_______________________
                // Banners
                //_______________________
                Route::resource('banners',                                  BannerController::class)->only(['index', 'create', 'edit']);

                //_______________________
                // Coupons
                //_______________________
                Route::resource('coupons',                                  CouponController::class)->only(['index', 'create', 'edit']);


                // _________________________________________________________________________________________
                // _________________________________________________________________________________________
                //_______________________
                // products
                //_______________________
                Route::resource('products',                                 ProductController::class)->only(['index', 'create', 'edit']);

                //_______________________
                // products attachments
                //_______________________
                Route::resource('product.attachments',                      ProductAttachmentController::class)->only(['create', 'store']);
                Route::get('attachment/{attachment}/destroy',               DestroyAttachment::class)->name('products.attachments.destroy');
                Route::get('attachment/{attachment}/download',              DownloadAttachmentController::class)->name('products.attachments.download');

                //_______________________
                // products attributes
                //_______________________
                Route::resource('product.attributes',                       ProductAttributeController::class)->only('create');

                //_______________________
                // products filters
                //_______________________
                Route::resource('product.filters',                          ProductFilterController::class)->only('create');

                //_______________________
                // Filters
                //_______________________
                Route::resource('filters',                                  FilterController::class)->only(['index', 'create', 'edit', 'destroy']);
                Route::resource('filter-values',                            FilterValueController::class)->only(['index', 'create', 'edit']);


                // _________________________________________________________________________________________
                // _________________________________________________________________________________________
                //_______________________
                // shipping charges
                //_______________________
                Route::resource('shipping-charges',                         ShippingChargeController::class)->only(['index', 'edit']);

                //_______________________
                // currencies
                //_______________________
                Route::resource('currencies',                               CurrencyController::class)->only(['index', 'create', 'edit']);
            });
        });
    }
);
