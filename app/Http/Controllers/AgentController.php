<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    // AGENDAMENTO, SIMULAÇÃO
    public function Agendamento(){

        $request->validate([
            'dias' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            'id_servico' => 'required',
            'id_user' => 'required',
        ]);


        $data = new Horario;
        $data->id_servico = $request->id_servico;
        $data->id_user = $request->id_user;
        $data->id_cliente = $request->id_cliente;
    }



    public function AgentDashboard(){
        return view('agent.agent_dashboard');
    }

    public function AgentLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/func/login');
    }

    public function AgentLogin(){
        return view('func.func');
    }

    public function AgentProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('func.func', compact('profileData'));
    }

    public function AgentProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->nif = $request->nif;
        $data->gender = $request->gender;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/agent_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/agent_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Informações Guardadas com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AgentChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_change_password',compact('profileData'));
    }

    public function AgentUpdatePassword(Request $request){
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
}
