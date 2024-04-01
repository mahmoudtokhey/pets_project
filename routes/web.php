<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;


// Multi-Languages Route
Route::get('locale/{lang}',[GeneralController::class,'changeLanguage'])->name('frontend_change_locale');

Route::get('/', function () {
    return view('index');
})->name('dashboard');

// Route::middleware([isAdmin::class, 'auth'])->group(function () {

    Route::prefix('category')->as('category.')->group(function (){
        Route::get('/', [CategoryController::class, 'mange'])->name('mange');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
    });
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    });
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
