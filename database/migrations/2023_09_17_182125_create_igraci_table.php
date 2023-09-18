<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIgraciTable extends Migration
{
    public function up()
    {
        Schema::create('igraci', function (Blueprint $table) {
            $table->id();
            $table->string('slika')->nullable();
            $table->string('ime');
            $table->string('prezime');
            $table->integer('godina');
            $table->string('pol');
            $table->integer('visina');
            $table->integer('tezina');
            $table->unsignedBigInteger('pozicija'); 
            $table->string('broj_kartice');
            $table->string('broj_dresa');
            $table->foreign('pozicija')->references('id')->on('pozicije');
        });
    }

    public function down()
    {
        Schema::dropIfExists('igraci');
    }
}
