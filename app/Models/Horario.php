<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function servico(){
        return $this->belongsTo(Servico::class, 'id_servico');
    }
    public function funcionario(){
        return $this->belongsTo(User::class, 'id_user');
    }

   
}
