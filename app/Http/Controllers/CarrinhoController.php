<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Models\Comprador;
use App\Models\Produto;
use App\Models\Compra;
use App\Models\User;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $userId = auth()->user()->id;
        $itens=\Cart::session($userId)->getContent();
        // dd($itens);
        return view ('viewCarrinho.carrinho',compact('itens'));
    }
    public function adicionarCarrinho(Request $request){
        $userId = auth()->user()->id; 
        \Cart::session($userId)->add(array(
            'id' => $request->id,
            'name'=>$request->nome,
            'price'=>$request->valor,
            'quantity'=>$request->quantidade, 
            'attributes'=>array(
                'image'=>$request->imagem
            )
        ));
        return redirect('/carrinho')->with('prodAdicionadoSucess','Produto adicionado com sucesso');
    }
    public function removerCarrinho(Request $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($request->id);
        return redirect()->route('site.carrinho')->with('prodRemovidoSucess','Produto removido com sucesso');
    }

    public function atualizarCarrinho(Request $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->update($request->id, [
            'quantity' => [
                'relative' => false,
                'value'=>abs($request->quantity)
            ]
        ]);
        return redirect()->route('site.carrinho')->with('prodAtualizadoSucess','Produto atualizado com sucesso');
        
    }
    public function limparCarrinho(){
        $userId = auth()->user()->id;
        \Cart::session($userId)->clear();
        return redirect()->route('site.carrinho')->with('limpoSucess','Seu carrinho está vazio!');
    }
    public function totalCarrinho(){
        $userId = auth()->user()->id;
        $subTotal = Cart::session($userId)->getSubTotal();
    }
    public function pagamento(Request $request){
        $userId = auth()->user()->id;
        $items=\Cart::session($userId)->getContent();
        $cart = new Compra();
        $cart->id_user = $userId;
        $cart->id_status = 1;
        $cart->cartao = $request->cartao;
        $cart->data_compra = now();
        $cart->total = \Cart::session($userId)->getTotal();
        $cart->save();
        foreach ($items as $item) {
            $cart->produtos()->attach([$item->id => ['quantidade' => $item->quantity]]);
        }
        \Cart::session($userId)->clear();
        return redirect()->route('viewProdutos')->with('CompraConcluida','Sua compra foi concluída');
    }
    public function pagamentoView(){
        return view('viewCarrinho.pagamentoView');
    }
}
