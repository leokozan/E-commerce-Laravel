@extends('layouts.cadastro')
@section('title','Cadastrar foto')
@section('content')
  <h2>Cadastrar foto</h2>  
  <form action="/cadastrar-imagem" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Selecione a imagem para o produto</label>
        <br><br>
        <input type="hidden" name="id_produto" value="{{$produto->id}}" >
        <input type="file" name="imagem[]" multiple>
      </div>
    </div>
    <br><br>
      <button class="btn btn-secondary" type="submit">Enviar</button>
  </form>
  @endsection()