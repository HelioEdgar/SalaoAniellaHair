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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->text('dias');
            $table->time('inicio');
            $table->time('fim');
            $table->enum('estado',['Ocupado','Livre'])->default('Livre');
            $table->unsignedBigInteger('id_servico')->nullable();
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
