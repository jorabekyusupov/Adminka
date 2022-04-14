<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;




require_once __DIR__ . '/fortify.php';

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/language', LanguageController::class);
        Route::resource('/phrase', PhraseController::class);
        Route::resource('/post', PostController::class);
        Route::delete('/translation-delete/{id}', [PhraseController::class, 'destroyTranslation'])->name('translation.destroy');
    });
});

//Route::middleware(['setLocale'])->group(function() {
//    Route::get('/about/contact', [HomeController::class, 'contact'])->name('bla');
//});
Route::group(['middleware' => ['setLocale'], 'prefix' => '{language}'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about/contact', [HomeController::class, 'contact'])->name('bla');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
});

http://localhost:8000/{lang}/about


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

