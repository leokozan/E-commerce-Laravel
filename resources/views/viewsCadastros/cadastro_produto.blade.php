@extends('layouts.cadastro')
@section('title','Cadastro')
@section('content')
  <h2>Cadastrar Produto</h2>
  <form action="/cadastrar-produto" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" type="text" name="nome" placeholder="Nome">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
          <input class="form-control" type="text" name="valor" placeholder="Valor">
        </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
          <input class="form-control" type="text" name="descricao" placeholder="Descrição">
        </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
          <input class="form-control" type="number" name="quantidade" placeholder="Quantidade">
        </div>
    </div>
    <!-- <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" type="file" name="imagem">
      </div> -->
    </div>
    <br><br>
    <button class="btn btn-secondary">Enviar</button>
  </form>
@endsection
  <!-- <a href="/editar-produto/1" class="btn btn-secondary">Editar</a> -->