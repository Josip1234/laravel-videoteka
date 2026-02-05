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
        Schema::create('popisposudjenih', function (Blueprint $table) {
           $table->increments("brojPopisa");
           $table->integer("id_filma");
           $table->date("datum_posudbe");
           $table->date("datum_vracanja");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
           Schema::dropIfExists('popisposudjenih');
         Schema::enableForeignKeyConstraints();
    }
};
