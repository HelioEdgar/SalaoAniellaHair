<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Salao;

class SalaoController extends Controller
{
    //
    public function ListaSalao(){
        $salaos = Salao::latest()->get();
        return view('backend.salao.lista_salao', compact('salaos'));
    }

    public function AdicionarSalao(){
        return view('backend.salao.adicionar_salao');
    }

    public function GuardarSalao(Request $request){
        
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'nif' => 'required',
            'localizacao' => 'required'
        ]);

        Salao::insert([
            'nome' => $request->nome,
            'email' => $request->email,
            'nif' => $request->nif,
            'telefone' => $request->telefone,
            'sobre' => $request->sobre,
            'localizacao' => $request->localizacao,
            'foto' => $request->foto,
            'fb' => $request->fb,
            'ig' => $request->ig,
            'tt' => $request->tt
        ]);

        $notification = array(
            'message' => 'Salão Adicionado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.salao')->with($notification);
    }

    public function EditarSalao($id){
        $salaos = Salao::findOrFail($id);
        return view('backend.salao.editar_salao',compact('salaos'));
    }

    public function ActualizarSalao(Request $request){

        // $pid = $request->id;
        // Salao::findOrFail($pid)->update([
        //     'nome' => $request->nome,
        //     'email' => $request->email,
        //     'nif' => $request->nif,
        //     'telefone' => $request->telefone,
        //     'sobre' => $request->sobre,
        //     'localizacao' => $request->localizacao,
        //     'foto' => $request->foto,
        //     'fb' => $request->fb,
        //     'ig' => $request->ig,
        //     'tt' => $request->tt
        // ]);

        $pid = $request->id;
        $data = Salao::findOrFail($pid);
        $data->nome = $request->nome;
        $data->email = $request->email;
        $data->telefone = $request->telefone;
        $data->nif = $request->nif;
        $data->sobre = $request->sobre;
        $data->localizacao = $request->localizacao;
        $data->fb = $request->fb;
        $data->ig = $request->ig;
        $data->tt = $request->tt;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/salao_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/salao_imagens'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();
 
        $notification = array(
            'message' => 'Dados Actualizados com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.salao')->with($notification);
    }

    public function ApagarSalao($id){
        
        Salao::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Salao Apagado!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.salao')->with($notification);
    }
}
