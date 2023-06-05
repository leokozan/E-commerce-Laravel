<?php

namespace App\Http\Controllers;
use App\Models\Comprador;
use App\Models\Produto;
use App\Models\Compra;
use App\Models\User;
use App\Models\Carrinho;
use Illuminate\Http\Request;

class Editar extends Controller
{
    public function editar_user(Request $informacoes,$id_do_user){
        $usuario =  User::findorFail($id_do_user);
        $usuario->name=$informacoes->name;
        $usuario->data_nascimento=$informacoes->data_nascimento;
        $usuario->endereco=$informacoes->endereco;
        $usuario->cpf=$informacoes->cpf;
        $usuario->save();
        return redirect('/tabelas')->with('editarCompradorSucesso','Edição realizada com sucesso');
    }

    public function find_user($id_do_user){
        $usuario = User::findorFail($id_do_user);
        return view('viewEditar.editar_comprador',['usuario'=>$usuario]);
    }
    
    public function find_produto($id_do_produto){
        $produto =  Produto::findorFail($id_do_produto);
        return view('viewEditar.editar_produto',['produto'=>$produto]);
    }
    public function editar_produto(Request $informacoes,$id_do_produto){
        $produto =  Produto::findorFail($id_do_produto);
        $produto->nome=$informacoes->nome;
        $produto->valor=$informacoes->valor;
        $produto->descricao=$informacoes->descricao;
        $produto->quantidade=$informacoes->quantidade;
        // $produto->imagem=$informacoes->file('imagem')->store('fotos');
        $produto->save();
        return redirect('/tabelas-produto')->with('editarProdutoSucesso','Edição realizada com sucesso');
    }


    public function find_compra($id_da_compra){
        $compra = Carrinho::findorFail($id_da_compra);
        return view('viewsEditar.editar_compra',['compra'=>$compra]);
    }
    public function editar_compra(Request $informacoes,$id_da_compra){
        $compra = Carrinho::findorFail($id_da_compra);
        $compra->quantidade=$informacoes->quantidade;
        $compra->data_compra=$informacoes->data_compra;
        $compra->total=$informacoes->total;
        $compra->id_produto=$informacoes->id_produto;
        $compra->id_user=$informacoes->id_user;
        $compra->save();
        return redirect('/tabelas-compra')->with('editarCompraSucesso','Edição realizada com sucesso');
    }
}
