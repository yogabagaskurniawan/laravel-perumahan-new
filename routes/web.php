<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Livewire\User\Home\Home')->name('homepage');
Route::get('/search/detail/{slug}', 'App\Livewire\User\Home\HomeShow')->name('detailProperti');
Route::get('/search/{slug?}', 'App\Livewire\User\Search\Search')->name('search');
Route::get('/booking', 'App\Livewire\User\Booking\Booking')->name('booking');
Route::get('/wishlist', 'App\Livewire\User\Wishlist\Wishlist')->name('wishlist');
Route::get('/login', 'App\Livewire\User\Auth\Login')->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/admin/home-list', 'App\Livewire\Admin\Homelist\index')->name('homeList');
    Route::get('/admin/home-list/add', 'App\Livewire\Admin\Homelist\add')->name('homeListAdd');
    Route::get('/admin/home-list/edit/{id}', 'App\Livewire\Admin\Homelist\edit')->name('homeListEdit');
    
    Route::get('/admin/list-admin', 'App\Livewire\Admin\ListAdmin\index')->name('listAdmin');
    Route::get('/admin/list-admin/add', 'App\Livewire\Admin\ListAdmin\add')->name('listAdminAdd');
    Route::get('/admin/list-admin/edit/{id}', 'App\Livewire\Admin\ListAdmin\edit')->name('listAdminEdit');

    Route::get('/admin/home-category', 'App\Livewire\Admin\ListCategory\index')->name('homeCategory');
    Route::get('/admin/home-category/add', 'App\Livewire\Admin\ListCategory\add')->name('homeCategoryAdd');
    Route::get('/admin/home-category/edit/{id}', 'App\Livewire\Admin\ListCategory\edit')->name('homeCategoryEdit');

    Route::get('/admin/list-booking', 'App\Livewire\Admin\ListBooking\index')->name('listBooking');
    Route::get('/admin/list-booking/edit/{id}', 'App\Livewire\Admin\ListBooking\edit')->name('listBookingEdit');

    Route::get('/admin/setting', 'App\Livewire\Admin\Setting\index')->name('setting');
    Route::get('/admin/setting/edit/{id}', 'App\Livewire\Admin\Setting\edit')->name('settingEdit');
});