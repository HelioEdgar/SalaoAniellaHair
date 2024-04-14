<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function servico(){
        return $this->belongsTo(Servico::class, 'id_servico');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function funcionario()
    {
        return $this->belongsTo('App\Models\User', 'id_funcionario');
    }
}
