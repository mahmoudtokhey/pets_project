<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Admin\MarketplaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;


// Multi-Languages Route
Route::get('locale/{lang}',[GeneralController::class,'changeLanguage'])->name('frontend_change_locale');

Route::get('/', function () {
    return view('index');
})->name('dashboard');

// Route::middleware([isAdmin::class, 'auth'])->group(function () {
    // +++++++++++++++++++++++++++++ Categories +++++++++++++++++++++++++++++
    Route::prefix('category')->as('category.')->group(function (){
        Route::get('/', [CategoryController::class, 'mange'])->name('mange');
        // +++++++ store +++++++++
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        // ++++++++++ show "category animals" ++++++++++
        Route::get('show_animals/{category_id}', [CategoryController::class, 'show_animals'])->name('show_animals');
        // ++++++++ update +++++++++
        Route::post('update', [CategoryController::class, 'update'])->name('update');
        // ++++++++ delete +++++++
        Route::delete('delete', [CategoryController::class, 'destroy'])->name('destroy');
    });
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    });
// });
// +++++++++++++++++++++++++++++ animals +++++++++++++++++++++++++++++
Route::prefix('animals')->as('animals.')->group(function (){
    // +++++++ index +++++++++
    Route::get('/', [AnimalController::class, 'index'])->name('index');
    // +++++++ index +++++++++
    Route::get('/show/{id}', [AnimalController::class, 'show'])->name('show');
    // +++++++ store +++++++++
    Route::post('store', [AnimalController::class, 'store'])->name('store');
    // ++++++++ update +++++++++
    Route::put('/animals/update/{id}', [AnimalController::class, 'update'])->name('update');
    // ++++++++ delete +++++++
    Route::delete('delete', [AnimalController::class, 'destroy'])->name('destroy');
});
// +++++++++++++++++++++ marketplace : انشاء منتج للبيع في صفحة المنتجات +++++++++++++++++++++
Route::prefix('marketplace')->as('marketplace.')->group(function (){
    // +++++++ index +++++++++
    Route::get('/', [MarketplaceController::class, 'index'])->name('index');
    // +++++++ index +++++++++
    Route::get('/show/{category_type}', [MarketplaceController::class, 'show'])->name('show');
    // +++++++ store +++++++++
    Route::post('store', [MarketplaceController::class, 'store'])->name('store');
    // ++++++++ delete +++++++
    Route::delete('delete', [MarketplaceController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ++++++++++++++++++++ logout ++++++++++++++++++++
    Route::post('profile/logout', [ProfileController::class,'logout'])->name('profile.logout');
});

require __DIR__.'/auth.php';
