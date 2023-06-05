<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .Alinhamento{
      text-align:center;
    }
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/sass/app.scss','resources/js/app.js',])
  <title>Editar cadastro</title>
</head>
<body class="Alinhamento">
  <h2>Editar compra</h2>    
  <form action="/editar-compra/{{$compra->id}}" method="POST">
    @method("PUT")
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Quantidade</label>
        <input class="form-control" type="text" name="quantidade" value="{{ $compra->quantidade}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Data da compra</label>
        <input class="form-control" type="date" name="data_compra" value="{{ $compra->data_compra}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Total</label>
        <input class="form-control" type="text" name="total" value="{{ $compra->total}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
      <select name='id_user'  class="form-select" aria-label="Default select example">
      @foreach (App\Models\User::get() as $user)
        @if($user->id==$compra->id_user)
          <option value="{{$user->id}}" selected>{{$user->name}}</option>
        @else
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endif
      @endforeach
      </select>
      </div>
    </div>
    <br><br> 
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
      <select name='id_produto' class="form-select" aria-label="Default select example">
      @foreach (App\Models\Produto::get() as $prod)
        @if($prod->id==$compra->id_produto)
          <option value="{{$prod->id}}" selected>{{$prod->nome}}</option>
        @else
          <option value="{{$prod->id}}">{{$prod->nome}}</option>
        @endif
      @endforeach
      </select>
      </div>
    </div>
    <br><br>
    <button class="btn btn-secondary">Atualizar</button>
  </form>
  
</body>
</html>