<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PrestataireController;

Route::get('/', [PublicController::class, 'home'])->name('accueil');

Route::prefix('demandeur')->group(function () {
    Route::get('/', [DemandeurController::class, 'index'])->name('demandeur.accueil');
    Route::get('/demandes', [DemandeurController::class, 'demandes'])->name('demandeur.demandes');
    Route::get('/profil', [DemandeurController::class, 'profil'])->name('demandeur.profil');
    Route::get('/demande', [DemandeurController::class, 'demande'])->name('demandeur.demande');
});

Route::prefix('prestataire')->group(function () {
    Route::get('/', [PrestataireController::class, 'index'])->name('prestataire.accueil');
    Route::get('/propositions', [PrestataireController::class, 'propositions'])->name('prestataire.propositions');
    Route::get('/recherche', [PrestataireController::class, 'recherche'])->name('prestataire.recherche');
    Route::get('/profil', [PrestataireController::class, 'profil'])->name('prestataire.profil');
});
