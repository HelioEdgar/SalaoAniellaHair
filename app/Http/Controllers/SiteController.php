<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\User;
use App\Models\Galeria;
use App\Models\Horario;
use App\Models\Salao;
use DateTime;
use DateInterval;

class SiteController extends Controller
{
    //
    public function index(){
        $servicos = Servico::where('estado', 'activo')->get();
        $salaos = Salao::all();
        $galerias = Galeria::all();
        
        $funcs = User::where('perfil', 'funcionario')->get();
        
        return view('frontend/index', compact('servicos', 'salaos', 'galerias', 'funcs'));
    }

    public function detalhes($slug){
        $servico = Servico::where('slug', $slug)->first();
        $salaos = Salao::all();
        $funcs = User::where('perfil', 'funcionario')->get();
        $horarios = Horario::all();
        return view('frontend/detalhes_servico', compact('servico', 'salaos', 'funcs', 'horarios'));
    }

    

}
