<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrittersController;
use App\Http\Controllers\GenericController;

Route::get('/', [GenericController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return redirect()->route('profile.edit');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'critters', 'as' => 'critters.', 'middleware' => ['auth']], function () {
    Route::get('/register', [CrittersController::class, 'create'])->middleware('verified')->name('register');
    Route::post('/', [CrittersController::class, 'store'])->name('store');
    Route::get('/', [CrittersController::class, 'index'])->name('index');
    Route::get('/myRegisters', [CrittersController::class, 'myRegisters'])->name('myRegisters');
    Route::get('/{id}/edit', [CrittersController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CrittersController::class, 'update'])->name('update');
    Route::delete('/{id}', [CrittersController::class, 'destroy'])->name('destroy');
});

Route::get('/search/{id}', [CrittersController::class, 'showById'])->name('critters.showById');

Route::get('/show/all/{start?}', [CrittersController::class, 'showAll'])->name('critters.all');

Route::get('/search', [CrittersController::class, 'search'])->name('critters.search');

Route::get('/how/to/use', [GenericController::class, 'howto'])->name('howToUse');


Route::fallback(function () {
    return redirect()->route('welcome');
});

require __DIR__ . '/auth.php';
