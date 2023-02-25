<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => '\App\Http\Controllers\Admin',
        'middleware' => ['auth', 'can:admin-panel'],
    ],
    function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
        Route::resource('users', UsersController::class);
        Route::resource('regions', \App\Http\Controllers\Admin\RegionController::class);
        Route::resource('regions', \App\Http\Controllers\Admin\RegionController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\Adverts\CategoryController::class);
        Route::group(['prefix' => 'categories/{category}', 'as' => 'categories.'], function () {
            Route::post('/first', [\App\Http\Controllers\Admin\Adverts\CategoryController::class,'first'])->name('first');
            Route::post('/up', [\App\Http\Controllers\Admin\Adverts\CategoryController::class,'up'])->name('up');
            Route::post('/down', [\App\Http\Controllers\Admin\Adverts\CategoryController::class,'down'])->name('down');
            Route::post('/last', [\App\Http\Controllers\Admin\Adverts\CategoryController::class,'last'])->name('last');
            Route::resource('attributes', \App\Http\Controllers\Admin\Adverts\AttributeController::class)->except('index');
        });
    }
);

require __DIR__.'/auth.php';
