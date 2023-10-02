<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novosti extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'novosti';
    protected $fillable = ['naslov', 'opis', 'vreme_objave', 'korisnik_id'];

    public function slike(){
        return $this->hasMany(Slika::class, 'novosti_id');
    }
}
