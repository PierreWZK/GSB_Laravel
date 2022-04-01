<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

#Aissam snap : lz-aissam (que les meufs)

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/rapport',[App\Http\Controllers\RapportController::class,'liste'])->name('rapport');
    
    Route::post('/nouveauRapport',[App\Http\Controllers\RapportController::class,'store'])->name('nouveauRapport');
    Route::get('/nouveauRapport',[App\Http\Controllers\RapportController::class,'rapportVisiteur'])->name('rapportVisiteur');
    
    Route::get('/praticien',[App\Http\Controllers\PraticienController::class,'liste'])->name('praticien');
    Route::get('/searchPraticien',[App\Http\Controllers\PraticienController::class,'search'])->name('researchPra');
    
    Route::get('/visiteur',[App\Http\Controllers\VisiteurController::class,'liste'])->name('visiteur');
    Route::get('/searchVisiteur',[App\Http\Controllers\VisiteurController::class,'searchVisiteur'])->name('research');

    Route::get('/medicaments',[App\Http\Controllers\MedicamentsController::class,'liste'])->name('medicaments');
    Route::get('/searchMedicaments',[App\Http\Controllers\MedicamentsController::class,'searchMedicaments'])->name('researchMed');

    Route::post('/profil',[App\Http\Controllers\ProfilController::class,'storeProfil'])->name('profil');
    Route::get('/profil',[App\Http\Controllers\ProfilController::class,'liste'])->name('profilVisiteur');
});
