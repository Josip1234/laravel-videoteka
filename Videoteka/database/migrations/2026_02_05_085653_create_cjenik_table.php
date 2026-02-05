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
        Schema::create('cjenik', function (Blueprint $table) {
            $table->increments("id_cjenika");
            $table->integer("id_filma",false,true);
            $table->char("oib_videoteke",11);
            $table->decimal("cijena_filma",5,2);
            $table->integer("id_vrste_cjenika",false,true);
            $table->foreign("id_filma")->references("id_filma")->on("film")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("oib_videoteke")->references("oib")->on("videoteka")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("id_vrste_cjenika")->references("id_vrste_cjenika")->on("vrsta_cjenika")->noActionOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cjenik');
        Schema::enableForeignKeyConstraints();
    }
};
