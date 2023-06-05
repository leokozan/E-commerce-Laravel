@extends('layouts.cadastro')
@yield('title','Cadastro')
<body class="Alinhamento">
  <h2>Cadastrar Comprador</h2>
  <form action="/cadastrar-comprador" method="POST">
    @csrf
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" placeholder="Nome"type="text" name='nome'>
      </div>
    </div>
    <br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <label>Data de Nascimento</label>
        <input class="form-control" type="date" name='data_nascimento'>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" placeholder="CPF" type="text" name='cpf'>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
      <div class="col col-lg-2">
        <input class="form-control" placeholder="Endereço" type="text" name='endereco'>
      </div>
    </div>
    <br><br>
    <button class="btn btn-secondary">Enviar</button>
    <br><br>
  </form>
  <!-- <a href="/editar-produto/1" class="btn btn-secondary">Editar</a> -->
</body>
</html>