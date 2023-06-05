@extends('layouts.tabelas')
@section('title','Tabela de imagens')
@section('content')
      @if(session('editarCompradorSucesso'))
            <div class="alert alert-success">
              {{session('editarCompradorSucesso')}}
            </div>
      @endif
      @if(session('excluirCompradorSucesso'))
            <div class="alert alert-success">
              {{session('excluirCompradorSucesso')}}
            </div>
      @endif
      <h1>Lista de Imagens</h1>
      <br><br>
      <table id="myTable" class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome do produto</th>
            <th>Imagem</th>
            <th>Excluir</th>
          </tr>
        </thead>
        <tbody>
          @foreach(App\Models\imagens_produtos::get() as $img)
            <tr>
              <td>{{$img->id}}</td>
              <td>{{$img->img_prod->nome}}</td>
              <td><img src="{{url("storage/".$img->imagem)}}" width="100" heigh="100" alt=""></td>
              <td><a href="/excluir-imagem/{{$img->id}}" class="btn btn-danger">Excluir</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
@endsection
