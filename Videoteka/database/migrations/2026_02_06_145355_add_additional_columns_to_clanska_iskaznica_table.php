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
        Schema::table('clanska_iskaznica', function (Blueprint $table) {
            $table->date("datum_uclanjenja");
            $table->date("datum_isclanjenja");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clanska_iskaznica', function (Blueprint $table) {
            Schema::dropColumns("clanska_iskaznica",["datum_uclanjenja","datum_isclanjenja"]);
        });
    }
};
