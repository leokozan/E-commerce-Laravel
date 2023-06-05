@extends('layouts.tabelas')
@section('title','Tabela de produtos')
@section('content')
     @if(session('cadastroProdutoSucesso'))
            <div class="alert alert-success">
              {{session('cadastroProdutoSucesso')}}
            </div>
      @endif
      @if(session('editarProdutoSucesso'))
            <div class="alert alert-success">
              {{session('editarProdutoSucesso')}}
            </div>
      @endif
      @if(session('excluirProdutoSucesso'))
            <div class="alert alert-success">
              {{session('excluirProdutoSucesso')}}
            </div>
      @endif
      <h1>Lista de produtos</h1>
      <a href="/cadastrar-produto" class="btn btn-primary">Adicionar</a>
      <br><br>
      <table id="myTable"  class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome do produto</th>
            <th>Valor</th>
            <th>Descricao</th>
            <th>Quantidade</th>
            <!-- <th>Imagem</th> -->
            <th>Imagens</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          @foreach(App\Models\Produto::get() as $prod)
            <tr>
              <td>{{$prod->id}}</td>
              <td>{{$prod->nome}}</td>
              <td>R${{number_format($prod->valor,2 ,',' ,  '.')}}</td>
              <!-- <td><img src="{{url("storage/{$prod->imagem}")}}" width="200" height="100" alt="Imagem Produto"></td> -->
              <td>{{$prod->descricao}}</td>
              <td>{{$prod->quantidade}}</td>
              <td><a href="/cadastrar-imagem/{{$prod->id}}" class="btn btn-primary">Add imagem</a></td>
              <td><a href="/editar-produto/{{$prod->id}}" class="btn btn-primary">Editar</a></td>
              <td><a href="/excluir-produto/{{$prod->id}}" class="btn btn-danger">Excluir</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection