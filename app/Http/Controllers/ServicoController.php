<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servico;
use Illuminate\Support\Str;

class ServicoController extends Controller
{
    //
    public function ListaServico(){
        $servicos = Servico::latest()->get();
        return view('backend.servico.lista_servico', compact('servicos'));
    }

    public function AdicionarServico(){
        return view('backend.servico.adicionar_servico');
    }

    public function ativar($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->estado = 'activo';
        $servico->save();

        return redirect()->back();
    }

    public function desativar($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->estado = 'inactivo';
        $servico->save();

        return redirect()->back();
    }

    public function GuardarServico(Request $request){
        
        $request->validate([
            'nome' => 'required|unique:servicos',
            'descricao' => 'required',
            'duracao' => 'required',
            'preco' => 'required',
        ]);

        // Servico::insert([
        //     'nome' => $request->nome,
        //     'descricao' => $request->descricao,
        //     'duracao' => $request->duracao,
        //     'preco' => $request->preco,
        //     'foto' => $request->foto,
        //     'slug' => $request->nome
        // ]);

        $data = new Servico;
        $data->nome = $request->nome;
        $data->descricao = $request->descricao;
        $data->duracao = $request->duracao;
        $data->preco = $request->preco;
        $data->slug = Str::slug($request->nome);
        

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/servico_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/servico_imagens'),$filename);
            $data['foto'] = $filename;
        }

        // Galeria::insert([
        //     'nome' => $request->nome,
        //     'foto' => $request->foto,
        //     'id_servico' => $request->duracao,
        // ]);

        $data->save();

        $notification = array(
            'message' => 'Serviço Adicionado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.servico')->with($notification);
    }
    

    public function EditarServico($id){
        $servicos = Servico::findOrFail($id);
        return view('backend.servico.editar_servico',compact('servicos'));
    }

    public function ActualizarServico(Request $request){

        // $pid = $request->id;
        // Servico::findOrFail($pid)->update([
        //     'nome' => $request->nome,
        //     'descricao' => $request->descricao,
        //     'duracao' => $request->duracao,
        //     'preco' => $request->preco,
        //     'foto' => $request->foto,
        //     'estado' => $request->estado,
        //     'slug' => $request->nome
        // ]);

        $pid = $request->id;
        $data = Servico::findOrFail($pid);
        $data->nome = $request->nome;
        $data->descricao = $request->descricao;
        $data->duracao = $request->duracao;
        $data->preco = $request->preco;
        $data->estado = $request->estado;
        $data->slug = $request->nome;

        if($request->file('foto')){
            $file = $request->file('foto');
            @unlink(public_path('upload/servico_imagens/'.$data->foto));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/servico_imagens'),$filename);
            $data['foto'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Serviço Actualizado com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.servico')->with($notification);
    }

    public function ApagarServico($id){
        
        Servico::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Serviço Apagado!',
            'alert-type' => 'success'
        );

        return redirect()->route('lista.servico')->with($notification);
    }
}
