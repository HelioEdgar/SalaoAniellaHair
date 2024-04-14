<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Servico;
use App\Models\Agendamento;

class FuncController extends Controller
{
    //

    public function ativarF($id)
    {
        $utilizador = User::findOrFail($id);
        $utilizador->estado = 'activo';
        $utilizador->save();

        return redirect()->back();
    }

    public function desativarF($id)
    {
        $utilizador = User::findOrFail($id);
        $utilizador->estado = 'inactivo';
        $utilizador->save();

        return redirect()->back();
    }

    public function ListaFuncionario(){
        $per = 'funcionario';
        //$funcionarios = User::where(user()->perfil->$per);
        $funcionarios = User::where('perfil', 'funcionario')->get();
        return view('backend.funcionario.lista_funcionario', compact('funcionarios'));
    }

    public function FuncionarioProfile($id){
        $funcionarios = User::findOrFail($id);
        return view('backend.funcionario.funcionario_profile_view',compact('funcionarios'));
    }


    public function FuncDashboard(){
        return view('func.func_dashboard');
    }

    public function FuncLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/func/login');
    }

    public function FuncLogin(){
        return view('func.func_login');
    }

    public function FuncProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('func.func_profile_view', compact('profileData'));
    }

    public function FuncProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->nome = $request->nome;
        $data->nome_utilizador = $request->nome_utilizador;
        $data->email = $request->email;
        $data->telefone = $request->telefone;
        $data->nif = $request->nif;
        $data->genero = $request->genero;
        $data->data_nascimento = $request->data_nascimento;
        $data->provincia = $request->provincia;
        $data->municipio = $request->municipio;
        $data->distrito = $request->distrito;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/func_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/func_imagens'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Informações Guardadas com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function FuncChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('func.func_change_password',compact('profileData'));
    }

    public function FuncUpdatePassword(Request $request){
        //Validação
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Match The Old Password
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Palavra Passe Antiga Não Corresponde!',
                'alert-type' => 'error'
        );

        return back()->with($notification);
        }

        //Update The New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Palavra Alterada Com Sucesso!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function FuncAgendamento(){
        $idFuncionario = Auth::id(); // Obtém o ID do funcionário logado
        $agendamentos = Agendamento::where('id_funcionario', $idFuncionario)->get();
        $servicos = Servico::all();
        $funcionarios = User::all();
        return view('backend.agendamento.lista_agendamento', compact('agendamentos', 'servicos', 'funcionarios'));
    }

    public function ApagarConta($id){
        
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Conta Apagada!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.funcionario')->with($notification);
    }
}
