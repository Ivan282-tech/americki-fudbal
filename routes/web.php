<?php

use App\Http\Controllers\IgracController;
use App\Http\Controllers\PozicijaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('pocetna');

Route::get('/listaIgraca', [IgracController::class, 'vrati_sve_igrace'])->name('listaIgraca');


Route::get('/noviIgrac', [PozicijaController::class, 'vratiSvePozicije']);

Route::post('novi_igrac', [IgracController::class, 'dodajIgraca']);






