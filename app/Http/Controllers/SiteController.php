<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class SiteController extends Controller
{
    public function verificar_produto($id_do_produto){
        $produto = Produto::findorFail($id_do_produto);
        return view('viewCarrinho.details',['prod'=>$produto]);
    }

}
