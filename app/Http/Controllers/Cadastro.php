<?php

// return response()->redirect()

//https://laravel.com/docs/8.x/validation

//https://laravel.com/docs/8.x/filesystem#main-content

//https://www.w3schools.com/tags/att_form_enctype.asp

namespace App\Http\Controllers;
use App\Models\Comprador;
use App\Models\Produto;
use App\Models\Compra;
use App\Models\imagens_produtos;
use Illuminate\Http\Request;

class Cadastro extends Controller
{
    public function view_lista(){
        return view('viewTabelas.tabelas');
    }
    public function view_lista_produto(){
        return view('viewTabelas.tabelas_produto');
    }
    public function view_lista_compra(){
        return view('viewTabelas.tabela_compra');
    }
    public function view_cadastro_compra(){
        return view('viewsCadastros.cadastro_compra');
    }
    public function view_cadastro_produto(){
        return view('viewsCadastros.cadastro_produto');
    }
    public function view_cadastro_comprador(){
        return view('viewsCadastros.cadastro_comprador');
    }
    public function cadastro_produto(Request $request){
       $produto =  Produto::create([
            'nome'=>$request->nome,
            'valor'=>$request->valor,
            'descricao'=>$request->descricao,
            'quantidade'=>$request->quantidade
            //'imagem' => $request->file('imagem')->store('fotos')
        ]);
        //$produto->imagens()->create([
          //  'imagem'=> $request->file('imagem')->store('fotos')
        //])
        // imagens_produtos::create([
        //     'id_produto'=>$produto->id,
        //     'imagem'=> $request->file('imagem')->store('fotos')
        // ]);
        return redirect('/tabelas-produto')->with('cadastroProdutoSucesso','Comprador cadastrado com sucesso');
    }





    // public function cadastro_comprador(Request $request){
    //     Comprador::create([
    //         'nome'=>$request->nome,
    //         'data_nascimento'=>$request->data_nascimento,
    //         'endereco'=>$request->endereco,
    //         'cpf'=>$request->cpf
    //     ]);
    //     return redirect('/tabelas')->with('cadastroCompradorSucesso','Comprador cadastrado com sucesso');
    // }


    // public function cadastro_compra(Request $request){
    //     Compra::create([
    //         'quantidade'=>$request->quantidade,
    //         'data_compra'=>$request->data_compra,
    //         'total'=>$request->total,
    //         'id_produto'=>$request->id_produto,
    //         'id_comprador'=>$request->id_comprador
    //     ]);
    //     return redirect('/tabelas-compra')->with('cadastroCompraSucesso','Comprador cadastrado com sucesso');
    // }
}
