<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Servico;
use App\Models\Horario;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function buscarHorarios($diaDaSemana)
{
    // Converter dia da semana de número (0-6) para texto ('segunda', 'terça', etc)
    $dias = ['domingo', 'segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado'];
    $diaDaSemanaTexto = $dias[$diaDaSemana] ?? null;

    if (!$diaDaSemanaTexto) {
        return response()->json([], 400);
    }

    $horarios = Horario::where('dias', 'like', '%' . $diaDaSemanaTexto . '%')
                        //->where('estado', 'Livre')
                        ->get();

    return response()->json($horarios);
}

     public function criarAgendamento(Request $request) {
        // Validação dos dados de entrada
        $validatedData = $request->validate([
            'dataA' => 'required|date',
            //'hora' => 'required|time',
            'id_servico' => 'required|exists:servicos,id',
            //'id_user' => 'required|exists:users,id',
            'id_funcionario' => 'required|exists:users,id',
        ]);
    
        // Verificação de disponibilidade
        // $horario = Horario::where('id_servico', $request->id_servico)
        //                   ->where('estado', 'Livre')
        //                   ->whereTime('inicio', '<=', $request->hora)
        //                   ->whereTime('fim', '>=', $request->hora)
        //                   ->first();
    
        // if (!$horario) {
        //     return response()->json(['erro' => 'Horário não disponível'], 400);
        // }

        // Encontrar o horário específico
        $horarioSelecionado = Horario::findOrFail($request->horario);
    
        // Criação do Agendamento
        $agendamento = new Agendamento();
        $agendamento->dataA = $request->dataA;
        $agendamento->hora = $horarioSelecionado->inicio;
        $agendamento->id_servico = $request->id_servico;
        $agendamento->estado = 'Marcado';
        $agendamento->id_funcionario = $request->id_funcionario;
        $agendamento->id_user = auth()->user()->id;
        $agendamento->save();
    
        // Atualização do estado do Horário
        // $horario->estado = 'Ocupado';
        // $horario->save();
    
        $notification = array(
            'message' => 'Agendamento Marcado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    


    public function AgendamentoGuardar(Request $request){

        $request->validate([

            'dataA' => 'required',
            'id_servico' => 'required',
            'id_user' => 'required',
        ]);


        $data = new Agendamento;
        $data->dataA = $request->dataA;
        $data->hora = $request->hora;
        $data->id_servico = $request->id_servico;
        $data->id_user = $request->id_user;
        $data->id_func = $request->id_funcionario;

        $data->save();

        $notification = array(
            'message' => 'Agendamento Marcado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getHorariosDisponiveis(Request $request)
    {

        try {
            $date = $request->input('date');
            $diaSemana = [
                'Segunda-feira',
                'Terça-feira',
                'Quarta-feira',
                'Quinta-feira',
                'Sexta-feira',
                'Sábado',
                'Domingo',
            ];
            $diaSemanaSelecionado = $diaSemana[date('N', strtotime($date)) - 1];
            $horariosDisponiveis = Horario::where('dias', $diaSemanaSelecionado)->get();


            return response()->json($horariosDisponiveis);
        } catch (\Exception $e) {
            // Registre o erro e trate-o adequadamente
            Log::error($e->getMessage());
            return response()->json(['error' => 'Ocorreu um erro ao buscar os horários disponíveis.']);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function ListaAgendamento(){
        $agendamentos = Agendamento::all();
        $servicos = Servico::all();
        $funcionarios = User::all();
        return view('backend.agendamento.lista_agendamento', compact('agendamentos', 'servicos', 'funcionarios'));
    }

    /**
     * Display the specified resource.
     */
    public function EditarAgendamento($id){

        
        $data = Agendamento::findOrFail($id);
        
        
        $data->estado = 'Cancelado';
        $data->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ConcluirAgendamento($id){

        
        $data = Agendamento::findOrFail($id);
        
        
        $data->estado = 'Concluido';
        $data->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
