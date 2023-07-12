<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/properties', PropertyController::class)->parameters(['properties' => 'property:slug']);
    Route::post('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/messages', MessageController::class);
    Route::get('/messages/create/{id}', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages/{property}', [MessageController::class, 'store'])->name('messages.store');
    // Route::post('/messages', [MessageController::class, 'index']);
    Route::get('/admin/properties/{property}', [PropertyController::class, 'show'])->name('admin.properties.show');
    Route::resource('/offers', OfferController::class);
});

require __DIR__.'/auth.php';
