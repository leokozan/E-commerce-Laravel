@extends('layouts.cadastro')
@section('title','Editar produto')
@section('content')
  <h2>Editar cadastro produto</h2>  
  <form action="/editar-produto/{{$produto->id}}" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Nome do Produto</label>
        <input class="form-control" type="text" name="nome" value="{{ $produto->nome}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Valor</label>
        <input class="form-control" type="text" name="valor" value="{{ $produto->valor}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Descrição</label>
        <input class="form-control" type="text" name="descricao" value="{{$produto->descricao}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Quantidade</label>
        <input class="form-control" type="text" name="quantidade" value="{{$produto->quantidade}}">
      </div>
    </div>
    <!-- <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Imagem</label>
        <input class="form-control" type="file" name="imagem">
        <br>
        <img style="border: 2px solid" src="{{url("storage/{$produto->imagem}")}}" width="300" height="200" alt="Imagem Produto">
      </div>
    </div> -->
    <br><br>
    <button class="btn btn-secondary">Atualizar</button>
  </form>
@endsection()