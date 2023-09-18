<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Igrac extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'igraci';
    protected $fillable = ['ime', 'prezime', 'godina', 'pol', 'broj_kartice', 'broj_dresa', 'slika', 'visina', 'tezina', 'pozicija'];


    public function pozicija()
    {
        return $this->belongsTo(Pozicija::class, 'pozicija');
    }
    
}
