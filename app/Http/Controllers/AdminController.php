<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Agendamento;

class AdminController extends Controller
{
    //
    public function CriarFunc(Request $request){
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'perfil' => ['required', 'string', 'max:255'],
        ],
    [
        'nome.required' => 'Por favor, insira o nome',
        'nome.unique' => 'O email já está a ser utilizado',
        'password.required' => 'Por favor, insira uma palavra-passe',
        'password.confirmed' => 'Palavra-passe não são iguais',
    ]);

    $data = new User;
        
        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->perfil = $request->perfil;

        $data->save();

        $notification = array(
            'message' => 'Funcinário Adicionado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.funcionario')->with($notification);

    }

    public function ViewFunc(){
        return view('backend.funcionario.adicionar_funcionario');
    }


    public function AdminDashboard(){
        $numeroAgendamentosMarcados = Agendamento::where('estado', 'Marcado')->count();
        $numeroClientes = User:: where('perfil', 'utilizador')->count();
        $numeroFunc = User:: where('perfil', 'funcionario')->where('estado', 'activo')->count();
        return view('admin.index', compact('numeroAgendamentosMarcados', 'numeroClientes', 'numeroFunc'));
        
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->nome = $request->nome;
        $data->nome_utilizador = $request->nome_utilizador;
        $data->email = $request->email;
        $data->telefone = $request->telefone;
        $data->nif = $request->nif;
        $data->genero = $request->genero;
        $data->provincia = $request->provincia;
        $data->municipio = $request->municipio;
        $data->distrito = $request->distrito;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/admin_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_imagens'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Informações Guardadas com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request){
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
            'message' => 'Palavra Passe Alterada Com Sucesso!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }



    
}
