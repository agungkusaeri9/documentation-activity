<?php

use App\Http\Controllers\IntershipController;
use Illuminate\Support\Facades\Auth;
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

Route::redirect('/','/login');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('users', UserController::class)->except('show');
    Route::resource('contents', ContentController::class);
    Route::resource('photo-galleries', PhotoGalleryController::class)->except('show');
    Route::resource('video-galleries', VideoGalleryController::class)->except('show');
});
