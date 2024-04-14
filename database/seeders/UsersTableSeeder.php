<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            // ADMIN
            [
                'nome' => 'Admin',
                'nome_utilizador' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'perfil' => 'administrador',
                'estado' =>'activo'
            ],

            // FUNCIONARIO
            [
                'nome' => 'Func',
                'nome_utilizador' => 'func',
                'email' => 'func@gmail.com',
                'password' => Hash::make('111'),
                'perfil' => 'funcionario',
                'estado' =>'activo'
            ],

            // UTILIZADOR
            [
                'nome' => 'Utilizador',
                'nome_utilizador' => 'utilizador',
                'email' => 'utilizador@gmail.com',
                'password' => Hash::make('111'),
                'perfil' => 'utilizador',
                'estado' =>'activo'
            ],

            

            
        ]);
    }
}
