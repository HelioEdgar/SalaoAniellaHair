<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Galeria;
use App\Models\Servico;

class GaleriaController extends Controller
{
    //
    public function ListaGaleria(){
        $galerias = Galeria::latest()->get();
        $servicos = Servico::all();
        return view('backend.galeria.lista_galeria', compact('galerias', 'servicos'));
    }

    public function AdicionarGaleria(){
        $servicos = Servico::all();
        return view('backend.galeria.adicionar_galeria', compact('servicos'));
    }

    public function GuardarGaleria(Request $request){
        
        $request->validate([
            'nome' => 'required',
            'foto' => 'required',
        ]);

        $data = new Galeria;
        $data->nome = $request->nome;
        $data->id_servico = $request->id_servico;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/galeria_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/galeria_imagens'),$filename);
            $data['foto'] = $filename;
        }

        // Galeria::insert([
        //     'nome' => $request->nome,
        //     'foto' => $request->foto,
        //     'id_servico' => $request->duracao,
        // ]);

        $data->save();

        $notification = array(
            'message' => 'Foto Adicionada com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.galeria')->with($notification);
    }

    public function EditarGaleria($id){
        $galerias = Galeria::findOrFail($id);
        $servicos = Servico::all();
        return view('backend.galeria.editar_galeria',compact('galerias', 'servicos'));
    }

    public function ActualizarGaleria(Request $request){

        // $pid = $request->id;
        // Galeria::findOrFail($pid)->update([
        //     'nome' => $request->nome,
        //     'foto' => $request->foto,
        //     'id_servico' => $request->id_servico,
        // ]);

        $pid = $request->id;
        $data = Galeria::findOrFail($pid);
        $data->nome = $request->nome;
        $data->id_servico = $request->id_servico;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/galeria_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/galeria_imagens'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Foto Actualizada com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.galeria')->with($notification);
    }

    public function ApagarGaleria($id){
        
        Galeria::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Foto Apagada!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.galeria')->with($notification);
    }
}
