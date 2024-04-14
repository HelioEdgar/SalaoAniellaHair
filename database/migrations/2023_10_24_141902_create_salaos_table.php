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
        Schema::create('salaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('email');
            $table->string('nif');
            $table->integer('telefone');
            $table->text('localizacao')->nullable();
            $table->text('sobre');
            $table->text('foto')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('tt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaos');
    }
};
