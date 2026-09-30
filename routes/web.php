<?php

use App\Http\Controllers\AnalysisController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['id', 'en'], true), 404);

    session()->put('locale', $locale);

    return redirect()->route('home');
})->name('language.switch');

Route::view('/', 'welcome')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/analyze', [AnalysisController::class, 'create'])->name('analyze');
    Route::post('/analyze', [AnalysisController::class, 'store'])->name('analyze.store');
    Route::get('/analyze/{analysis}', [AnalysisController::class, 'show'])->name('analyze.result');
    Route::get('/history', [AnalysisController::class, 'history'])->name('history');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
