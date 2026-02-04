<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clan', function (Blueprint $table) {
           $table->char("oib",11)->primary();
           $table->string("ime",50);
           $table->string("prezime",50);
           $table->string("adresa",100);
           $table->string("email",50);
           $table->string("broj_telefona",20);
           $table->char("spol",1);
           $table->date("datumRodjenja");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clan');
    }
};
