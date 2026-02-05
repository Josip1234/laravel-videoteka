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
        Schema::create('film', function (Blueprint $table) {
           $table->increments("id_filma");
           $table->string("naziv",50);
           $table->integer("dostupneKolicine",false,false);
           $table->integer("broj_medija",false,true);
           $table->integer("broj_zanra",false,true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('film');
               Schema::enableForeignKeyConstraints();
    }
};
