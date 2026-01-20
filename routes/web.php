<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PrestataireController;

Route::get('/', [
    HomeController::class, 'index'
])->name('home');


Route::prefix('demandeur')->group(function () {
    Route::get('/', [DemandeurController::class, 'index'])->name('demandeur.home');
    Route::get('/messages', [DemandeurController::class, 'messages'])->name('demandeur.messages');
    Route::get('/profile', [DemandeurController::class, 'profile'])->name('demandeur.profile');
});

Route::prefix('prestataire')->group(function () {
    Route::get('/', [PrestataireController::class, 'index'])->name('prestataire.home');
    Route::get('/messages', [PrestataireController::class, 'messages'])->name('prestataire.messages');
    Route::get('/profile', [PrestataireController::class, 'profile'])->name('prestataire.profile');
});
