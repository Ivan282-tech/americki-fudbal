<?php

namespace App\Http\Controllers;

use App\Models\Novosti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class NovostiController extends Controller
{
    public function dodajNovost(Request $request){
        $validacija = $request->validate([
            'naslov' => 'required|max:100',
            'tekst' => 'required|max:300',
            'slike.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif',
        ]);

        $novost = new Novosti();

        $novost->naslov = $validacija['naslov'];
        $novost->opis = $validacija['tekst'];
        $novost->vreme_objave = today();
        $novost->korisnik_id = auth()->user()->id;
        $novost->save();

         if($request->hasFile('slike')){
            $slike = $request->file('slike');

           
            foreach($slike as $slika){
          
                $ime_slike = time() . $slika->getClientOriginalName();

                $slika->move(public_path('slike_igraca'), $ime_slike);

                $novost->slike()->create(['slika' => $ime_slike]);
             }
         }
        return redirect()->route('pocetna'); 
    }

    public function vratiSveNovostiKorisnika(){

        $novosti = Novosti::where('korisnik_id', Auth::user()->id)->get();

        return view ('upravljanje_novostima', ['novosti'=> $novosti]);
    }
    public function obrisiNovost($id) {
        $novost = Novosti::find($id);
    
        if (Auth::user()->id == $novost->korisnik_id) {
            foreach ($novost->slike as $slika) {
                $putanjaSlike = public_path('slike_igraca/' . $slika->slika);
                if (file_exists($putanjaSlike)) {
                    unlink($putanjaSlike);
                }
                $slika->delete();
            }
            $novost->delete();
    
            return redirect()->back()->with('Uspeh!', 'Uspešno ste obrisali novost!');
        } else {
            return redirect()->back()->with('Greška!', 'Novost koju pokušavate da obrišete nije vaša!');
        }
    }

    public function vratiFormu(Novosti $novost){
        if(Auth::user()->id == $novost->korisnik_id){
            return view('izmeni_novost_forma', ['novost' => $novost]);
        }else{
            return redirect()->back()->with('Greška', 'Ne možete da pristupite izmenama novosti koje nisu vaše!');
        }
        
    }

    public function sacuvaj_izmene(Request $request, $id){
        $novost = Novosti::find($id);

        if(!$novost){
            return redirect()->back()->with('Greška', 'Novost nije pronađena');
        }
        if(Auth::user()->id == $novost->korisnik_id){
            $validacija = $request->validate([
                'naslov' => 'required|max:100',
                'tekst' => 'required|max:300',
                'slike.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $novost->update([
                'naslov' => $validacija['naslov'],
                'opis' => $validacija['tekst'],
            ]);
            $novost->slike()->delete();
            if ($request->hasFile('slike')) {
                foreach ($request->file('slike') as $novaSlika) {
                    $ime_slike = time() . $novaSlika->getClientOriginalName();
                    $novaSlika->move(public_path('slike_igraca'), $ime_slike);
                    $novost->slike()->create(['slika' => $ime_slike]);
                }
            }

            return redirect()->route('pocetna')->with('success', 'Izmene su uspešno sačuvane.');
        }else{
            return redirect()->back()->with('Greška', 'Ne možete da menjate novost koja nija vaša!');
        }
        
    }
    public function vratiPost($id){
        $novost = Novosti::find($id);

        if($novost == null){
            return redirect()->route('pocetna')->withError('Greška', "Ne postoji post.");
        }else{
            return view('post', ["novost" => $novost]);
        }
    }
    
}
