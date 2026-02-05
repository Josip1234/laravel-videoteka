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
        Schema::table('popisposudjenih', function (Blueprint $table) {
            $table->dropColumn("id_filma");
            $table->integer("id_filma",false,true);
            $table->foreign("id_filma","film_id_fk")->references("id_filma")->on("film")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('popisposudjenih', function (Blueprint $table) {
                   Schema::disableForeignKeyConstraints();
                   Schema::dropIfExists('popisposudjenih');
              Schema::enableForeignKeyConstraints();
        });
    }
};
