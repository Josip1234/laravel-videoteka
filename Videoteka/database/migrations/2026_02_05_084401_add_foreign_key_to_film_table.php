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
        Schema::table('film', function (Blueprint $table) {
            $table->dropColumn("broj_medija");
            $table->dropColumn("broj_zanra");
            $table->integer("broj_medija",false,true);
            $table->integer("broj_zanra",false,true);
            $table->foreign("broj_medija","broj_medija_fk")->references("broj_medija")->on("medij")->cascadeOnUpdate()->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('film', function (Blueprint $table) {
              Schema::disableForeignKeyConstraints();
            Schema::dropIfExists('film');
             Schema::enableForeignKeyConstraints();
        });
    }
};
