<?php

use App\Http\Controllers\IgracController;
use App\Http\Controllers\NovostiController;
use App\Http\Controllers\PozicijaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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



Route::middleware(['auth'])->group(function () {
    
    Route::get('dodajNovost', function () {
        return view('dodaj_novost');
    })->name('dodajNovost');

    Route::get('/noviIgrac', [PozicijaController::class, 'vratiSvePozicije'])->name('noviIgrac');

    Route::post('novi_igrac', [IgracController::class, 'dodajIgraca']);

    Route::post('dodaj_novost', [NovostiController::class, 'dodajNovost']);

    Route::get('upravljajNovostima', [NovostiController::class, 'vratiSveNovostiKorisnika'])->name('upravljajNovostima');

    
    
});

Route::get('/listaIgraca', [IgracController::class, 'vrati_sve_igrace'])->name('listaIgraca');

Auth::routes(['register' => true]); // ['register' => false, 'reset' => false]

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('pocetna');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('pocetna');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::delete('obrisi_novost/{id}', [NovostiController::class, 'obrisiNovost'])->name('obrisi_novost');

Route::get('izmeni_novost/{novost}', [NovostiController::class, 'vratiFormu'])->name('vrati_formu');


Route::post('izmeni_novost/{id}', [NovostiController::class, 'sacuvaj_izmene'])->name('upisi_izmenu');


Route::post('/forma-login', function(){
    return view('login');
})->name('forma-login');



Route::get('prikazi_post/{id}', [NovostiController::class, 'vratiPost'])->name("prikaz_posta");
