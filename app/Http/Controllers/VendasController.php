<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Compra;

class VendasController extends Controller
{
  public function viewVendas(){
    return view('viewTabelas.tabela_entregas');
  }

  public function findCompra($id){
      $compra = Compra::findorFail($id);
      return view('viewTabelas.details_entregas',['compra'=>$compra]);
  }
  public function editar_status(Request $informacoes,$id){
    $status =  Compra::findorFail($id);
    $status->id_status=$informacoes->id_status;
    $status->save();
    return redirect('/vendas');
}
}
