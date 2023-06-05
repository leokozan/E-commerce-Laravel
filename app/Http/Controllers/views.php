<?php

namespace App\Http\Controllers;
use App\Models\Comprador;
use App\Models\Produto;
use App\Models\Compra;
use Illuminate\Http\Request;

class views extends Controller
{   
  public function produtos_page(){
    $produtos=Produto::paginate(1);
    return view('viewCarrinho.produtos_page',compact('produtos'));
}
}
