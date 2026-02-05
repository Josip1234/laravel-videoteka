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
        Schema::create('clanska_iskaznica', function (Blueprint $table) {
           $table->string("broj_iskaznice",20)->primary();
           $table->char("oib_videoteke",11);
           $table->char("oib_clana",11)->unique("oib_cl_uk");
           $table->foreign("oib_videoteke")->references('oib')->on("videoteka")->cascadeOnDelete()->cascadeOnUpdate();
          $table->foreign("oib_clana")->references('oib')->on("clan")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clanska_iskaznica');
         Schema::enableForeignKeyConstraints();
    }
};
