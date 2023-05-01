<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\PatronymeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PolitiqueDeConfidentialiteController;
use App\Http\Controllers\ProtectionDesDonneesController;
use App\Http\Controllers\DeclarationDeConformiteController;
use App\Http\Controllers\RechercheController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['throttle:60, 1'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

    Route::get('/acceuil', [AcceuilController::class, 'index'])->name('acceuil');

    Route::get('/patronyme', [PatronymeController::class, 'index'])->name('patronyme');
    Route::get('/patronyme-{designation}', [PatronymeController::class, 'show'])->name('show-patronyme');

    Route::get('/contacts', [ContactController::class, 'create'])->name('form-contact');
    Route::post('/store-contact-data', [ContactController::class, 'store'])->name('store-contact-data');

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/politique-de-confidentialite', [PolitiqueDeConfidentialiteController::class, 'index'])->name('politique-de-confidentialite');
    Route::get('/protection-des-donnees', [ProtectionDesDonneesController::class, 'index'])->name('protection-des-donnees');
    Route::get('/declaration-de-conformite', [DeclarationDeConformiteController::class, 'index'])->name('declaration-de-conformite');
    Route::post('/recherche', [RechercheController::class, 'search'])->name('recherche');
});

Auth::routes();

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/form-create-patronyme', [PatronymeController::class, 'create'])->name('form-create-patronyme');
    Route::post('/patronyme/store', [PatronymeController::class, 'store'])->name('store-patronyme-data');
    Route::get('/patronyme/edit/{id}', [PatronymeController::class, 'edit'])->name('form-edit-patronyme-data');
    Route::post('/patronyme/update/{id}', [PatronymeController::class, 'update'])->name('update-patronyme-data');
    Route::get('/patronyme/destroy/{id}', [PatronymeController::class, 'destroy'])->name('destroy-patronyme-data');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/deconnexion', [LogoutController::class, 'perForm'])->name('logout.perForm');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/privates', function () {
        return "Privates routes";
    });
});
