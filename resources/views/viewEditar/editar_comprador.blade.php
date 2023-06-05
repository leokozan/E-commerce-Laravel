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
  <h2>Editar cadastro usuário</h2>    
  <form action="/editar-user/{{$usuario->id}}" method="POST">
    @method("PUT")
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Nome do Usuario</label>
        <input class="form-control" type="text" name="name" value="{{$usuario->name}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Data de Nascimento</label>
        <input class="form-control" type="date" name="data_nascimento" value="{{ $usuario->data_nascimento}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Endereco</label>
        <input class="form-control" type="text" name="endereco" value="{{ $usuario->endereco}}">
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>CPF</label>
        <input class="form-control" type="text" name="cpf" value="{{ $usuario->cpf}}">
      </div>
    </div>
    <br><br>
    <button class="btn btn-secondary">Atualizar</button>
  </form>
  
</body>
</html>