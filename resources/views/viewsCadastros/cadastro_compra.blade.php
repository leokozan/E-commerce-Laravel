@extends('layouts.cadastro')
@yield('title','Cadastro')
<body class="Alinhamento">
  <h2>Cadastrar Compra</h2>
  <form action="/cadastrar-compra" method="POST">
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" placeholder="Quantidade"type="text" name='quantidade'>
      </div>
    </div>
    <br>
      <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Data da Compra</label>
        <input class="form-control" type="date" name='data_compra'>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" placeholder="total" type="text" name='total'>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
      <select name='id_produto' class="form-select" aria-label="Default select example">
      @foreach (App\Models\Produto::get() as $prod)
        <option value="{{$prod->id}}">{{$prod->nome}}</option>
      @endforeach
      </select>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
      <select name='id_comprador' class="form-select" aria-label="Default select example">
      @foreach (App\Models\Comprador::get() as $user)
        <option value="{{$user->id}}">{{$user->nome}}</option>
      @endforeach
      </select>
      </div>
    </div>
    <br><br>
    <button class="btn btn-secondary">Enviar</button>
  </form>
  <br><br>
  <!-- <a href="/editar-produto/1" class="btn btn-secondary">Editar</a> -->
</body>
</html>