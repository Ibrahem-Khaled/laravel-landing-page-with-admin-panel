<?php

use App\Http\Controllers\dashboard\GallaryController;
use App\Http\Controllers\dashboard\Sections;
use App\Http\Controllers\dashboard\SiteSettingsController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\MainController;
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
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/section/{id}', [Sections::class, 'show'])->name('section');
Route::get('/branch/{id}', [MainController::class, 'branch'])->name('branch');

Route::group(['prefix' => 'dashboard'], function () {
    // this section for dashboard
    Route::resource('sections', Sections::class);

    // this gallary for dashboard
    Route::resource('galleries', GallaryController::class);

    // this users for dashboard
    Route::resource('users', UsersController::class);

    // this site setting for dashboard
    Route::resource('site-settings', SiteSettingsController::class);

    Route::get('otherPage', [UsersController::class, 'otherPage'])->name('otherPage');

});

