<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PrestataireController;

Route::get('/', [
    HomeController::class, 'index'
])->name('accueil');


Route::prefix('demandeur')->group(function () {
    Route::get('/', [DemandeurController::class, 'index'])->name('demandeur.accueil');
    Route::get('/demandes', [DemandeurController::class, 'demandes'])->name('demandeur.demandes');
    Route::get('/profil', [DemandeurController::class, 'profil'])->name('demandeur.profil');
    Route::get('/demande', [DemandeurController::class, 'demande'])->name('demandeur.demande');
});

Route::prefix('prestataire')->group(function () {
    Route::get('/', [PrestataireController::class, 'index'])->name('prestataire.accueil');

    Route::get('/profil', [PrestataireController::class, 'profil'])->name('prestataire.profil');
});
