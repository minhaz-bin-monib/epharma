<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Front\FrontController@index');
Route::get('/brands/{slug}', 'Front\BrandListingController@brand')->name('frontend.brands');
//middleware
Route::match(['get','post'],'/admin/login', 'Admin\AdminController@login')->name('admin.login');


Route::group(['middleware'=>['admin']],function(){
Route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
 Route::get('/admin/logout','Admin\AdminController@logout')->name('admin.logout');
Route::get('admin/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
Route::get('admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
Route::get('admin/setting', 'Admin\AdminController@setting')->name('admin.setting');
Route::get('/admin/check-pwd', 'Admin\AdminController@checkPass')->name('admin.checkPass');
Route::post('/admin/update-pwd', 'Admin\AdminController@updatePassword')->name('admin.updatePassword');

Route::match(['get','post'],'admin/profile/update', 'Admin\AdminController@update')->name('admin.update');
// Route::get('vendor/dashboard', 'HomeController@vendorHome')->name('vendor.dashboard');

//Section Controller
Route::get('admin/section', 'Admin\SectionController@index')->name('admin.section.index');
Route::get('admin/section/create', 'Admin\SectionController@create')->name('admin.section.create');
Route::get('admin/section/edit/{id}', 'Admin\SectionController@edit')->name('admin.section.edit');
Route::match(['get','post'],'admin/section/insert', 'Admin\SectionController@insert')->name('admin.section.insert');
Route::match(['get','post'],'admin/section/edit/{id}', 'Admin\SectionController@update')->name('admin.section.update');
// Route::match(['get','post'],'admin/section/delete/{id}', 'Admin\SectionController@delete')->name('admin.section.delete');
Route::get('admin/section/update-status/{id}/{status}', 'Admin\SectionController@updateStatus');
Route::match(['get','post'],'admin/delete-section/{id}', 'Admin\SectionController@delete')->name('admin.delete-section');


//category Controller
Route::get('admin/category', 'Admin\CategoryController@index')->name('admin.category.index');
Route::get('admin/category/create', 'Admin\CategoryController@create')->name('admin.category.create');
Route::get('admin/category/append_categories_lavel', 'Admin\CategoryController@appendCategoriesLavel');
Route::get('admin/category/edit_append_categories_lavel', 'Admin\CategoryController@editAppendCategoriesLavel');
Route::get('admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');
Route::match(['get','post'],'admin/category/insert', 'Admin\CategoryController@insert')->name('admin.category.insert');
Route::match(['get','post'],'admin/category/edit/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
Route::get('admin/category/update-status/{id}/{status}', 'Admin\CategoryController@updateStatus');
Route::match(['get','post'],'admin/delete-category/{id}', 'Admin\CategoryController@delete')->name('admin.delete-category');


//Brand Controller
Route::get('admin/brand', 'Admin\BrandController@index')->name('admin.brand.index');
Route::get('admin/brand/create', 'Admin\BrandController@create')->name('admin.brand.create');
Route::get('admin/brand/edit/{id}', 'Admin\BrandController@edit')->name('admin.brand.edit');
Route::match(['get','post'],'admin/brand/insert', 'Admin\BrandController@insert')->name('admin.brand.insert');
Route::match(['get','post'],'admin/brand/edit/{id}', 'Admin\BrandController@update')->name('admin.brand.update');
// Route::match(['get','post'],'admin/brand/delete/{id}', 'Admin\BrandController@delete')->name('admin.brand.delete');
Route::get('admin/brand/update-status/{id}/{status}', 'Admin\BrandController@updateStatus');
Route::match(['get','post'],'admin/delete-brand/{id}', 'Admin\BrandController@delete')->name('admin.delete-brand');
//Product Controller
Route::get('admin/product', 'Admin\ProductController@index')->name('admin.product.index');
Route::get('admin/product/create', 'Admin\ProductController@create')->name('admin.product.create');
Route::get('admin/product/edit/{id}', 'Admin\ProductController@edit')->name('admin.product.edit');
Route::match(['get','post'],'admin/product/product_image/{id}', 'Admin\ProductController@productImage')->name('admin.product.product_image');
Route::match(['get','post'],'admin/product/product_attribute/{id}', 'Admin\ProductController@productAttribute')->name('admin.product.product_attribute');
Route::match(['get','post'],'admin/product/product_upload/{id}', 'Admin\ProductController@productImageUpload')->name('admin.product.product_image.upload');
Route::match(['get','post'],'admin/product/insert', 'Admin\ProductController@insert')->name('admin.product.insert');
Route::match(['get','post'],'admin/product/edit/{id}', 'Admin\ProductController@update')->name('admin.product.update');
// Route::match(['get','post'],'admin/product/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
Route::get('admin/product/update-status/{id}/{status}', 'Admin\ProductController@updateStatus');
Route::get('admin/product/product_attribute/update-attribute-status/{id}/{status}', 'Admin\ProductController@AttributeupdateStatus');
Route::match(['get','post'],'admin/delete-product/{id}', 'Admin\ProductController@delete')->name('admin.delete-product');
//Banner
Route::get('admin/banner', 'Admin\BannerController@index')->name('admin.banner.index');
Route::get('admin/banner/create', 'Admin\BannerController@create')->name('admin.banner.create');
Route::get('admin/banner/edit/{id}', 'Admin\BannerController@edit')->name('admin.banner.edit');
Route::match(['get','post'],'admin/banner/insert', 'Admin\BannerController@insert')->name('admin.banner.insert');
Route::match(['get','post'],'admin/banner/edit/{id}', 'Admin\BannerController@update')->name('admin.banner.update');
// Route::match(['get','post'],'admin/banner/delete/{id}', 'Admin\BannerController@delete')->name('admin.banner.delete');
Route::get('admin/banner/update-status/{id}/{status}', 'Admin\BannerController@updateStatus');
Route::match(['get','post'],'admin/delete-banner/{id}', 'Admin\BannerController@delete')->name('admin.delete-banner');

//Middle Banner
Route::get('admin/middleBanner', 'Admin\MiddleBannerController@index')->name('admin.middle-banner.index');
Route::get('admin/middleBanner/create', 'Admin\MiddleBannerController@create')->name('admin.middle-banner.create');
Route::get('admin/middleBanner/edit/{id}', 'Admin\MiddleBannerController@edit')->name('admin.middle-banner.edit');
Route::match(['get','post'],'admin/middleBanner/insert', 'Admin\MiddleBannerController@insert')->name('admin.middle-banner.insert');
Route::match(['get','post'],'admin/middleBanner/edit/{id}', 'Admin\MiddleBannerController@update')->name('admin.middle-banner.update');
// Route::match(['get','post'],'admin/middleBanner/delete/{id}', 'Admin\MiddleBannerController@delete')->name('admin.middle-banner.delete');
Route::get('admin/middleBanner/update-status/{id}/{status}', 'Admin\MiddleBannerController@updateStatus');
Route::match(['get','post'],'admin/delete-middlebanner/{id}', 'Admin\MiddleBannerController@delete')->name('admin.delete-middlebanner');
//Dashboard Logo Controller
Route::get('admin/dashboardlogo', 'Admin\DashboardLogoController@index')->name('admin.dashboardlogo.index');
Route::get('admin/dashboardlogo/create', 'Admin\DashboardLogoController@create')->name('admin.dashboardlogo.create');
Route::get('admin/dashboardlogo/edit/{id}', 'Admin\DashboardLogoController@edit')->name('admin.dashboardlogo.edit');
Route::match(['get','post'],'admin/dashboardlogo/insert', 'Admin\DashboardLogoController@insert')->name('admin.dashboardlogo.insert');
Route::match(['get','post'],'admin/dashboardlogo/edit/{id}', 'Admin\DashboardLogoController@update')->name('admin.dashboardlogo.update');
// Route::match(['get','post'],'admin/dashboard_logo/delete/{id}', 'Admin\DashboardLogoController@delete')->name('admin.dashboard_logo.delete');
Route::get('admin/dashboardlogo/update-status/{id}/{status}', 'Admin\DashboardLogoController@updateStatus');
Route::match(['get','post'],'admin/delete-dashboardlogo/{id}', 'Admin\DashboardLogoController@delete')->name('admin.delete-dashboardlogo');


//FronendLogo Controller
Route::get('admin/frontendlogo', 'Admin\FrontendLogoController@index')->name('admin.frontendlogo.index');
Route::get('admin/frontendlogo/create', 'Admin\FrontendLogoController@create')->name('admin.frontendlogo.create');
Route::get('admin/frontendlogo/edit/{id}', 'Admin\FrontendLogoController@edit')->name('admin.frontendlogo.edit');
Route::match(['get','post'],'admin/frontendlogo/insert', 'Admin\FrontendLogoController@insert')->name('admin.frontendlogo.insert');
Route::match(['get','post'],'admin/frontendlogo/edit/{id}', 'Admin\FrontendLogoController@update')->name('admin.frontendlogo.update');
// Route::match(['get','post'],'admin/frontendlogo/delete/{id}', 'Admin\FrontendLogoController@delete')->name('admin.frontendlogo.delete');
Route::get('admin/frontendlogo/update-status/{id}/{status}', 'Admin\FrontendLogoController@updateStatus');
Route::match(['get','post'],'admin/delete-frontendlogo/{id}', 'Admin\FrontendLogoController@delete')->name('admin.delete-frontendlogo');

});


Route::match(['get','post'],'/user/vendor/login', 'Vendor\VendorController@login')->name('vendor.login');


Route::group(['middleware'=>['vendor']],function(){
    Route::get('vendor/logout', 'Vendor\VendorController@logout')->name('vendor.logout');
    Route::get('vendor/dashboard', 'Vendor\VendorController@index')->name('vendor.dashboard');



    //Product Controller






});