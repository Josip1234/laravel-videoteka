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
        Schema::create('vrsta_cjenika', function (Blueprint $table) {
                $table->increments("id_vrste_cjenika");
                $table->string("naziv",50);
                $table->text("opis");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
             Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('vrsta_cijenika');
          Schema::dropIfExists('vrsta_cjenika');
          Schema::enableForeignKeyConstraints();
    }
};
