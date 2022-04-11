<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\PhraseTranslationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

require_once  __DIR__ .'/fortify.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth:web'], function () {
    Route::prefix('admin')->group(function (){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/language', LanguageController::class);
        Route::resource('/phrase', PhraseController::class);
        Route::delete('/translation-delete/{id}', [PhraseController::class, 'destroyTranslation'])->name('translation.destroy');
        Route::resource('/phrase-translation', PhraseTranslationController::class);
        Route::resource('/page', PageController::class);
    });
});

/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/

