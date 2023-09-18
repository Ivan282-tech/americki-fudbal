<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pozicija;

class PozicijaController extends Controller
{
    public function vratiSvePozicije(){
        $pozicije = Pozicija::orderBy('naziv')->get();
        return view('novi_igrac', ['pozicije' => $pozicije]);
    }
}
