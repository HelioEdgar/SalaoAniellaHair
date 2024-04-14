<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Servico;
use App\Models\Galeria;
use App\Models\Salao;
use App\Models\Agendamento;

class UtilizadorController extends Controller
{
    //

    public function ativar($id)
    {
        $utilizador = User::findOrFail($id);
        $utilizador->estado = 'activo';
        $utilizador->save();

        return redirect()->back();
    }

    public function desativar($id)
    {
        $utilizador = User::findOrFail($id);
        $utilizador->estado = 'inactivo';
        $utilizador->save();

        return redirect()->back();
    }


    public function ListaCliente(){

        $utilizadores = User::whereRaw('LOWER(perfil) = ?', ['utilizador'])->get();
        return view('backend.cliente.lista_cliente', compact('utilizadores'));
    }

    public function ClienteProfile($id){
        $utilizadores = User::findOrFail($id);
        return view('backend.cliente.cliente_profile_view',compact('utilizadores'));
    }

    public function UtilizadorDashboard(){
        $salaos = Salao::all();
        return view('utilizador.utilizador_dashboard',compact('salaos'));
    }

    public function UtilizadorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/salao');
    }

    public function UtilizadorLogin(){
        return view('utilizador.utilizador_login');
    }

    public function UtilizadorProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $salaos = Salao::all();
        $userId = Auth::id(); // Pega o ID do usuário logado
        $agendamentos = Agendamento::where('id_user', $userId)->with('funcionario')->get();
        return view('utilizador.utilizador_profile_view', compact('profileData', 'salaos', 'agendamentos'));
    }

    public function UtilizadorProfileStore(Request $request){
        // $id = Auth::user()->id;
        // $data = User::find($id);
        // $data->nome = $request->nome;
        // $data->nome_utilizador = $request->nome_utilizador;
        // $data->email = $request->email;
        // $data->telefone = $request->telefone;
        // $data->nif = $request->nif;
        // $data->genero = $request->genero;
        // $data->data_nascimento = $request->data_nascimento;
        // $data->provincia = $request->provincia;
        // $data->municipio = $request->municipio;
        // $data->distrito = $request->distrito;

        // if($request->file('foto')){
        //     $file = $request->file('foto');
        //     @unlink(public_path('upload/utilizador_imagens/'.$data->foto));
        //     $filename = date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/utilizador_imagens'),$filename);
        //     $data['foto'] = $filename;
        // }

        // $data->save();

        // $notification = array(
        //     'message' => 'Informações Guardadas com Sucesso!',
        //     'alert-type' => 'success'
        // );

        // return redirect()->back()->with($notification);

        $validator = \Validator::make($request->all(),[
            'nome'=>'required',
            'email'=>'required|email',
            'nif'=>'required'
        ]);

        if(!$validator->passes()){
            return responde()->json(['status'=>0, 'error'=>$validator->erros()->toArrary()]);
        }else{
            $query = User::find(auth::user()->id)->update([
                'nome'=>$request->nome,
                'email'=>$request->email,
                'nif'=>$request->nif,
            ]);
            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Erro ao actualizar os dados do perfil!']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Dados do perfil actualizados com sucesso!']);
            }
        }



    }

    public function UtilizadorUpdateFoto(Request $request){
        $path = 'upload/utilizador_imagens/';
           $file = $request->file('foto');
           $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

           //Upload new image
           $upload = $file->move(public_path($path), $new_name);
           
           if( !$upload ){
               return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
           }else{
               //Get Old picture
               $oldPicture = User::find(Auth::user()->id)->getAttributes()['foto'];

               if( $oldPicture != '' ){
                   if( \File::exists(public_path($path.$oldPicture))){
                       \File::delete(public_path($path.$oldPicture));
                   }
               }

               //Update DB
               $update = User::find(Auth::user()->id)->update(['foto'=>$new_name]);

               if( !$upload ){
                   return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
               }
           }
    }
    
    
    public function UtilizadorChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('utilizador.utilizador_change_password',compact('profileData'));
    }

    public function UtilizadorUpdatePassword(Request $request){
        //Validação
        // $request->validate([
        //     'palavra_passe_antiga' => 'required',
        //     'palavra_passe_nova' => 'required|confirmed'
        // ]);

        // //Match The Old Password
        // if(!Hash::check($request->palavra_passe_antiga, auth::user()->palavra_passe)){
        //     $notification = array(
        //         'message' => 'Palavra Passe Antiga Não Corresponde!',
        //         'alert-type' => 'error'
        // );

        // return back()->with($notification);
        // }

        // //Update The New Password
        // User::whereId(auth()->user()->id)->update([
        //     'password' => Hash::make($request->new_password)
        // ]);

        // $notification = array(
        //     'message' => 'Palavra Alterada Com Sucesso!',
        //     'alert-type' => 'success'
        // );

        // return back()->with($notification);

        $validator = \Validator::make($request->all(),[
            'password'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                
                'max:30'
             ],
             'new_password'=>'required|min:8|max:30',
             'confirmPassword'=>'required|same:new_password'
         ],[
             'password.required'=>'Enter your current password',
             'password.min'=>'Old password must have atleast 8 characters',
             'password.max'=>'Old password must not be greater than 30 characters',
             'new_password.required'=>'Enter new password',
             'new_password.min'=>'New password must have atleast 8 characters',
             'new_password.max'=>'New password must not be greater than 30 characters',
             'confirmPassword.required'=>'ReEnter your new password',
             'confirmPassword.same'=>'New password and Confirm new password must match'
         ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             
         $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->new_password)]);

         if( !$update ){
             return response()->json(['status'=>0,'msg'=>'Ocorreu um erro ao tentar alterar a palavra-passe']);
         }else{
             return response()->json(['status'=>1,'msg'=>'Palavra-Passe Alterada com Sucesso!']);
         }
        }
    }

    public function ApagarConta($id){
        
        User::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Conta Apagada!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.cliente')->with($notification);
    }
}
