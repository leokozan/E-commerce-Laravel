@extends('layouts.tabelas')

@section('title','Tabela de Compra')

@section('content')
        @if(session('cadastroCompraSucesso'))
            <div class="alert alert-success">
              {{session('cadastroCompraSucesso')}}
            </div>
      @endif
      @if(session('editarCompraSucesso'))
            <div class="alert alert-success">
              {{session('editarCompraSucesso')}}
            </div>
      @endif
      @if(session('excluirCompraSucesso'))
            <div class="alert alert-success">
              {{session('excluirCompraSucesso')}}
            </div>
      @endif
      <h1>Lista de compras</h1>
      <!-- <a href="/cadastrar-compra" class="btn btn-primary">Adicionar</a> -->
      <br><br>
      <table id="myTable"  class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Quantidade</th>
            <th>Data Compra</th>
            <th>Total</th>
            <th>Nome do Produto</th>
            <th>Nome do Comprador</th>
            <th>Cartao</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          @foreach(App\Models\Carrinho::get() as $carrinho)
            <tr>
              <td>{{$carrinho->id}}</td>
              <td>{{$carrinho->quantidade}}</td>
              <td>{{$carrinho->data_compra}}</td>
              <td>{{number_format($carrinho->total,2 ,',' ,  '.')}}</td>
              <td>{{$carrinho->id_produto}}</td>
              <td>{{$carrinho->id_user}}</td>
              <td>{{$carrinho->cartao}}</td>
              <td><a href="/editar-compra/{{$carrinho->id}}" class="btn btn-primary">Editar</a></td>
              <td><a href="/excluir-carrinho/{{$carrinho->id}}" class="btn btn-danger">Excluir</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection