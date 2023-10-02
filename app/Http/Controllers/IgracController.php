<?php

namespace App\Http\Controllers;

use App\Models\Igrac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IgracController extends Controller
{

    public function dodajIgraca(Request $request){
        $validacija = $request->validate([
           'ime' => 'required|string',
           'prezime' => 'required',
           'godine' => 'required|integer|min:0|max:100',
           'pol' => 'required|string|in:M,Z',
           'visina' => 'required|integer|min:0|max:500',
           'tezina' => 'required|integer|min:0|max:500',
           'pozicija' => 'required|integer|min:1|max:20',
           'brKartona' => 'required|string|max:255',
           'brDresa' => 'required|string|max:255'
        ]);

        $igrac = new Igrac();

        $igrac->ime = $validacija['ime'];
        $igrac->prezime = $validacija['prezime'];
        $igrac->godina = $validacija['godine'];
        $igrac->pol = $validacija['pol'];
        $igrac->broj_kartice = $validacija['brKartona'];
        $igrac->broj_dresa = $validacija['brDresa'];
        $igrac->pozicija = $validacija['pozicija'];
        $igrac->visina = $validacija['visina'];
        $igrac->tezina = $validacija['tezina'];

        if($request->hasFile('slika')){
            $slika = $request->file('slika');
            $ime_slike = time() . $slika->getClientOriginalName();
            $slika->move(public_path('slike_igraca'), $ime_slike);
            $igrac->slika = 'slike_igraca/' . $ime_slike;    
        }
      
        
        $igrac->save();

        return redirect()->route('listaIgraca');
    }

    public function vrati_sve_igrace(){
        
        $igraci = DB::table('pozicije')
        ->join('igraci', 'pozicije.id', '=', 'igraci.pozicija')
        ->select('igraci.slika', 'igraci.ime', 'igraci.prezime', 'igraci.godina', 'igraci.pol', 'igraci.broj_kartice', 'igraci.broj_dresa', 'igraci.visina', 'igraci.tezina', 'pozicije.naziv')
        ->get();
        return view('lista_igraca', ['igraci' => $igraci]);
    }
}
