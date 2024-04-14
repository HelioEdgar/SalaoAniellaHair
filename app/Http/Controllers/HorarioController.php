<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\User;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListaHorario(){
        $horarios = Horario::with(['servico', 'funcionario'])->get();
        $servicos = Servico::all();
        $funcionarios = User::all();
        return view('backend.horario.lista_horario', compact('horarios', 'servicos', 'funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AdicionarHorario(){
        $servicos = Servico::all();
        $funcionarios = User::where('perfil', 'funcionario')->get();
        return view('backend.horario.adicionar_horario', compact('servicos', 'funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function GuardarHorario(Request $request){
        
        $request->validate([
            'dias' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            'id_servico' => 'required',
            'id_user' => 'required',
        ]);

        $data = new Horario;
        $data->dias = $request->dias;
        $data->inicio = $request->inicio;
        $data->fim = $request->fim;
        $data->id_servico = $request->id_servico;
        $data->id_user = $request->id_user;


        $data->save();

        $notification = array(
            'message' => 'Horário Adicionado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.horario')->with($notification);
    }

    public function EditarHorario($id){
        $horarios = Horario::findOrFail($id);
        $servicos = Servico::all();
        $funcionarios = User::where('perfil', 'funcionario')->get();
        return view('backend.horario.editar_horario',compact('horarios', 'servicos', 'funcionarios'));
    }

    public function ActualizarHorario(Request $request){

        $pid = $request->id;
        $data = Horario::findOrFail($pid);
        $data->dias = $request->dias;
        $data->inicio = $request->inicio;
        $data->fim = $request->fim;
        $data->id_servico = $request->id_servico;
        $data->id_user = $request->id_user;

        $data->save();

        $notification = array(
            'message' => 'Horário Actualizado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.horario')->with($notification);
    }
    
    public function ApagarHorario($id){
        
        Horario::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Horário Apagado!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.horario')->with($notification);
    }
}
