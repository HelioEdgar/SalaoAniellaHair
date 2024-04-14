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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->date('dataA');
            $table->time('hora');
            $table->unsignedBigInteger('id_servico')->nullable();
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->foreign('id_funcionario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('estado',['Pendente','Concluido','Cancelado'])->default('Pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
