<?php
namespace Database\Seeders;

use App\Models\Pozicija;
use Illuminate\Database\Seeder;

class PozicijeSeeder extends Seeder
{
    public function run()
    {
        $pozicije = [
            'Pleme', 'Spoljni centar', 'Krilo', 'Osmica', 'Polubek',
            'Pleme desno', 'Spoljni centar desno', 'Krilo desno', 'Osmica desno', 'Polubek desno',
            'Pleme levo', 'Spoljni centar levo', 'Krilo levo', 'Osmica levo', 'Polubek levo',
            'Obrambeni pleme', 'Obrambeni spoljni centar', 'Obrambeni krilo', 'Obrambena osmica', 'Obrambeni polubek',
            // Dodaj ostale pozicije
        ];

        foreach ($pozicije as $pozicija) {
            Pozicija::create(['naziv' => $pozicija]);
        }
        
    }
}

