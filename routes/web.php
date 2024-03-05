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
Route::get('/wishlist', 'App\Livewire\User\Home\Home')->name('wishlist');

