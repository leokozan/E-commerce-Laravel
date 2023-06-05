<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

use App\Models\imagens_produtos;

class imagens_produtos_Controller extends Controller
{
  
  public function cadastro_imagem(Request $request){
    foreach ($request->file('imagem') as $imagem) {
        imagens_produtos::create([
            'id_produto' => $request->id_produto,
            'imagem' => $imagem->store('fotos')
        ]);
    }

    // Redireciona o usuário para a página de tabelas de produtos
    return redirect('/tabelas-produto');
}

  public function find_produto($id){
    $produto =  Produto::findorFail($id);
    return view('viewsCadastros.cadastro_imagens',['produto'=>$produto]);
}
}
