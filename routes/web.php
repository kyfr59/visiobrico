<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DemandeurController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\AuthController;

Route::get('/', [PublicController::class, 'home'])->name('accueil');

Route::get('/connexion', [AuthController::class, 'index'])->name('connexion');
Route::get('/connexion/{token}', [AuthController::class, 'connect'])->name('connexion.connect');
Route::post('/connexion', [AuthController::class, 'envoiLien'])->name('connexion.envoilien');
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('deconnexion');
Route::get('/login', fn () => view('auth.login'))->name('login');

Route::middleware('auth')->group(function () {
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
});