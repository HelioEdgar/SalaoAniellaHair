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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('nome_utilizador')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('perfil',['administrador','funcionario','utilizador'])->default('utilizador');
            $table->string('foto')->nullable();
            $table->string('telefone')->nullable();
            $table->string('nif')->nullable();
            $table->string('genero')->nullable();
            $table->string('especialidade')->nullable();
            $table->string('data_nascimento')->nullable();
            $table->enum('estado',['Activo','Inactivo', 'Excluido'])->default('Activo');
            $table->string('provincia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('distrito')->nullable();
            $table->string('morada')->nullable();
            $table->text('sobre')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
