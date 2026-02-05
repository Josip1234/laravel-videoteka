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
        Schema::create('posudba', function (Blueprint $table) {
            $table->increments("broj_posudbe");
              $table->string("broj_iskaznice",20);
              $table->integer("brojPopisa");
              $table->decimal("zakasnina",5,2);
              $table->foreign("broj_iskaznice")->references("broj_iskaznice")->on("clanska_iskaznica")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('posudba');
        Schema::enableForeignKeyConstraints();
    }
};
