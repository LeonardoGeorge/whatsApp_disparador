<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

// Rota raiz (pública)
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('campaigns.create')
        : redirect()->route('login');
});

// Rotas protegidas
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('campaigns.create');
    })->name('dashboard');

    // Rotas de campanha
    Route::resource('campaigns', CampaignController::class)->only([
        'create',
        'store',
        'show',
        'edit'
    ]);

    
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/campaigns/{id}/process', [CampaignController::class, 'process'])
    ->name('campaigns.process');

require __DIR__ . '/auth.php';
