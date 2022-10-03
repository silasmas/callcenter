<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientLibelleController;
use App\Http\Controllers\ScriptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SujetController;

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
    return view('auth/login');
});
Route::middleware(['auth', "verified"])->group(function () {
    Route::get('dashboard', [ClientController::class, 'index'])->name('dashboard');
    Route::get('addScript', [ClientController::class, 'addScript'])->name('addScript');
    Route::get('addStatut', [ClientController::class, 'addStatut'])->name('addStatut');
    
    
    
    Route::get('gstatu', [ClientLibelleController::class, 'gstatu'])->name('gstatu');
    Route::get('gscripte', [ClientLibelleController::class, 'gscripte'])->name('gscripte');
    Route::get('admin', [ClientLibelleController::class, 'index'])->name('admin');
    Route::get('guser', [ClientLibelleController::class, 'guser'])->name('guser');
    
    Route::post('addscript', [ScriptController::class, 'store'])->name('addscript');
    Route::post('addstatut', [SujetController::class, 'store'])->name('addstatut');
    Route::post('addlibelle', [SujetController::class, 'addlibelle'])->name('addlibelle');
    Route::post('addClient', [ClientController::class, 'store'])->name('addClient');
    Route::get('statut', [SujetController::class, 'index'])->name('statut');
});

require __DIR__.'/auth.php';
