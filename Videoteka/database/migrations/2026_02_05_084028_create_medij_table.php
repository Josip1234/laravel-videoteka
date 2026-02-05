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
        Schema::create('medij', function (Blueprint $table) {
            $table->increments("broj_medija");
            $table->string("naziv",50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                  Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('medij');
          Schema::enableForeignKeyConstraints();
    }
};
