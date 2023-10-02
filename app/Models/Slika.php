<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slika extends Model
{
    use HasFactory;
    protected $table = 'slike';
    public $timestamps = false;
    protected $fillable = ['slika', 'novosti_id'];
}
