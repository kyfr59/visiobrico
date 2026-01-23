<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RequesterController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\AuthController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/connexion', [AuthController::class, 'index'])->name('connexion');
Route::get('/connexion/{token}', [AuthController::class, 'connect'])->name('connexion.connect');
Route::post('/connexion', [AuthController::class, 'sendlink'])->name('connexion.sendlink');
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('disconnect');
Route::get('/demande', [DemandController::class, 'index'])->name('public.demand');
Route::post('/demande', [DemandController::class, 'add'])->name('public.demand.add');
Route::get('/login', fn () => view('auth.login'))->name('login'); // Route fictive

Route::middleware('auth')->group(function () {
    Route::prefix('demandeur')->group(function () {
        Route::get('/', [RequesterController::class, 'home'])->name('requester.home');
        Route::get('/demandes', [RequesterController::class, 'demands'])->name('requester.demands');
        Route::get('/profil', [RequesterController::class, 'profile'])->name('requester.profile');
        Route::get('/demande', [RequesterController::class, 'demand'])->name('requester.demand');
    });

    Route::prefix('prestataire')->group(function () {
        Route::get('/', [ProviderController::class, 'home'])->name('provider.home');
        Route::get('/propositions', [ProviderController::class, 'proposals'])->name('provider.proposals');
        Route::get('/recherche', [ProviderController::class, 'search'])->name('provider.search');
        Route::get('/profil', [ProviderController::class, 'profile'])->name('provider.profile');
    });
});