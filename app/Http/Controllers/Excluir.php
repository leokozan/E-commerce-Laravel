<?php

namespace App\Http\Controllers;
use App\Models\Comprador;
use App\Models\Produto;
use App\Models\Compra;
use App\Models\User;
use App\Models\Carrinho;
use App\Models\imagens_produtos;
use Illuminate\Http\Request;

class Excluir extends Controller
{
    public function excluir_produto($id_do_produto){
        $produto =  Produto::findorFail($id_do_produto);
        $produto->delete();
        return redirect('/tabelas-produto')->with('excluirProdutoSucesso','Comprador excluído com sucesso');
    }
    public function excluir_user($id_do_comprador){
        $usuario =  User::findorFail($id_do_comprador);
        $usuario->delete();
        return redirect('/tabelas')->with('excluirCompradorSucesso','Comprador excluído com sucesso');
    }
    public function excluir_img($id){
        $img = imagens_produtos::findorFail($id);
        $img->delete();
        return view('viewTabelas.tabelasImagens');
    }
    public function excluir_carrinho($id_do_carrinho){
        $compra =  Carrinho::findorFail($id_do_carrinho);
        $compra->delete();
        return redirect('/tabelas-compra')->with('excluirCompraSucesso','Comprador excluído com sucesso');
    }
}
